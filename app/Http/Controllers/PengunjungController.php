<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengunjung;
use App\Models\Poli;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\GalleryImage;
use App\Models\Dokter; // Jangan lupa tambahkan ini

class PengunjungController extends Controller
{
    public function index()
    {
        $hari = Carbon::today();
        $besok = Carbon::today()->addDay();

        $pengunjung = Pengunjung::whereDate('tgl_kunjung', $hari)->count();
        $pengunjungbesok = Pengunjung::whereDate('tgl_kunjung', $besok)->count();
        $semuapengunjung = Pengunjung::count();

        // $pengunjung = Pengunjung::where('nik', auth()->user()->nik ?? null)
        //     ->where('selesai', false)
        //     ->whereDate('tgl_kunjung', today())
        //     ->latest()
        //     ->first();

        // if ($pengunjung) {
        //     session([
        //         // 'nomor_antrian' => $pengunjung->nomor_antrian,
        //         'pendaftaran_time' => $pengunjung->created_at,
        //     ]);
        // }
        // if ($pengunjung && !$pengunjung->selesai) {
        //     $created = $pengunjung->created_at;
        //     if ($created->diffInHours(now()) >= 24) {
        //         $pengunjung->selesai = true;
        //         $pengunjung->save();
        //         session()->forget(['nomor_antrian', 'pendaftaran_time']);
        //     }
        // }
        // --- TAMBAHKAN KODE INI DI SINI ---
        $articles = Article::whereNotNull('published_at') // Hanya ambil yang sudah di-publish
            ->orderByDesc('published_at') // Urutkan dari yang terbaru
            ->take(3) // Ambil 3 artikel teratas
            ->get();
        // ------------------------------------


        return view('pengunjung.index', [
            "title" => "Beranda",
            'pengunjung' => $pengunjung,
            'pengunjungbesok' => $pengunjungbesok,
            'semuapengunjung' => $semuapengunjung,
            'articles' => $articles
        ]);
    }

    // ARTICLE BERITA
    public function showArticle($slug) // Nama metode bisa showArticle atau detailArticle
    {
        $article = Article::where('slug', $slug)->whereNotNull('published_at')->firstOrFail();
        // firstOrFail() akan otomatis menghasilkan 404 jika tidak ditemukan

        return view('pengunjung.article_detail', [ // Kita akan membuat view ini
            'article' => $article,
            'title' => $article->title // Judul halaman akan jadi judul artikel
        ]);
    }

    public function berita()
    {
        // Mengambil semua artikel yang sudah dipublikasi untuk halaman daftar lengkap
        $articles = Article::whereNotNull('published_at')
                            ->orderByDesc('published_at')
                            ->paginate(9); // Contoh: tampilkan 9 artikel per halaman, bisa disesuaikan

        return view('pengunjung.article_list', [ // Mengirimkan ke view baru 'pengunjung.berita_list'
            'articles' => $articles,
            'title' => 'Berita' // Judul halaman
        ]);
    }

    public function create()
{
    // if (auth()->user()->role !== 'pengunjung') {
    //     abort(403, 'Hanya pengunjung yang dapat mendaftar.');
    // }

    // $nik = auth()->user()->nik;

    // $today = Carbon::today();

    // $existing = Pengunjung::where('nik', $nik)
    //     ->whereDate('tgl_kunjung', $today)
    //     ->latest()
    //     ->first();

    // Jika sudah mendaftar dan belum selesai, tidak boleh daftar lagi
    // if ($existing && !$existing->selesai) {
    //     // Tapi jika sudah lebih dari 24 jam, kita anggap selesai
    //     if ($existing->created_at->diffInHours(now()) >= 24) {
    //         $existing->selesai = true;
    //         $existing->save();
    //     } else {
    //         return redirect()->route('pengunjung.index')->with('error', 'Anda sudah mendaftar hari ini dan belum menyelesaikan kunjungan.');
    //     }
    // }

    $polis = Poli::all();
    return view('pengunjung.pendaftaran', [
        "title" => "Pendaftaran Pasien",
        "polis" => $polis,
    ]);
}



    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|numeric',
            'nama' => 'required',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
            'tgl_kunjung' => 'required|date',
            'poli_id' => 'nullable|integer|exists:polis,id',
        ]);

        // $jumlahHariIni = Pengunjung::where('tgl_kunjung', $request->tgl_kunjung)
        //     ->where('poli_id', $request->poli_id)
        //     ->count();

        // $nomorAntrian = $jumlahHariIni + 1;

        $pengunjung = new Pengunjung($request->all());
        // $pengunjung->nomor_antrian = $nomorAntrian;
        $pengunjung->selesai = false;
        $pengunjung->save();

        // session([
        //     'nomor_antrian' => $pengunjung->nomor_antrian,
        //     'pendaftaran_time' => now(),
        // ]);

        return redirect()->route('pengunjung.pendaftaran')->with('success', 'Pendaftaran berhasil. Silakan tunggu informasi selanjutnya.');
    }

    // public function selesai(Request $request)
    // {
    //     $nik = auth()->user()->nik;
    //     $today = Carbon::today();

    //     $pengunjung = Pengunjung::where('nik', $nik)
    //         ->whereDate('tgl_kunjung', $today)
    //         ->where('selesai', false)
    //         ->latest()
    //         ->first();

    //     if ($pengunjung) {
    //         $pengunjung->selesai = true;
    //         $pengunjung->save();
    //     }

    //     // session()->forget(['nomor_antrian', 'pendaftaran_time']);

    //     return redirect('/')->with('success', 'Terima kasih, Anda telah menyelesaikan kunjungan.');
    // }

    public function about()
    {
        return view('pengunjung.about', [
            "title" => "Tentang Kami"
        ]);
    }

    public function service()
    {
        return view('pengunjung.service', [
            "title" => "Layanan Kami"
        ]);
    }

    // PengunjungController.php

public function dokter()
{
    $dokters = Dokter::all(); // Mengambil semua data dokter dari database

    return view('pengunjung.dokter', [
        'dokters' => $dokters,
        'title' => 'Dokter' // Tambahkan ini
    ]);
}

    public function contact()
    {
        return view('pengunjung.contact', [
            "title" => "Hubungi Kami"
        ]);
    }

    public function gallery()
    {
        // Ambil data gambar galeri untuk ditampilkan di halaman publik
        // Urutkan berdasarkan 'order' jika ada, atau 'created_at' terbaru
        //$images = GalleryImage::orderBy('order', 'asc')->get(); 
        // Jika Anda ingin paginasi di halaman publik, gunakan ->paginate(X)
        $images = GalleryImage::orderBy('order', 'asc')->paginate(10);

        // --- Pastikan variabel $title didefinisikan di sini ---
        $title = 'Galeri Kami'; // Judul halaman untuk pengunjung
        // ----------------------------------------------------

        // --- Pastikan variabel $title dikirimkan ke view menggunakan compact() ---
        return view('pengunjung.gallery', compact('images', 'title'));
        // ----------------------------------------------------------------------
    }

    




}
