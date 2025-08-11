@extends('layouts.main')

@section('post')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown text-center">Tenaga Medis Kami</h1>
            <nav aria-label="breadcrumb" class="custom-breadcrumb-position">
                <ol class="breadcrumb text-uppercase mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">BERANDA</a></li>
                    <li class="breadcrumb-item text-info active" aria-current="page">DOKTER</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Dokter</p>
                <h1>Tenaga Medis Berpengalaman</h1>
            </div>
            <div class="row g-4">
                {{-- Loop untuk menampilkan data dokter dari database --}}
                @forelse($dokters as $dokter)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative rounded overflow-hidden">
                            <div class="overflow-hidden">
                                @if ($dokter->foto)
                                    <img class="img-fluid" src="{{ asset('storage/' . $dokter->foto) }}"
                                        alt="{{ $dokter->nama }}" style="width: 100%; height: 250px; object-fit: cover;">
                                @else
                                    <img class="img-fluid" src="https://placehold.co/600x400/cccccc/333333?text=No+Image"
                                        alt="No Image Available" style="width: 100%; height: 250px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="team-text bg-light text-center p-4">
                                <h5 class="fs-6">{{ $dokter->nama }}</h5>
                                <p class="text-primary small fw-normal mb-1">{{ $dokter->profesi }}</p>
                                <p class="text-muted small fw-normal">{{ $dokter->jadwal }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="lead">Tidak ada data dokter saat ini.</p>
                    </div>
                @endforelse
            </div>
            </div>
        </div>
        
    </div>
    <!-- Team End -->
@endsection
