@extends('layouts.main')

@section('post')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5"> {{-- PASTIKAN TIDAK ADA "position-relative" DI SINI --}}
            <h1 class="display-3 text-white mb-3 animated slideInDown text-center">Layanan Kami</h1>
            <nav aria-label="breadcrumb" class="custom-breadcrumb-position"> {{-- PASTIKAN TIDAK ADA "animated slideInDown" DI SINI --}}
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">BERANDA</a></li>
                    <li class="breadcrumb-item text-info active" aria-current="page">LAYANAN</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;" id="jenis_layanan">
                <p class="d-inline-block border rounded-pill py-1 px-4">Layanan Kami</p>
                <h1>Solusi Kesehatan Anda</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5 position-relative">
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class=" fa fa-building text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Klaster 1</h4> {{-- Ubah judul agar lebih spesifik --}}
                        <p class="mb-4">Manajemen puskesmas.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5 position-relative">
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-child text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Klaster 2</h4>
                        <p class="mb-4">Melayani pemeriksaan ibu hamil bersalin dan nifas <br> Melayani pemeriksaaan kesehatan bayi dan ank balita <br> Melayani pemeriksaan anak pra-sekolah <br> Melayani Pemeriksaan anak usia sekolah <br> Melayani pemeriksaan remaja</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5 position-relative">
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-user text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Klaster 3</h4>
                        <p class="mb-4">Melayani pelayanan kesehatan usia dewasa (18-60 Tahun). <br> Melayani kesehatan usia lanjut (>60 tahun)</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5 position-relative">
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-database text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Klaster 4</h4>
                        <p class="mb-4">Penanggulangan penyakit menular <br> Kesehatan Lingkungan <br>Surveilans
                        </p>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5 position-relative">
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
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
                    <div class="service-item bg-light rounded h-100 p-5 position-relative">
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-venus-mars text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Kesehatan Reproduksi</h4>
                        <p class="mb-4">Memberikan layanan pemeriksaan kehamilan, perawatan pasca persalinan dan
                            konseling tentang kesehatan reproduksi untuk membantu ibu dan pasangan dalam merencanakan
                            keluarga dan menjaga kesehatan reproduksi</p>
                    </div>
                </div> --}}
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5 position-relative">
                        <span class="badge bg-secondary text-white position-absolute top-0 end-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Layanan Diluar Klaster
                        </span>
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Setiap Hari: 24 Jam
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-first-aid text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Unit Gawat Darurat (UGD)</h4>
                        <p class="mb-4">Pelayanan medis darurat 24 jam untuk kondisi yang memerlukan penanganan cepat dan
                            segera, sebelum rujukan ke rumah sakit.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5 position-relative" style="background-color: #d7eef5;">
                        <span class="badge bg-secondary text-white position-absolute top-0 end-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Layanan Diluar Klaster
                        </span>
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-pills text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">PONED</h4>
                        <p class="mb-4">Melayani pelayanan pemeriksaan kesehatan gigi dan mulut <br> melayani pelayanan ke farmasian br melayani pelayanan laboratorium melayani pelauanan PONED melayani pelayanan unit gawat darurat, melayani pelayanan rawat inap</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5 position-relative" style="background-color: #d7eef5;">
                        <span
                            class="badge bg-secondary text-white position-absolute top-0 end-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Layanan Diluar Klaster
                        </span>
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-flask text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Laboratorium</h4>
                        <p class="mb-4">Melayani berbagai pemeriksaan penunjang diagnostik seperti pemeriksaan darah,
                            urin, feses, dan lainnya untuk mendukung diagnosis penyakit.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5 position-relative" style="background-color: #d7eef5;">
                        <span
                            class="badge bg-secondary text-white position-absolute top-0 end-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Layanan Diluar Klaster
                        </span>
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Setiap Hari: 24 Jam
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-bed text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Rawat Inap</h4>
                        <p class="mb-4">Fasilitas perawatan bagi pasien yang memerlukan observasi dan penanganan medis
                            lebih lanjut dalam jangka waktu tertentu.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5 position-relative" style="background-color: #d7eef5;">
                        <span
                            class="badge bg-secondary text-white position-absolute top-0 end-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Layanan Diluar Klaster
                        </span>
                        <span
                            class="badge bg-primary text-white position-absolute bottom-0 start-0 m-3 rounded-pill py-1 px-2"
                            style="font-size: 0.75rem;">
                            Senin - Sabtu: 07:30 - 14:00
                        </span>
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 65px; height: 65px;">
                            <i class="fa fa-exclamation-triangle text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Penanggulangan Krisis Kesehatan</h4>
                        <p class="mb-4">Respons cepat dan terkoordinasi dalam menghadapi wabah penyakit, bencana, atau
                            situasi darurat kesehatan lainnya di masyarakat.</p>
                    </div>
                </div>
            </div>

            <hr class="my-5"> {{-- Garis pemisah antar bagian --}}

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;" id="prosedur_pelayanan">
            <p class="d-inline-block border rounded-pill py-1 px-4">Prosedur</p>
            <h1 class="mb-4">Informasi Prosedur Pelayanan</h1>
            <p class="mb-0">Untuk memastikan kelancaran pelayanan, berikut adalah beberapa informasi penting mengenai prosedur dan persyaratan yang perlu Anda ketahui sebelum berkunjung ke Puskesmas Banjarwangi.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-10"> {{-- Lebarkan kolom agar daftar terlihat bagus --}}
                
                {{-- Syarat Pendaftaran Umum --}}
                <h4 class="mb-3 text-primary">Syarat Pendaftaran Umum:</h4>
                <div class="row g-3"> {{-- Gunakan row untuk membuat daftar dalam grid --}}
                    <div class="col-sm-6"> {{-- Setiap item menjadi kolom responsif --}}
                        <div class="d-flex align-items-start border rounded p-3 h-100"> {{-- Item border, padding, height --}}
                            <i class="fas fa-id-card-alt text-primary me-3 pt-1 fs-5"></i> {{-- Icon KTP --}}
                            <p class="mb-0">Kartu Tanda Penduduk (KTP) atau identitas diri lainnya.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start border rounded p-3 h-100">
                            <i class="fas fa-handshake text-primary me-3 pt-1 fs-5"></i> {{-- Icon BPJS --}}
                            <p class="mb-0">Kartu BPJS Kesehatan / Kartu Indonesia Sehat (KIS) bagi peserta JKN.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start border rounded p-3 h-100">
                            <i class="fas fa-address-card text-primary me-3 pt-1 fs-5"></i> {{-- Icon Kartu Berobat --}}
                            <p class="mb-0">Kartu Berobat Puskesmas (jika sudah memiliki).</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start border rounded p-3 h-100">
                            <i class="fas fa-file-alt text-primary me-3 pt-1 fs-5"></i> {{-- Icon Surat Rujukan --}}
                            <p class="mb-0">Surat Rujukan dari fasilitas kesehatan lain (jika diperlukan).</p>
                        </div>
                    </div>
                </div>

                {{-- Ganti seluruh blok Alur Pelayanan Singkat dengan ini --}}
<h4 class="mb-3 mt-4 text-primary" id="alur_pendaftaran">Lihat Alur Pendaftaran:</h4>
<div class="row g-3 justify-content-center"> {{-- Gunakan row untuk menata tombol --}}
    <div class="col-sm-6 col-md-4"> {{-- Kolom untuk tombol online --}}
        <a href="{{ asset('home/img/pendaftaran_online.png') }}" data-lightbox="alur-pendaftaran" class="btn btn-info w-100 py-3 rounded">
            <i class="fas fa-cloud-upload-alt me-2"></i> Alur Pendaftaran Online
        </a>
    </div>
    <div class="col-sm-6 col-md-4"> {{-- Kolom untuk tombol offline --}}
        <a href="{{ asset('home/img/pendaftaran_offline.png') }}" data-lightbox="alur-pendaftaran" class="btn btn-success w-100 py-3 rounded">
            <i class="fa fa-users me-2"></i> Alur Pendaftaran Offline
        </a>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

    <hr class="my-5"> {{-- Garis pemisah antar bagian --}}

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;" id="biaya_pelayanan">
            <p class="d-inline-block border rounded-pill py-1 px-4">Biaya</p>
            <h1 class="mb-4">Informasi Biaya Pelayanan</h1>
            <p class="mb-0">Puskesmas Banjarwangi berkomitmen menyediakan akses layanan kesehatan yang terjangkau bagi seluruh lapisan masyarakat. Berikut adalah informasi terkait biaya pelayanan:</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-10"> {{-- Lebarkan kolom agar daftar terlihat bagus --}}
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex align-items-start border rounded p-3 bg-light h-100"> {{-- Gunakan bg-light atau bg-white --}}
                            <i class="fas fa-id-card-alt text-primary me-3 pt-1 fs-5"></i>
                            <div>
                                <p class="mb-0"><strong>Bagi Peserta Jaminan Kesehatan Nasional (JKN) / BPJS Kesehatan:</strong> Pelayanan adalah <strong>GRATIS</strong> sesuai dengan prosedur dan ketentuan yang berlaku.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start border rounded p-3 bg-light h-100">
                            <i class="fas fa-hand-holding-usd text-primary me-3 pt-1 fs-5"></i>
                            <div>
                                <p class="mb-0"><strong>Bagi Pasien Umum (Non-BPJS Kesehatan):</strong> Biaya pelayanan akan dikenakan sesuai dengan Peraturan Daerah (Perda) yang berlaku. Rincian biaya dapat ditanyakan langsung di loket pendaftaran atau bagian informasi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-start border rounded p-3 bg-light h-100">
                            <i class="fas fa-info-circle text-primary me-3 pt-1 fs-5"></i>
                            <div>
                                <p class="mb-0">Kami selalu mengedepankan transparansi dalam setiap transaksi pelayanan. Informasi lebih lanjut dapat ditanyakan pada petugas kami.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
    <!-- Service End -->
@endsection
<!-- End #section -->
