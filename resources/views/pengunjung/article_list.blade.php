    @extends('layouts.main') {{-- Pastikan ini adalah layout utama pengunjung Anda --}}

    @section('post')
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Koleksi Kami</p>
            <h1 class="display-6 mb-4">Semua Berita Puskesmas</h1>
        </div>

        {{-- Tombol Kembali di bagian atas daftar artikel --}}
        <div class="text-start mb-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="d-flex flex-column flex-sm-row justify-content-start align-items-stretch align-items-sm-center">
                {{-- Tombol Kembali --}}
                <button onclick="history.back()" class="btn btn-outline-secondary rounded-pill py-2 px-4 mb-2 mb-sm-0 me-sm-2 text-nowrap">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </button>
                {{-- Tombol Kembali ke Beranda --}}
                <a href="{{ route('home') }}" class="btn btn-primary rounded-pill py-2 px-4 text-nowrap">
                    <i class="fas fa-home me-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card border-0 rounded shadow p-0">
                    @if($article->image)
                        <img class="img-fluid rounded-top" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                    @else
                        <img class="img-fluid rounded-top" src="https://placehold.co/600x200/cccccc/333333?text=No+Image" alt="No Image Available" style="width: 100%; height: 200px; object-fit: cover;">
                    @endif
                    <span class="badge bg-primary text-white position-absolute top-0 end-0 m-3 rounded-pill py-1 px-2">Berita</span>

                    <div class="card-body p-4">
                        <small class="text-muted d-block mb-2">
                            <i class="far fa-calendar-alt me-1"></i> {{ $article->published_at ? $article->published_at->format('d F Y') : '-' }}
                            <i class="far fa-comments ms-3 me-1"></i> {{ $article->comments_count ?? 0 }} Comments
                        </small>
                        <h5 class="card-title mb-2" style="font-size: 1.25rem;">{{ $article->title }}</h5>
                        <p class="card-text text-body" style="font-size: 0.95rem;">{{ Str::limit($article->summary, 120) }}</p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-primary fw-bold text-decoration-none mt-3 d-inline-block">Baca Selengkapnya <i class="fa fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="lead">Tidak ada berita yang ditemukan.</p>
                </div>
            @endforelse
        </div>

        {{-- Tambahkan link paginasi jika menggunakan paginate() --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>

    </div>
</div>
    @endsection
    