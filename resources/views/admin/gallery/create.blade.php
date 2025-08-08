@extends('layouts.admin')

@section('post')
<div class="container-fluid main-content-container">
    <div class="row g-4 justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-7">
            <div class="bg-light rounded h-100 main-card-padding">
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
                <h6 class="mb-4">TAMBAH GAMBAR GALERI</h6>
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">File Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                        <small class="form-text text-muted">Maksimal 2MB (jpeg, png, jpg, gif, svg).</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi (Opsional)</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan Tampil (Opsional)</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order') }}">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Simpan Gambar</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection