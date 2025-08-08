@extends('layouts.admin')

@section('post')
<div class="container-fluid main-content-container">
    <div class="row g-4 justify-content-center"> {{-- Menambahkan justify-content-center agar form di tengah jika col-xl-8 --}}
        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-7"> {{-- Lebih fleksibel di berbagai ukuran --}}
            <div class="bg-light rounded h-100 main-card-padding">
                <h6 class="mb-4">{{ $title ?? 'Tambah Artikel Baru' }}</h6>

                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Berita</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">Ringkasan Singkat (Summary)</label>
                        <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" rows="3">{{ old('summary') }}</textarea>
                        @error('summary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Konten Berita</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Thumbnail</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="form-text text-muted">Maksimal 2MB (jpeg, png, jpg, gif, svg)</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="publish_article" name="publish_article" {{ old('publish_article') ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish_article">
                            Publikasikan Berita Ini
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Tanggal Publikasi (Otomatis jika dipublikasikan)</label>
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at') }}" disabled> {{-- Default disabled --}}
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-column flex-sm-row mt-4"> {{-- Tombol responsif --}}
                        <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 mb-2 mb-sm-0 me-sm-2">Simpan Berita</button>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary rounded-pill py-2 px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const publishCheckbox = document.getElementById('publish_article');
        const publishedAtInput = document.getElementById('published_at');

        function togglePublishedAtInput() {
            if (publishCheckbox.checked) {
                publishedAtInput.removeAttribute('disabled');
                if (!publishedAtInput.value) {
                    const now = new Date();
                    const year = now.getFullYear();
                    const month = (now.getMonth() + 1).toString().padStart(2, '0');
                    const day = now.getDate().toString().padStart(2, '0');
                    const hours = now.getHours().toString().padStart(2, '0');
                    const minutes = now.getMinutes().toString().padStart(2, '0');
                    publishedAtInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
                }
            } else {
                publishedAtInput.setAttribute('disabled', 'disabled');
                // publishedAtInput.value = ''; // Opsional: kosongkan nilai saat unpublish
            }
        }
        
        // Initial state
        togglePublishedAtInput();
        
        publishCheckbox.addEventListener('change', togglePublishedAtInput);
    });
</script>
@endsection
