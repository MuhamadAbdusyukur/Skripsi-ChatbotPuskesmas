@extends('layouts.main') {{-- Pastikan ini adalah layout utama pengunjung Anda. Sesuaikan jika nama layout Anda berbeda. --}}

@section('post')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-4 text-center" style="font-size: 2.5rem; color: var(--bs-dark);">{{ $article->title }}</h1>
                <p class="text-center text-muted mb-4">
                    <i class="far fa-calendar-alt me-2"></i>Dipublikasikan pada {{ $article->published_at ? $article->published_at->format('d F Y H:i') : '-' }}
                </p>

                @if($article->image)
                    <div class="text-center mb-5">
                        <img class="img-fluid rounded shadow-sm" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="max-width: 100%; height: auto; display: inline-block;">
                    </div>
                @endif

                <div class="article-content mb-5" style="font-size: 1.1rem; line-height: 1.8;">
                    {!! $article->content !!}
                </div>

                <div class="mt-5 text-center">
                    {{-- === Container Flexbox Responsif untuk Tombol === --}}
                    <div class="d-flex flex-column flex-sm-row justify-content-center align-items-stretch align-items-sm-center">
                        <button onclick="history.back()" class="btn btn-outline-secondary rounded-pill py-2 px-4 mb-2 mb-sm-0 me-sm-2 text-nowrap">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </button>
                        {{-- <a href="{{ route('home') }}" class="btn btn-primary rounded-pill py-2 px-4 mb-2 mb-sm-0 me-sm-2 text-nowrap">
                            <i class="fas fa-home me-1"></i> Kembali ke Beranda
                        </a> --}}
                        <a href="{{ route('pengunjung.berita') }}" class="btn btn-outline-primary rounded-pill py-2 px-4 text-nowrap">
                            <i class="fas fa-list-alt me-1"></i> Lihat Semua Berita
                        </a>
                    </div>
                    {{-- === Akhir Container Flexbox === --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
