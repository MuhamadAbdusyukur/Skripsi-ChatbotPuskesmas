@extends('layouts.admin')

@section('post')

<div class="container-fluid main-content-container">
    <div class="row g-4 justify-content-center"> {{-- Menambahkan row dan justify-content-center --}}
        <div class="col-12"> {{-- Kolom untuk form yang terpusat dan responsif --}}
            <div class="bg-light rounded h-100 p-4">
                

                <h6 class="mb-4">{{ $title ?? 'Edit Artikel' }}</h6>

                <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <div class="form-floating"> {{-- Menggunakan form-floating --}}
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul Artikel" value="{{ old('title', $article->title) }}" required>
                            <label for="title">Judul Berita</label>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-floating"> {{-- Menggunakan form-floating --}}
                            <textarea class="form-control @error('summary') is-invalid @enderror" placeholder="Ringkasan Singkat (Summary)" id="summary" name="summary" style="height: 100px;">{{ old('summary', $article->summary) }}</textarea>
                            <label for="summary">Ringkasan Singkat (Summary)</label>
                            @error('summary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-floating"> {{-- Menggunakan form-floating --}}
                            <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Isi Konten Artikel" id="content" name="content" style="height: 150px;" required>{{ old('content', $article->content) }}</textarea>
                            <label for="content">Isi Konten Berita</label>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Thumbnail</label> {{-- Label tetap di atas untuk input file --}}
                        @if($article->image && Storage::disk('public')->exists($article->image))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar saat ini" class="img-thumbnail img-fluid" style="max-width: 150px; height: auto; object-fit: cover;">
                                <small class="form-text text-muted d-block">Gambar saat ini</small>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="form-text text-muted">Maksimal 2MB (jpeg, png, jpg, gif, svg). Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="publish_article" name="publish_article" {{ old('publish_article', $article->published_at ? true : false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="publish_article">
                            Publikasikan Berita Ini
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label">Tanggal Publikasi (Otomatis jika dipublikasikan)</label> {{-- Label tetap di atas untuk datetime-local --}}
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}" {{ old('publish_article', $article->published_at ? true : false) ? '' : 'disabled' }}>
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 justify-content-end mt-4"> {{-- Menggunakan d-flex, gap, dan justify-content-end untuk tombol --}}
                        <button type="submit" class="btn btn-primary">Perbarui Berita</button> {{-- Tanpa py/px/rounded-pill untuk konsistensi --}}
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a> {{-- Tanpa py/px/rounded-pill untuk konsistensi --}}
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