@extends('layouts.main')

@section('post')

{{-- TOMBOL KEMBALI --}}
<div class="container-xxl pt-3 pb-0"> {{-- Gunakan py-3 untuk padding vertikal --}}
    <div class="container">
        <div class="d-flex justify-content-start">
            <a href="{{ url('/about') }}" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
</div>
{{-- AKHIR TOMBOL KEMBALI --}}

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            {{-- LOOPING GAMBAR DARI DATABASE --}}
            @forelse($images as $image)
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="gallery-item position-relative rounded overflow-hidden">
        @if($image->file_path && Storage::disk('public')->exists($image->file_path))
            <img class="img-fluid w-100" src="{{ Storage::url($image->file_path) }}" alt="{{ $image->description ?? 'Gambar Galeri' }}" style="height: 250px; object-fit: cover;">
        @else
            <img class="img-fluid w-100" src="https://placehold.co/400x250?text=No+Image" alt="Gambar Tidak Tersedia" style="height: 250px; object-fit: cover;">
        @endif
        
        <div class="gallery-overlay">
            {{-- Tombol "LIHAT FOTO" DI POJOK KANAN BAWAH --}}
            @if($image->file_path && Storage::disk('public')->exists($image->file_path))
                <a class="btn btn-primary btn-sm py-1 px-2 position-absolute bottom-0 end-0 m-3" href="{{ Storage::url($image->file_path) }}" data-lightbox="gallery">Lihat Foto</a>
            @else
                <button class="btn btn-primary btn-sm py-1 px-2 position-absolute bottom-0 end-0 m-3" disabled>Lihat Foto</button>
            @endif

            {{-- LABEL "DI LUAR KLASTER" DIHAPUS --}}
            {{-- <span class="position-absolute top-0 start-0 m-3 badge bg-info text-white p-2">Di Luar Klaster</span> --}}

            {{-- Bagian tengah overlay (jika ada teks/ikon lain di tengah overlay) --}}
            <div class="d-flex align-items-center justify-content-center h-100">
                {{-- Tombol X untuk kembali saat di-zoom akan disediakan oleh library lightbox secara otomatis --}}
            </div>
        </div>
    </div>
</div>
            @empty
            <div class="col-12 text-center py-5">
                <p>Belum ada gambar di galeri.</p>
            </div>
            @endforelse
            {{-- AKHIR LOOPING GAMBAR --}}
        </div>
        
        {{-- Bagian Paginasi --}}
        <div class="d-flex justify-content-center mt-4 wow fadeIn" data-wow-delay="0.1s">
            {{ $images->links('pagination::bootstrap-5') }}
        </div>
        {{-- AKHIR BAGIAN PAGINASI --}}

    </div>
</div>
@endsection