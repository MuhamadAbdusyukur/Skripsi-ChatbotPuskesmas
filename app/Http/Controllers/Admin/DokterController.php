<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    // Menampilkan daftar dokter
    public function index()
    {
        //$dokters = Dokter::all();

        $dokters = Dokter::paginate(5);
        // Menambahkan variabel title
        return view('admin.dokter.index', [
            'dokters' => $dokters,
            'title' => 'Kelola Dokter'
        ]);
    }

    // Menampilkan form untuk menambah dokter baru
    public function create()
    {
        // Menambahkan variabel title
        return view('admin.dokter.create', [
            'title' => 'Tambah Dokter'
        ]);
    }

    // Menyimpan data dokter baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'jadwal' => 'required',
            'foto' => 'image|file|max:2048'
        ]);

        if ($request->file('foto')) {
        // Tambahkan 'public' sebagai disk
        $validatedData['foto'] = $request->file('foto')->store('dokters', 'public');
    }

        Dokter::create($validatedData);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit dokter
    public function edit(Dokter $dokter)
    {
        // Menambahkan variabel title
        return view('admin.dokter.edit', [
            'dokter' => $dokter,
            'title' => 'Edit Dokter'
        ]);
    }

    // Menyimpan perubahan data dokter
    public function update(Request $request, Dokter $dokter)
    {
        $rules = [
            'nama' => 'required',
            'profesi' => 'required',
            'jadwal' => 'required',
            'foto' => 'image|file|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($dokter->foto) {
            Storage::disk('public')->delete($dokter->foto); // Hapus dari disk 'public'
        }
        // Tambahkan 'public' sebagai disk
        $validatedData['foto'] = $request->file('foto')->store('dokters', 'public');
        }

        $dokter->update($validatedData);

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diperbarui!');
    }

    public function destroy(Dokter $dokter)
    {
        // Hapus file foto dari storage jika ada
        if ($dokter->foto) {
            Storage::disk('public')->delete($dokter->foto);
        }

        // Hapus data dokter dari database
        $dokter->delete();

        // Redirect kembali ke halaman daftar dokter
        // Nama rute ini harus sesuai dengan yang di web.php
        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil dihapus!');
    }
}
