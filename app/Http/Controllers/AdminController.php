<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pengunjung;
use App\Models\Poli;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\Feedback;

// use PDF; // Pastikan ini ada di atas
use Barryvdh\DomPDF\Facade\Pdf; // Tambahkan ini jika belum ada
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // DATA PENDAFTARAN
    public function index(Request $request) // PERUBAHAN: Menambahkan parameter Request $request
    {
        $user = Auth::user();
        // === TAMBAHKAN KODE UNTUK MENGHITUNG ROLE DI SINI ===
    $totalJenisRole = User::distinct('role')->count();
    $daftarRole = User::select('role')->distinct()->pluck('role');
    // dd($totalJenisRole); 

        // ================================================================
        // MODIFIKASI: LOGIKA PENCARIAN & PAGINASI UNTUK DATAS
        // ================================================================
        $search = $request->input('search'); // PENAMBAHAN: Tangkap parameter 'search'

        $query = Pengunjung::query(); // Inisialisasi query builder
        $query->with('poli'); // Eager load relasi 'poli' untuk efisiensi

        if ($search) { // PENAMBAHAN: Logika filter jika ada input pencarian
            $query->where('nik', 'LIKE', '%' . $search . '%')
                  ->orWhere('nama', 'LIKE', '%' . $search . '%')
                  ->orWhere('alamat', 'LIKE', '%' . $search . '%')
                  ->orWhere('telepon', 'LIKE', '%' . $search . '%')
                  ->orWhere('tgl_kunjung', 'LIKE', '%' . $search . '%'); // Pencarian tanggal sebagai string
                  
            // Tambahkan pencarian berdasarkan nama poli (melalui relasi)
            // Penting: Pastikan relasi 'poli' sudah didefinisikan di model Pengunjung
            $query->orWhereHas('poli', function($q) use ($search){
                $q->where('nama', 'LIKE', '%' . $search . '%');
            });
        }

        // PERUBAHAN: Ganti ->get() dengan ->paginate() dan tambahkan withQueryString()
        $datas = $query->latest()->paginate(10)->appends(request()->query()); // Urutkan dari yang terbaru (opsional)

        return view('admin.index', array_merge(["title" => "Beranda"], compact('user', 'datas', 'totalJenisRole', 'daftarRole')));
    }

    public function datacreate()
    {
        $user = Auth::user();
        $poli = Poli::all();

        return view('admin.datacreate', [
            "title" => "Data Pasien"], compact('user', 'poli'));
    }

    public function datastore(Request $request)
    {
        $request ->validate([
            'nik' => 'required|digits:16|unique:pengunjungs|numeric',
            'nama' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
            'tgl_kunjung' => 'required|date',
            'poli_id' => 'required',
        ]);

        Pengunjung::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tgl_kunjung' => $request->tgl_kunjung,
            'poli_id' => $request->poli_id,
        ]);

        
        return redirect()->route('admin')->with('success', 'Data Pendaftaran Berhasil Ditambahkan!');
    }

    public function dataedit($id)
    {
        $user = Auth::user();
        $data = Pengunjung::find($id);
        $poli = Poli::all();

        return view('admin.dataedit', [
            "title" => "Data Pasien"], compact('user', 'data', 'poli'));
    }

    public function dataupdate(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|unique:pengunjungs,nik,'.$id.',id',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'poli_id' => 'required',
            'tgl_kunjung' => 'required|date',
        ]);

        $update = Pengunjung::find($id);
        $update->nik = $request->input('nik');
        $update->nama = $request->input('nama');
        $update->alamat = $request->input('alamat');
        $update->telepon = $request->input('telepon');
        $update->poli_id = $request->input('poli_id');
        $update->tgl_kunjung = $request->input('tgl_kunjung');
        $update->save();
        
        return redirect()->route('admin')->with('success', 'Data Pendaftaran Pasien Berhasil Diupdate');
    }

    public function datadestroy($id)
    {
        Pengunjung::destroy($id);

        return redirect()->route('admin.dokter.index')->with('success', 'Data Pendaftaran Pasien Berhasil Dihapus');
    }

    // DATA PENGUNJUNG
    public function laporan(Request $request)
    {
        $user = Auth::user();

        // ================================================================
        // MODIFIKASI: LOGIKA PENCARIAN & PAGINASI UNTUK DATA TANGGAL ($datatgl)
        // ================================================================
        $searchDate = $request->input('search_date');

        $queryTgl = Pengunjung::selectRaw('tgl_kunjung, COUNT(*) as kunjungan_tgl')
                                ->groupBy('tgl_kunjung')
                                ->orderBy('tgl_kunjung', 'desc');

        if ($searchDate) {
            $dateParsed = null;
            
            // 1. Coba parsing sebagai tanggal YYYY-MM-DD (contoh: 2025-07-20)
            try {
                $dateParsed = Carbon::createFromFormat('Y-m-d', $searchDate);
            } catch (\Exception $e) { /* Lanjutkan ke pengecekan berikutnya */ }
            
            // 2. *** PERBAIKAN: Coba parsing sebagai tanggal DD-MM-YYYY (contoh: 20-07-2025) ***
            if (!$dateParsed) {
                try {
                    $dateParsed = Carbon::createFromFormat('d-m-Y', $searchDate);
                } catch (\Exception $e) { /* Lanjutkan ke pengecekan berikutnya */ }
            }

            // 3. Coba parsing sebagai Hari Bulan Tahun (contoh: 20 Juli 2025)
            if (!$dateParsed) {
                try {
                    $dateParsed = Carbon::createFromFormat('d F Y', $searchDate, 'id');
                } catch (\Exception $e) { /* Lanjutkan ke pengecekan berikutnya */ }
            }

            // 4. Coba parsing sebagai Hari Bulan (contoh: 20 Juli)
            if (!$dateParsed) {
                try {
                    $dateParsed = Carbon::createFromFormat('d F', $searchDate, 'id');
                } catch (\Exception $e) { /* Lanjutkan ke pengecekan terakhir */ }
            }

            if ($dateParsed && $dateParsed->isValid()) {
                // Jika salah satu dari 4 format tanggal di atas berhasil, terapkan filter whereDate
                $queryTgl->whereDate('tgl_kunjung', $dateParsed->toDateString());
            } else {
                // 5. Fallback: Jika tidak dikenali sebagai tanggal, coba cari berdasarkan nama bulan
                $monthNames = [
                    'januari' => 1, 'februari' => 2, 'maret' => 3, 'april' => 4, 'mei' => 5, 'juni' => 6,
                    'juli' => 7, 'agustus' => 8, 'september' => 9, 'oktober' => 10, 'november' => 11, 'desember' => 12,
                    'jan' => 1, 'feb' => 2, 'mar' => 3, 'apr' => 4, 'may' => 5, 'jun' => 6,
                    'jul' => 7, 'aug' => 8, 'sep' => 9, 'oct' => 10, 'nov' => 11, 'dec' => 12,
                ];

                $lowerSearch = strtolower($searchDate);
                $monthNumber = null;

                foreach ($monthNames as $name => $number) {
                    if (str_contains($lowerSearch, $name)) {
                        $monthNumber = $number;
                        break;
                    }
                }

                if ($monthNumber) {
                    $queryTgl->whereMonth('tgl_kunjung', $monthNumber);
                    if (preg_match('/\d{4}/', $searchDate, $matches)) {
                        $queryTgl->whereYear('tgl_kunjung', $matches[0]);
                    }
                } else {
                    $queryTgl->where('tgl_kunjung', 'LIKE', '%' . $searchDate . '%');
                }
            }
        }

        $datatgl = $queryTgl->paginate(10)->withQueryString();

        // ================================================================
        // MODIFIKASI: LOGIKA PENCARIAN & PAGINASI UNTUK DATA POLI ($datapoli)
        // ================================================================
        $searchPoli = $request->input('search_poli');

        $queryPoli = Poli::select('polis.id', 'polis.nama')
                          ->selectRaw('COUNT(pengunjungs.id) as pengunjung_count')
                          ->leftJoin('pengunjungs', 'polis.id', '=', 'pengunjungs.poli_id')
                          ->groupBy('polis.id', 'polis.nama')
                          ->orderBy('pengunjung_count', 'desc');

        if ($searchPoli) {
            $queryPoli->where('polis.nama', 'LIKE', '%' . $searchPoli . '%');
        }

        $datapoli = $queryPoli->paginate(10)->withQueryString();

        return view('admin.laporan', [
            "title" => "Data Pengunjung"], compact('user', 'datatgl', 'datapoli'));
    }

    public function tgldetail($tgl_kunjung)
    {
        $user = Auth::user();
        $datatgl = Pengunjung::whereDate('tgl_kunjung', '=', $tgl_kunjung)
        ->get();

        return view('admin.laporantglshow', [
            "title" => "Data Pengunjung"] , compact('user', 'datatgl', 'tgl_kunjung'));

    }

    public function polidetail($id)
    {
        $user = Auth::user();
        $datapoli = Poli::findOrFail($id);
        $pengunjung = $datapoli->pengunjung()->get();

        return view('admin.laporanpolishow', [
            "title" => "Data Pengunjung"], compact('user', 'datapoli', 'pengunjung'));

    }

    // PELAYANAN POLI
    public function poliindex()
    {
        $user = Auth::user();
        $poli = Poli::all();

        return view('admin.poli.index', [
            "title" => "Pelayanan Poli"], compact('user', 'poli'));
    }

    public function polistore(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:polis',
        ]);

        Poli::create($validate);

        return redirect('/admin/poli')->with('success', 'Layanan Poli Berhasil Ditambahkan');
    }

    public function poliedit($id)
    {
        $user = Auth::user();
        $poli = Poli::findOrFail($id);

        return view('admin.poli.edit', [
            "title" => "Pelayanan Poli"], compact('user', 'poli'));
    }

    public function poliupdate(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:polis',
        ]);

        Poli::whereId($id)->update($validate);

        return redirect('/admin/poli')->with('success', 'Layanan Poli Berhasil Diperbaharui');
    }

    public function polidelete($id)
    {
        $user = Auth::user();
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect('/admin/poli')->with('success', 'Layanan Poli Berhasil Dihapus');
    }

    // USER
    public function userindex()
    {
        $user = Auth::user();
        // Ambil hanya pengguna dengan peran 'admin' atau 'super_admin'
        $admin = User::whereIn('role', ['admin', 'super_admin'])->get();

        return view('admin.user.index', [
            "title" => "Daftar Pengguna"], compact('user', 'admin'));
    }

    public function userstore(Request $request)
{
    // --- Langkah 1: Perbarui aturan validasi ---
    // Hapus validasi "in" untuk role agar nilai dari UI bisa lolos
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8',
        'role' => 'required|string', // Aturan validasi role sekarang lebih fleksibel
    ]);

    // --- Langkah 2: Tambahkan logika terjemahan ---
    // Buat variabel untuk menyimpan role yang akan masuk ke database
    $databaseRole = '';

    // Lakukan pengecekan dan terjemahan dari nilai UI
    if ($validatedData['role'] === 'Kepala Puskesmas') {
        $databaseRole = 'super_admin';
    } elseif ($validatedData['role'] === 'Staf Administrasi') {
        $databaseRole = 'admin';
    } else {
        // Tambahkan penanganan error jika role tidak valid
        // Anda bisa mengembalikan error atau menetapkan default
        $databaseRole = 'default_role'; // Ganti dengan role default jika perlu
    }

    // --- Langkah 3: Siapkan data untuk disimpan ---
    // Enkripsi password
    $validatedData['password'] = bcrypt($validatedData['password']);
    
    // Ganti nilai role dengan nilai yang sudah diterjemahkan
    $validatedData['role'] = $databaseRole;

    // --- Langkah 4: Simpan data ke database ---
    User::create($validatedData);

    // --- Langkah 5: Redirect atau kembalikan response ---
    return redirect('/admin/user')->with('success', 'Pengguna berhasil ditambahkan!');
}

    public function useredit($id)
    {
        $user = Auth::user();
        $admin = User::findOrFail($id);

        return view('admin.user.edit', [
            "title" => "Daftar Pengguna"], compact('user', 'admin'));
    }

    public function userupdate(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required',
        ]);

        if (!empty($validate['password'])) {
            $validate['password'] = bcrypt($validate['password']);
        } else {
            unset($validate['password']);
        }

        User::whereId($id)->update($validate);

        return redirect('/admin/user')->with('success', 'Admin Berhasil Diperbaharui');
    }

    public function userdelete($id)
    {
        $user = Auth::user();
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect('/admin/user')->with('success', 'Admin Berhasil Dihapus');
    }

    // ARTICLE
    public function article()
    {
        // Ambil 3 artikel terbaru yang sudah dipublikasi
        $articles = Article::whereNotNull('published_at')
                            ->orderByDesc('published_at')
                            ->take(3)
                            ->get();

        return view('/admin', compact('articles'));
    }


    // PDF BERDASARKAN TANGGAL
    public function downloadPdfTanggal($tanggal)
{
    // Ambil data pengunjung berdasarkan tanggal
    $dataPengunjung = Pengunjung::whereDate('tgl_kunjung', $tanggal)
                                ->with('poli')
                                ->get();
    
    // Tentukan nama file PDF
    $pdfFileName = 'laporan-pengunjung-tanggal-' . $tanggal . '.pdf';

    // Kirim data ke view untuk PDF
    $data = [
        'dataPengunjung' => $dataPengunjung,
        'tgl_kunjung' => $tanggal,
    ];

    // Render view ke PDF
    $pdf = PDF::loadView('admin.laporan_pdf', $data);

    // Kembalikan file PDF sebagai respons download
    return $pdf->download($pdfFileName);
}

// PDF BERDASARKAN POLI
public function downloadPdfPoli($id)
{
    // Ambil data pengunjung berdasarkan ID Poli
    $dataPengunjung = Pengunjung::where('poli_id', $id)
                                ->with('poli')
                                ->get();
    
    // Ambil nama poli untuk judul laporan
    $poli = Poli::findOrFail($id);

    // Tentukan nama file PDF
    $pdfFileName = 'laporan-pengunjung-poli-' . $poli->nama . '.pdf';

    // Kirim data ke view untuk PDF
    $data = [
        'dataPengunjung' => $dataPengunjung,
        'poli' => $poli,
    ];

    // Render view ke PDF
    $pdf = PDF::loadView('admin.laporan_poli_pdf', $data);

    // Kembalikan file PDF sebagai respons download
    return $pdf->download($pdfFileName);
}



// --- TAMBAHKAN METODE INI DI SINI ---
    public function showFeedback(Request $request)
    {
        $query = Feedback::orderBy('created_at', 'desc');

        if ($request->has('filter')) {
            $filter = $request->filter;
            if ($filter === 'hari') {
                $query->whereDate('created_at', today());
            } elseif ($filter === 'minggu') {
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($filter === 'bulan') {
                $query->whereMonth('created_at', now()->month);
            } elseif ($filter === 'tahun') {
                $query->whereYear('created_at', now()->year);
            }
        }
        
        $feedbacks = $query->get();

        return view('admin.feedback.index', [
            "title" => "Daftar Kritik dan Saran",
            "feedbacks" => $feedbacks
        ]);
    }

    public function deleteFeedback($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $feedback->delete();

        return redirect()->back()->with('success', 'Kritik dan saran berhasil dihapus.');
    }

    public function exportPdf(Request $request)
    {
        $query = Feedback::orderBy('created_at', 'desc');
        
        // Logika filter seperti di method showFeedback()
        if ($request->has('filter')) {
            $filter = $request->filter;
            if ($filter === 'hari') {
                $query->whereDate('created_at', today());
            } elseif ($filter === 'minggu') {
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($filter === 'bulan') {
                $query->whereMonth('created_at', now()->month);
            } elseif ($filter === 'tahun') {
                $query->whereYear('created_at', now()->year);
            }
        }

        $feedbacks = $query->get();
        $pdf = Pdf::loadView('admin.feedback.report_pdf', compact('feedbacks'));
        
        return $pdf->download('laporan_kritik_dan_saran.pdf');
    }


    public function storeFromChatbot(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nik' => 'required|digits:16|unique:pengunjungs,nik',
        'no_kk' => 'required|digits:16',
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'alamat' => 'required|string',
        'keluhan' => 'required|string',
        'tgl_kunjung' => 'required|date',
        'poli_id' => 'required|exists:polis,id',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    $data = $validator->validated();

    // Simpan ke database
    $pendaftaran = Pengunjung::create($data);

    // Buat pesan interaktif dengan data dinamis
    $message = "Pendaftaran berhasil!  \n";
    $message .= "Terima kasih, <b>{$data['nama']}</b>.  \n";
    $message .= "Tanggal kunjungan: <b>{$data['tgl_kunjung']}</b>  \n";
    // $message .= "Poli ID: {$data['poli_id']}";

    return response()->json([
        'success' => true,
        'message' => $message,
        'data' => $pendaftaran
    ]);
}



}
