@extends('layouts.main')

@section('post')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5"> {{-- PASTIKAN TIDAK ADA "position-relative" DI SINI --}}
        <h1 class="display-3 text-white mb-3 animated slideInDown text-center">Tentang Kami</h1>
        <nav aria-label="breadcrumb" class="custom-breadcrumb-position"> {{-- PASTIKAN TIDAK ADA "animated slideInDown" DI SINI --}}
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">BERANDA</a></li>
                <li class="breadcrumb-item text-info active" aria-current="page">TENTANG KAMI</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('home/img/pkmbjw.jpeg') }}" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ asset('home/img/pkmbjw-2.png') }}" alt="" style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-5 mb-5">
    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
        <p class="d-inline-block border rounded-pill py-1 px-4">Pendahuluan</p>
        <h2 class="mb-4">Mengenal Puskesmas Banjarwangi</h2>
        <p class="mb-4">Puskesmas Banjarwangi adalah fasilitas pelayanan kesehatan tingkat pertama yang berlokasi di Kecamatan Banjarwangi, Kabupaten Garut, telah berkomitmen untuk melayani masyarakat sejak tahun 1985. Sebagai garda terdepan dalam upaya kesehatan, kami hadir untuk mewujudkan masyarakat yang sehat dan sejahtera.</p>
        <p class="mb-0">Kami menyediakan pelayanan kesehatan yang komprehensif, mulai dari upaya promotif, preventif, kuratif, hingga rehabilitatif, dengan fokus utama pada peningkatan derajat kesehatan keluarga dan komunitas.</p>
    </div>
    {{-- Anda bisa tambahkan gambar di sini jika mau, misalnya di col-lg-6 terpisah --}}
</div>


                    
                </div>
            </div>
        </div>
    <!-- About End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 800px;" id="visimisi">
            <p class="d-inline-block border rounded-pill py-1 px-4">Visi & Misi</p>
            <h1 class="mb-4">Visi dan Misi Puskesmas Banjarwangi</h1>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h3 class="mb-1 text-primary">Visi</h3>
                <p class="mb-4">Mewujudkan masyarakat Banjarwangi yang <strong>sehat, mandiri, dan berdaya saing</strong>  melalui akses pelayanan kesehatan yang komprehensif, berkualitas, dan merata.</p>
                
                <h5 class="mb-3 text-secondary">Fokus Pencapaian Visi:</h5>
                <ol class="list-unstyled numbered-list"> {{-- Ubah dari ul ke ol dan tambahkan class untuk styling --}}
                    <li class="mb-2">Jaminan akses pelayanan kesehatan gratis dan prima bagi semua masyarakat.</li>
                    <li class="mb-2">Peningkatan kepesertaan Jaminan Kesehatan Nasional (JKN) dan realisasi Universal Health Coverage.</li>
                    <li class="mb-2">Upaya pencegahan dan penanganan stunting yang efektif.</li>
                    <li class="mb-2">Jaminan persalinan yang aman dan gratis bagi ibu hamil sehat.</li>
                    <li class="mb-2">Penyediaan fasilitas kesehatan yang memadai, khususnya bagi ibu hamil.</li>
                    <li class="mb-2">Dukungan makanan bergizi untuk masyarakat.</li>
                </ol>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <h3 class="mb-1 text-primary">Misi</h3>
                <ol class="list-unstyled numbered-list"> {{-- Ubah dari ul ke ol dan tambahkan class untuk styling --}}
                    <li class="mb-3">Meningkatkan kualitas hidup masyarakat yang bermartabat melalui pelayanan kesehatan yang humanis.</li>
                    <li class="mb-3">Mewujudkan sumber daya manusia yang berbudaya sehat, berdaya saing, dan adaptif terhadap tantangan kesehatan.</li>
                </ol>
            </div>
        </div>
    </div>
</div>    

<!-- About Start -2 -->
    {{-- <div class="container-xxl py-2">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Tentang Kami</p>
                    <h1 class="mb-4 fs-3 fs-md-2 fs-lg-1">Membangun Kesehatan Bersama Puskesmas Banjarwangi!</h1>
                    <p>Pusat Kesehatan Masyarakat adalah lembaga pelayanan kesehatan yang memberikan berbagai jenis pelayanan kesehatan dengan harga yang terjangkau dan mudah diakses oleh masyarakat.</p>
                    <p class="mb-4">Memilih puskesmas yang tepat sangat penting untuk menjaga kesehatan keluarga. Datanglah ke Puskesmas kami untuk mendapatkan pelayanan kesehatanterbaik bagi Anda dan keluarga.</p>
                    
                    
                    
                    <div class="d-flex align-items-start text-check-responsive mb-3">
                        <i class="far fa-check-circle text-primary me-3 flex-shrink-0"></i> <p class="mb-0 flex-grow-1">Tim medis yang profesional dan terlatih</p> </div>
                        <div class="d-flex align-items-start text-check-responsive mb-3">
                            <i class="far fa-check-circle text-primary me-3 flex-shrink-0"></i>
                            <p class="mb-0 flex-grow-1">Fasilitas kesehatan yang lengkap</p>
                        </div>
                        <div class="d-flex align-items-start text-check-responsive mb-3">
                            <i class="far fa-check-circle text-primary me-3 flex-shrink-0"></i>
                            <p class="mb-0 flex-grow-1">Pelayanan kesehatan terbaik dan ramah kepada pasien</p>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('home/img/pkmbjw.jpeg') }}" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ asset('home/img/pkmbjw-2.png') }}" alt="" style="margin-top: -25%;">
                    </div>
                </div>
            </div>

                
            </div>
        </div> --}}
    <!-- About End -2 -->


<!-- Feature Start -->
    <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="d-inline-block border rounded-pill text-light py-1 px-4" id="fitur_unggulan">Fitur Unggulan</p>
                        <h1 class="text-white mb-4">Mengapa Memilih Kami?</h1>
                        <p class="text-white mb-4 pb-2"><p class="text-white mb-4 pb-2">Puskesmas Banjarwangi berkomitmen memberikan pelayanan kesehatan prima yang didukung oleh fasilitas modern, tenaga ahli, biaya terjangkau, <strong>serta kesiapsiagaan layanan darurat</strong>. Berikut adalah keunggulan utama yang kami tawarkan untuk kesehatan Anda dan keluarga:</p></p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light icon-circle-responsive" style="width: 55px; height: 55px;">
                                        <i class="fa fa-user-md text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="text-white mb-0 fs-6 fs-sm-5 feature-title-text">Dokter</h5>
                                        <p class="text-white mb-2 fs-6 fs-sm-6 feature-small-text">Berpengalaman</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light icon-circle-responsive" style="width: 55px; height: 55px;">
                                        <i class="fa fa-award text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="text-white mb-0 fs-6 fs-sm-5 feature-title-text">Pelayanan</h5>
                                        <p class="text-white mb-2 fs-6 fs-sm-6 feature-small-text">Berkualitas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light icon-circle-responsive" style="width: 55px; height: 55px;">
                                        <i class="fa fa-coins text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="text-white mb-0 fs-6 fs-sm-5 feature-title-text">Biaya</h5>
                                        <p class="text-white mb-2 fs-6 fs-sm-6 feature-small-text">Terjangkau</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light icon-circle-responsive" style="width: 55px; height: 55px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2 fs-6 fs-sm-6 feature-small-text">24 Jam</p>
                                        <h5 class="text-white mb-0 fs-6 fs-sm-5 feature-title-text">Siaga</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('home/img/pkmbjw-3.png') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
    {{-- TOMBOL LIHAT GALERI --}}
<div class="container-xxl py-5">
    <div class="container text-center wow fadeIn" data-wow-delay="0.1s">
<a href="{{ route('pengunjung.gallery') }}" class="btn btn-primary rounded-pill py-3 px-5 mt-3 btn-readmore-responsive" id="galeri">Lihat Galeri Kami</a>
    </div>
</div>
{{-- AKHIR TOMBOL LIHAT GALERI --}}

@endsection<!-- End #section -->