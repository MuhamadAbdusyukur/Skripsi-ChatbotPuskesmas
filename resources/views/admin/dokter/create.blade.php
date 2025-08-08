@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('post')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h5 class="mb-4">Tambah Dokter Baru</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dokter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="profesi" class="form-label">Profesi</label>
                <input type="text" class="form-control" id="profesi" name="profesi" required>
            </div>
            <div class="mb-3">
                <label for="jadwal" class="form-label">Jadwal Praktik</label>
                <input type="text" class="form-control" id="jadwal" name="jadwal" placeholder="Contoh: Senin, Jumat: 08:00 - 12:00 WIB" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Dokter</label>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>
            <div class="d-flex gap-2 justify-content-end mt-4"> {{-- Menggunakan d-flex dan gap untuk tombol --}}
                        <button type="submit" class="btn btn-primary">Simpan</button> {{-- Menggunakan btn-primary --}}
                        <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">Batal</a> {{-- Tombol batal --}}
                    </div>
        </form>
    </div>
</div>
@endsection