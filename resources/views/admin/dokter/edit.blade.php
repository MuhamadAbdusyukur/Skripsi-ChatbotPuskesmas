@extends('layouts.admin')

@section('post')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <h5 class="mb-4">Edit Data Dokter</h5>

        <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $dokter->nama) }}" required>
            </div>
            <div class="mb-3">
                <label for="profesi" class="form-label">Profesi</label>
                <input type="text" class="form-control" id="profesi" name="profesi" value="{{ old('profesi', $dokter->profesi) }}" required>
            </div>
            <div class="mb-3">
                <label for="jadwal" class="form-label">Jadwal Praktik</label>
                <input type="text" class="form-control" id="jadwal" name="jadwal" value="{{ old('jadwal', $dokter->jadwal) }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Dokter</label>
                @if ($dokter->foto)
                    <img src="{{ asset('storage/' . $dokter->foto) }}" class="img-preview img-fluid mb-3 d-block" style="width: 150px;">
                @else
                    <img class="img-preview img-fluid mb-3" style="width: 150px;">
                @endif
                <input class="form-control" type="file" id="foto" name="foto">
            </div>
<div class="d-flex gap-2 justify-content-end mt-4"> {{-- Menggunakan d-flex dan gap untuk tombol --}}
                        <button type="submit" class="btn btn-primary">Perbarui Dokter</button> {{-- Menggunakan btn-primary --}}
                        <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary">Batal</a> {{-- Tombol batal --}}
                    </div>        </form>
    </div>
</div>
@endsection