<?php
// app/Http/Controllers/Admin/GalleryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryImage; // Pastikan model ini sudah dibuat
use Illuminate\Support\Facades\Storage; // Untuk upload file

class GalleryController extends Controller
{
    /**
     * Menampilkan daftar semua gambar galeri.
     */
    public function index()
    {
        $images = GalleryImage::orderBy('created_at', 'asc')->paginate(10); // Ambil semua gambar
        $title = 'Kelola Galeri'; // Judul halaman untuk admin galeri
        return view('admin.gallery.index', compact('images', 'title'));
    }

    /**
     * Menampilkan form untuk membuat gambar galeri baru.
     */
    public function create()
    {
        return view('admin.gallery.create', ['title' => 'Tambah Gambar Galeri']);
    }

    /**
     * Menyimpan gambar galeri yang baru dibuat ke storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'description' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // $imagePath = $request->file('image')->store('public/gallery_images'); // Simpan di storage/app/public/gallery_images
            // Pastikan Anda telah menjalankan: php artisan storage:link
            $imagePath = $request->file('image')->store('gallery_images', 'public');
        }

        GalleryImage::create([
            'file_path' => $imagePath,
            'description' => $request->description,
            'order' => $request->order,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar galeri berhasil ditambahkan!');
    }

    public function edit(GalleryImage $gallery) // Model binding: Laravel akan menemukan gambar berdasarkan ID
    {
        $title = 'Edit Gambar Galeri';
        return view('admin.gallery.edit', compact('gallery', 'title'));
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $oldImage = $gallery->file_path; 

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            // --- PERBAIKAN DI SINI ---
            // Simpan file di disk 'public' ke folder 'gallery_images'
            $imagePath = $request->file('image')->store('gallery_images', 'public'); 
            // -------------------------
        } else {
            $imagePath = $oldImage; // Pertahankan gambar lama jika tidak ada upload baru
        }

        $gallery->update([
            'file_path' => $imagePath, 
            'description' => $request->description,
            'order' => $request->order,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $gallery)
    {
        if ($gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
            Storage::disk('public')->delete($gallery->file_path);
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar galeri berhasil dihapus!');
    }

    // Anda juga perlu mengisi method show, edit, update, dan destroy
    // Method show: public function show(GalleryImage $gallery) { ... }
    // Method edit: public function edit(GalleryImage $gallery) { ... }
    // Method update: public function update(Request $request, GalleryImage $gallery) { ... }
    // Method destroy: public function destroy(GalleryImage $gallery) { ... }
}