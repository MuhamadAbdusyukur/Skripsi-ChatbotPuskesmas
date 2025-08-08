<?php

namespace App\Http\Controllers;

use App\Models\Qna;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client; // Import Guzzle HTTP Client

class QnaController extends Controller
{
    // app/Http/Controllers/QnaController.php

    

public function index(Request $request) // <-- PERUBAHAN: Tambahkan Request $request
    {
        $search = $request->input('search'); // <-- PENAMBAHAN: Tangkap parameter 'search'

        if ($search) {
            // <-- PENAMBAHAN: Logika pencarian jika ada input 'search'
            $qnas = Qna::where('keyword', 'LIKE', '%' . $search . '%')
                       ->orWhere('reply', 'LIKE', '%' . $search . '%')
                       ->latest() // Urutkan berdasarkan yang terbaru
                       ->paginate(10); // <-- PERUBAHAN: Gunakan paginate()
        } else {
            // <-- PERUBAHAN: Logika default jika tidak ada pencarian (ambil semua dengan paginate)
            $qnas = Qna::latest()->paginate(10); // <-- PERUBAHAN: Gunakan paginate()
        }

        return view('qna.index', [
            'title' => 'Kelola Chatbot',
            'qnas' => $qnas
        ]);
    }

    public function create()
    {
        return view('qna.create', [
            'title' => 'Tambah QNA',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
            'reply' => 'required|string', // <<< Pastikan ini 'required|string'
                    'is_popular' => 'required|boolean', // Gunakan 'boolean' untuk validasi

        ]);

        // Tambahkan logika untuk is_popular
    
    Qna::create($validatedData);


        return redirect()->route('qna.index')->with('success', 'QnA berhasil ditambahkan!');
    }

    public function edit(Qna $qna)
{
    $title = 'Edit QNA'; // Define the variable 'title' first
    return view('qna.create', compact('qna', 'title')); // Pass both 'qna' and 'title' as strings
}

    public function update(Request $request, Qna $qna)
{
    // Validasi data lainnya
    $request->validate([
        'keyword' => 'required|string|max:255',
        'reply' => 'required|string',
    ]);
    
    // Ambil semua data dari request
    $input = $request->all();

    // Pastikan nilai is_popular diatur dengan benar dari request
    $qna->is_popular = $request->input('is_popular');
    
    // Perbarui model dengan data baru
    $qna->update($input);

    return redirect()->route('qna.index')->with('success', 'QnA berhasil diperbarui!');
}

    public function destroy(Qna $qna)
    {
        $qna->delete();
        return redirect()->route('qna.index')->with('success', 'Data berhasil dihapus.');
    }
}
