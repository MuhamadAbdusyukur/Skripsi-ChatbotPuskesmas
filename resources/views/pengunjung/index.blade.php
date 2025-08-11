@extends('layouts.main')

@section('post')
    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 ">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            {{-- <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-2">PUSKESMAS BANJARWANGI</h1> 
                <h4 class="text-white mb-4">Ramah - Sigap - Hebat</h4> 

                
                <div class="text-white mb-4">
                    <h6 class="text-white mb-2">Jam Operasional:</h6>
                    <table style="width: auto; border-collapse: collapse; border: none; "> 
                        <tbody>
                            <tr>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Senin :</td>
                                <td style="text-align: left; padding: 2px 5px; border: none;">08:00 - 14:00 WIB</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Selasa :</td>
                                <td style="text-align: left; padding: 2px 5px; border: none;">08:00 - 14:00 WIB</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Rabu :</td>
                                <td style="text-align: left; padding: 2px 5px; border: none;">08:00 - 14:00 WIB</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Kamis :</td>
                                <td style="text-align: left; padding: 2px 5px; border: none;">08:00 - 14:00 WIB</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Jumat :</td>
                                <td style="text-align: left; padding: 2px 5px; border: none;">08:00 - 14:30 WIB</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Sabtu :</td>
                                <td style="text-align: left; padding: 2px 5px; border: none;">08:00 - 13:00 WIB</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Minggu :</td>
                                <td style="text-align: left; padding: 2px 5px; border: none;">Tutup</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
                <div class="text-white mb-3 ">
                    <h6 class="text-white mb-2">Ikuti Kami:</h6>
                    <div class="d-flex flex-wrap align-items-center social-links"> 
                        <a href="https://web.facebook.com/puskesmas.banjarwangi.2025" class="text-white me-3 mb-1"
                            target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/puskesmasbanjarwangi/" class="text-white me-3 mb-1"
                            target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="https://youtube.com/@pkmbanjarwangichannel3751?si=MzDwVJ1nNYyEt1wN"
                            class="text-white me-3 mb-1" target="_blank" aria-label="YouTube"> 
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                        <a href="https://wa.me/6282117175388" class="text-white mb-1" target="_blank" aria-label="WhatsApp">
                           
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                        
                    </div>
                </div>


                <div class="row g-4">
                    <div class="col-6 col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1 fs-5 fs-sm-4" data-toggle="counter-up">{{ $pengunjung }}</h2>
                            <p class="text-light mb-0 responsive-counter-text">Pengunjung Hari Ini</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1 fs-5 fs-sm-4" data-toggle="counter-up">{{ $pengunjungbesok }}</h2>
                            <p class="text-light mb-0 responsive-counter-text">Pengunjung Besok</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1 fs-5 fs-sm-4" data-toggle="counter-up">{{ $semuapengunjung }}</h2>
                            <p class="text-light mb-0 responsive-counter-text">Semua Pengunjung</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('home/img/1.png') }}" alt="">
                    <div class="owl-carousel-text">
                        {{-- <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Umum</h1> --}}
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('home/img/2.png') }}" alt="">
                    <div class="owl-carousel-text">
                        {{-- <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Ibu dan Anak</h1> --}}
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('home/img/3.png') }}" alt="">
                    <div class="owl-carousel-text">
                        {{-- <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Lingkungan</h1> --}}
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('home/img/4.png') }}" alt="">
                    <div class="owl-carousel-text">
                        {{-- <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Lingkungan</h1> --}}
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('home/img/5.png') }}" alt="">
                    <div class="owl-carousel-text">
                        {{-- <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Lingkungan</h1> --}}
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('home/img/6.png') }}" alt="">
                    <div class="owl-carousel-text">
                        {{-- <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Lingkungan</h1> --}}
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('home/img/7.png') }}" alt="">
                    <div class="owl-carousel-text">
                        {{-- <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Lingkungan</h1> --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Article Start -->
    <div class="container-xxl py-1">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Berita</p>
                <h1 class="display-6 mb-4">Informasi Terbaru Puskesmas</h1>
            </div>
            <div class="row g-4">
                {{-- Gunakan @forelse untuk menangani kasus kosong --}}
                @forelse($articles as $article)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        {{-- Struktur kartu artikel baru, mirip dengan gambar referensi --}}
                        <div class="card border-0 rounded shadow p-0"> {{-- Menambahkan shadow dan padding --}}
                            @if ($article->image)
                                <img class="img-fluid rounded-top" src="{{ asset('storage/' . $article->image) }}"
                                    alt="{{ $article->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                                {{-- Gambar persegi/persegi panjang --}}
                            @else
                                {{-- Placeholder jika tidak ada gambar, sesuaikan ukuran --}}
                                <img class="img-fluid rounded-top"
                                    src="https://placehold.co/600x200/cccccc/333333?text=No+Image" alt="No Image Available"
                                    style="width: 100%; height: 200px; object-fit: cover;">
                            @endif
                            <span
                                class="badge bg-primary text-white position-absolute top-0 end-0 m-3 rounded-pill py-1 px-2">Berita</span>
                            {{-- Badge seperti di contoh --}}

                            <div class="card-body p-4"> {{-- Padding disesuaikan --}}
                                <small class="text-muted d-block mb-2">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $article->published_at ? $article->published_at->format('d F Y') : '-' }}
                                </small>
                                <h5 class="card-title mb-2" style="font-size: 1.25rem;">{{ $article->title }}</h5>
                                {{-- Ukuran judul --}}
                                <p class="card-text text-body" style="font-size: 0.95rem;">
                                    {{ Str::limit($article->summary, 120) }}</p> {{-- Ukuran ringkasan --}}
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="text-primary fw-bold text-decoration-none mt-3 d-inline-block">Baca Selengkapnya
                                    <i class="fa fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="lead">Belum ada berita atau berita terbaru yang dipublikasikan saat ini.</p>
                        <p class="text-muted">Silakan kembali lagi nanti atau periksa halaman berita lengkap kami.</p>
                    </div>
                @endforelse
            </div>
            {{-- Tombol Lihat Semua Artikel (opsional) --}}
            @if ($articles->count() > 0)
                <div class="text-center mt-5">
                    {{-- === PERUBAHAN DI SINI: Tambahkan kelas unik pada tombol ini === --}}
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3 btn-readmore-responsive"
                        href="{{ route('pengunjung.berita') }}">Lihat Semua Berita</a>
                </div>
            @endif
        </div>
    </div>
    <!-- Article End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('home/img/pkmbjw.jpeg') }}"
                            alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ asset('home/img/pkmbjw-2.png') }}"
                            alt="" style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Tentang Kami</p>
                    <h1 class="mb-4 fs-3 fs-md-2 fs-lg-1">Puskesmas Banjarwangi: Garda Terdepan Kesehatan Masyarakat</h1>
                    <p>Pusat Kesehatan Masyarakat adalah lembaga pelayanan kesehatan yang memberikan berbagai jenis
                        pelayanan kesehatan dengan harga yang terjangkau dan mudah diakses oleh masyarakat.</p>
                    <p class="mb-4">Memilih puskesmas yang tepat sangat penting untuk menjaga kesehatan keluarga.
                        Datanglah ke Puskesmas kami untuk mendapatkan pelayanan kesehatanterbaik bagi Anda dan keluarga.</p>
                    <div class="d-flex align-items-start text-check-responsive mb-3">
                        <i class="far fa-check-circle text-primary me-3 flex-shrink-0"></i>
                        <p class="mb-0 flex-grow-1">Tim medis yang profesional dan terlatih</p>
                    </div>
                    <div class="d-flex align-items-start text-check-responsive mb-3">
                        <i class="far fa-check-circle text-primary me-3 flex-shrink-0"></i>
                        <p class="mb-0 flex-grow-1">Fasilitas kesehatan yang lengkap</p>
                    </div>
                    <div class="d-flex align-items-start text-check-responsive mb-3">
                        <i class="far fa-check-circle text-primary me-3 flex-shrink-0"></i>
                        <p class="mb-0 flex-grow-1">Pelayanan kesehatan terbaik dan ramah kepada pasien</p>
                    </div>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3 btn-readmore-responsive" href="{{ url('/about') }}">Lihat Semua tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl ">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Layanan Kami</p>
                <h1>Solusi Kesehatan Anda</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-heartbeat text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Poli Umum</h4> {{-- Ubah judul agar lebih spesifik --}}
                        <p class="mb-4">Melayani pemeriksaan, diagnosis, pengobatan berbagai penyakit umum, serta
                            konsultasi kesehatan dasar.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-child text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Imunisasi</h4>
                        <p class="mb-4">Pelayanan kesehatan bagi ibu dan anak-anak, untuk mencegah penyebaran penyakit
                            yang dapat mengancam kesehatan, seperti campak, polio dan hepatitis.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-tooth text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Kesehatan Gigi</h4>
                        <p class="mb-4">Memberikan perawatan gigi dan mulut untuk mencegah terjadinya masalah kesehatan
                            gigi yang lebih serius di masa depan</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-leaf text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Kesehatan Lingkungan</h4>
                        <p class="mb-4">Mengawasi kebersihan lingkungan, sanitasi lingkungan, dan pengawasan penyediaan
                            air bersih untuk mencegah terjadinya penyakit yang disebabkan oleh lingkungan yang tidak sehat
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-shield-alt text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Surveilans & P2P</h4>
                        <p class="mb-4">Melakukan pengawasan, pencegahan, dan pengendalian penyakit menular di
                            masyarakat, termasuk penanganan KLB (Kejadian Luar Biasa).</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-venus-mars text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Kesehatan Reproduksi</h4>
                        <p class="mb-4">Memberikan layanan pemeriksaan kehamilan, perawatan pasca persalinan dan
                            konseling tentang kesehatan reproduksi untuk membantu ibu dan pasangan dalam merencanakan
                            keluarga dan menjaga kesehatan reproduksi</p>
                    </div>
                </div>
                <div class="text-center mt-5 wow fadeIn" data-wow-delay="0.1s"> {{-- Tambahkan wow fadeIn untuk animasi --}}
            <a class="btn btn-primary rounded-pill py-3 px-5 mt-1 btn-readmore-responsive" href="{{ url('/about') }}">Lihat Semua Layanan</a>
        </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="d-inline-block border rounded-pill text-light py-1 px-4">Fitur Unggulan</p>
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
<!-- End #section -->
