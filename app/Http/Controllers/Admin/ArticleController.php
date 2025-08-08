<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Untuk slug
use Illuminate\Support\Facades\Storage; // Untuk penyimpanan file
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10); // Ambil semua artikel, paginasi
        return view('admin.articles.index', [
            'articles' => $articles,
            'title' => 'Kelola Berita' // <--- TAMBAHKAN BARIS INI
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create', [
            'title' => 'Tambah Artikel Baru' // <--- Mungkin perlu ditambahkan juga di sini
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
            //'published_at' => 'nullable|date',
            'publish_article' => 'nullable|boolean', // Validasi untuk checkbox
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public'); // Simpan gambar di storage/app/public/articles
        }

        // Menentukan nilai published_at berdasarkan checkbox
        $publishedAt = null;
        if ($request->has('publish_article') && $request->input('publish_article') == '1') {
            // Jika checkbox dicentang DAN ada tanggal yang dimasukkan, gunakan tanggal itu.
            // Jika tidak ada tanggal yang dimasukkan, gunakan waktu sekarang.
            $publishedAt = $request->published_at ? Carbon::parse($request->published_at) : Carbon::now();
        }

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Generate slug dari judul
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $imagePath,
            //'published_at' => $request->published_at,
            'published_at' => $publishedAt, // Gunakan nilai yang sudah diproses
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article' => $article,
            'title' => 'Edit Artikel' // <--- Mungkin perlu ditambahkan juga di sini
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'published_at' => 'nullable|date',
            'publish_article' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('articles', 'public');
        } else {
            $imagePath = $article->image;
        }

        // Menentukan nilai published_at berdasarkan checkbox
        $publishedAt = null;
        if ($request->has('publish_article') && $request->input('publish_article') == '1') {
            // Jika checkbox dicentang DAN ada tanggal yang dimasukkan, gunakan tanggal itu.
            // Jika tidak ada tanggal yang dimasukkan, gunakan waktu sekarang.
            $publishedAt = $request->published_at ? Carbon::parse($request->published_at) : Carbon::now();
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $imagePath,
            //'published_at' => $request->published_at,
            'published_at' => $publishedAt, // Gunakan nilai yang sudah diproses
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}