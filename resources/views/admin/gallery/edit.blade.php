@extends('layouts.admin')

@section('post')
<div class="container-fluid main-content-container">
    <div class="row g-4 justify-content-center">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">{{ $title ?? 'Edit Gambar Galeri' }}</h6>

                <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('description') is-invalid @enderror" 
                                   id="description" name="description" 
                                   placeholder="Deskripsi Gambar" 
                                   value="{{ old('description', $gallery->description) }}" required>
                            <label for="description">Deskripsi Gambar</label>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Urutan --}}
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                   id="order" name="order" 
                                   placeholder="Urutan Tampilan" 
                                   value="{{ old('order', $gallery->order) }}" required>
                            <label for="order">Urutan Tampilan</label>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Gambar Saat Ini --}}
                    @if($gallery->file_path && Storage::disk('public')->exists($gallery->file_path))
                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $gallery->file_path) }}" 
                                     alt="Gambar saat ini" 
                                     class="img-thumbnail img-fluid" 
                                     style="max-width: 250px; height: auto; object-fit: cover;">
                            </div>
                            <small class="form-text text-muted">Gambar ini akan tetap digunakan jika Anda tidak mengunggah gambar baru.</small>
                        </div>
                    @endif

                    {{-- Upload Gambar Baru --}}
                    <div class="mb-3">
                        <label for="file_path" class="form-label">Ganti Gambar</label>
                        <input type="file" class="form-control @error('file_path') is-invalid @enderror" 
                               id="file_path" name="file_path" accept="image/*">
                        <small class="form-text text-muted">Maksimal 2MB (jpeg, png, jpg, gif, svg). Kosongkan jika tidak ingin mengganti gambar.</small>
                        @error('file_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Perbarui Gambar</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
