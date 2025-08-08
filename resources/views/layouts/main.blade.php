<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Puskesmas Banjarwangi | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('home/img/favicon-puskesmas.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2b+fLz9zS05+D/Vj6aP/gA8FzS7n115xS9/A9Z5A3A05R0X8e6nL9w+2w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('home/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">

    

    <!-- Template SweetAlert -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    
    
    <!-- Template Stylesheet -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    <style>
    /* ---------------------------------------------------- */
/* SOLUSI TERAKHIR DAN TERKUAT UNTUK TAMPILAN LIST DI CHATBOT */
/* ---------------------------------------------------- */

/* Menimpa semua gaya default list pada container chat */
.chat {
    list-style: none !important;
    background: transparent !important;
    padding: 0 !important;
    margin: 0 !important;
}

/* Mengatur ulang gaya untuk elemen UL dan OL di dalam gelembung pesan (.msg) */
.msg ul,
.msg ol {
    /* Atur ulang semua margin dan padding */
    margin: 8px 0 !important;
    padding-left: 20px !important;
    
    /* Memastikan bullet/nomor ditampilkan */
    list-style-position: inside !important;
    color: #000 !important; /* Warna teks */
    display: block !important;
}

/* Memastikan bullet/nomor untuk UL (unordered list) */
.msg ul {
    list-style-type: disc !important; /* Tanda titik */
}

/* Memastikan nomor untuk OL (ordered list) */
.msg ol {
    list-style-type: decimal !important; /* Angka (1, 2, 3) */
}

/* Gaya untuk setiap item list (LI) */
.msg li {
    /* Pastikan LI ditampilkan sebagai item list dengan bullet/nomor */
    display: list-item !important;
    
    /* Mengatur ulang margin dan padding untuk menghindari indentasi ganda */
    margin-left: 0 !important;
    padding-left: 0 !important;
    
    /* Pastikan gaya lain tidak menimpa */
    background-color: transparent !important;
    color: inherit !important;
    text-align: inherit !important;
}

/* Fix untuk tag <p> yang sering muncul di dalam LI dari editor */
.msg li p {
    margin: 0 !important;
    padding: 0 !important;
    display: inline !important; /* Memastikan teks dan bullet berada di baris yang sama */
    line-height: normal !important;
}

/* Jarak antar paragraf dan list */
.msg > div > p:first-child:not(:last-child) {
    margin-bottom: 5px !important;
}

/* ---------------------------------------------------- */
/* GAYA UNTUK WIDGET OPENER, TOOLTIP, DLL. (tidak berubah) */
/* ---------------------------------------------------- */
#botmanTooltip {
    position: fixed;
    bottom: 95px;
    right: 27px;
    transform: translateX(0);
    background-color: #3490dc;
    color: white;
    padding: 0.5em 0.75em;
    border-radius: 8px;
    font-size: 0.9em;
    z-index: 10001;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    display: none;
    white-space: nowrap;
    max-width: 250px;
    text-align: center;
}

#botmanTooltip::after {
    content: '';
    position: absolute;
    bottom: -8px;
    right: 15px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid #3490dc;
    z-index: 10002;
}

/* CSS RESPONSIVE */
@media (max-width: 768px) {
    #botmanTooltip {
        bottom: 95px;
        right: 32px;
        font-size: 0.85em;
        max-width: 200px;
        padding: 0.4em 0.6em;
    }

    #botmanTooltip::after {
        bottom: -7px;
        right: 10px;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-top: 7px solid #3490dc;
    }
}

@media (max-width: 480px) {
    #botmanTooltip {
        bottom: 85px;
        right: 35px;
        font-size: 0.75em;
        max-width: 170px;
        padding: 0.3em 0.4em;
    }

    #botmanTooltip::after {
        bottom: -5px;
        right: 5px;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #3490dc;
    }
}

.botman-widget-opener {
    position: fixed !important;
    bottom: 20px !important;
    right: 20px !important;
    width: 60px !important;
    height: 60px !important;
    border-radius: 50% !important;
    background-color: #3490dc !important;
    color: white !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 28px !important;
    cursor: pointer !important;
    z-index: 10000 !important;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3) !important;
    transform: none !important;
    opacity: 1 !important;
    visibility: visible !important;
}

.botman-widget-opener img {
    width: 100% !important;
    height: 100% !important;
    object-fit: contain !important;
    border-radius: 50% !important;
}

@media (max-width: 480px) {
    .botman-widget-opener {
        bottom: 15px !important;
        right: 15px !important;
        width: 50px !important;
        height: 50px !important;
        font-size: 24px !important;
    }
}

/* ---------------------------------------------------- */
/* Gaya untuk widget opener, tooltip, dll. (tidak berubah) */
/* ---------------------------------------------------- */
/* ... (Sertakan kembali kode CSS Anda untuk #botmanTooltip, .botman-widget-opener, dll. di sini) ... */










    /* ---------------------------------------------------- */
    /* CSS DEFAULT (UNTUK DESKTOP / LAYAR BESAR) */
    /* ---------------------------------------------------- */
    #botmanTooltip {
        position: fixed;
        bottom: 95px;
        right: 27px;
        transform: translateX(0);
        background-color: #3490dc;
        color: white;
        padding: 0.5em 0.75em;
        border-radius: 8px;
        font-size: 0.9em;
        z-index: 10001;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        display: none;
        white-space: nowrap;
        max-width: 250px;
        text-align: center;
    }

    #botmanTooltip::after {
        content: '';
        position: absolute;
        bottom: -8px;
        right: 15px;
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-top: 8px solid #3490dc;
        z-index: 10002;
    }

    /* ---------------------------------------------------- */
    /* CSS RESPONSIVE UNTUK LAYAR TABLET / MOBILE (<= 768px) */
    /* ---------------------------------------------------- */
    @media (max-width: 768px) {
        #botmanTooltip {
            bottom: 95px;
            right: 32px;
            font-size: 0.85em;
            max-width: 200px;
            padding: 0.4em 0.6em;
        }

        #botmanTooltip::after {
            bottom: -7px;
            right: 10px;
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-top: 7px solid #3490dc;
        }
    }

    /* ---------------------------------------------------- */
    /* CSS RESPONSIVE UNTUK LAYAR HP (<= 480px) */
    /* ---------------------------------------------------- */
    @media (max-width: 480px) {
        #botmanTooltip {
            bottom: 85px;
            right: 35px;
            font-size: 0.75em;
            max-width: 170px;
            padding: 0.3em 0.4em;
        }

        #botmanTooltip::after {
            bottom: -5px;
            right: 5px;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #3490dc;
        }
    }

    /* ---------------------------------------------------- */
    /* CSS BotMan Widget Opener (Icon) */
    /* ---------------------------------------------------- */
    .botman-widget-opener {
        position: fixed !important;
        bottom: 20px !important;
        right: 20px !important;
        width: 60px !important;
        height: 60px !important;
        border-radius: 50% !important;
        background-color: #3490dc !important;
        color: white !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 28px !important;
        cursor: pointer !important;
        z-index: 10000 !important;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3) !important;
        transform: none !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    .botman-widget-opener img {
        width: 100% !important;
        height: 100% !important;
        object-fit: contain !important;
        border-radius: 50% !important;
    }

    @media (max-width: 480px) {
        .botman-widget-opener {
            bottom: 15px !important;
            right: 15px !important;
            width: 50px !important;
            height: 50px !important;
            font-size: 24px !important;
        }
    }


    /* Mengubah background chat bot */
#messageArea {
    background: #ffffff !important;
}

/* Menampilkan dan mengubah desain tombol kirim (panah) */
.send-button {
    display: flex !important;
    align-items: center;
    justify-content: center;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-left: 10px;
    cursor: pointer;
    outline: none;
}

/* Pastikan ikonnya terlihat */
.send-button span {
    display: none !important;
}
.send-button::before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f105"; /* Ikon panah */
    font-size: 24px;
    color: #fff;
}
</style>


</head>

<body>


    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    {{-- <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Kec. Banjarwangi, Garut</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Sen - Min : 08.00 - 15.00</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Topbar End -->


    <!-- Navbar Start -->

    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">

        <a href="{{ url('/') }}" class="navbar-brand m-0 d-flex align-items-center px-3">
            <img src="{{ asset('home/img/LOGO.svg') }}" alt="Logo Puskesmas Banjarwangi"
                class="puskesmas-logo-icon me-2">
        </a>

        <button type="button" class="navbar-toggler me-3 collapsed" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <div class="navbar-toggler-lines">
                <span class="line-top"></span>
                <span class="line-middle"></span>
                <span class="line-bottom"></span>
            </div>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                {{-- Indikator Profil Pengguna (Hanya Tampil di Mobile) --}}
                @if (Auth::check() && Auth::user()->role === 'pengunjung')
                    <div class="nav-item d-lg-none my-2 mobile-profile-divider d-flex justify-content-between align-items-center"
                        style="padding-bottom: 8px; margin-bottom: 8px;">
                        {{-- Link Profil (bagian kiri) --}}
                        <a class="nav-link d-flex align-items-center" href="#"
                            style="cursor: pointer; padding-left: 0; padding-right: 0;"> {{-- Hapus padding internal default nav-link --}}
                            <img class="rounded-circle me-2" src="{{ asset('dashboard/img/user.png') }}" alt=""
                                style="width: 28px; height: 28px;">
                            <span style="font-size: 14px; font-weight: 600;">Hi,
                                {{ Str::words(Auth::user()->name, 1, '') }}</span>
                        </a>

                        {{-- Tombol Logout (ICON SAJA) di sisi kanan --}}
                        <form method="POST" action="{{ route('pengunjung.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-secondary"> {{-- Gunakan btn-sm --}}
                                <i class="fas fa-sign-out-alt fa-lg"></i> {{-- Gunakan fa-lg --}}
                            </button>
                        </form>
                    </div>
                @endif

                {{-- Item menu navigasi utama --}}
                <a href="{{ url('/') }}"
                    class="nav-item nav-link {{ $title === 'Beranda' ? 'active' : '' }}">Beranda
                    @if ($title === 'Beranda')
                        <span class="active-indicator d-none d-lg-block"><i class="fas fa-caret-down"></i></span>
                    @endif
                </a>
                <!-- Ganti dengan kode ini untuk membuat dropdown -->
                <div class="nav-item dropdown">
                    <a href="{{ url('/about') }}" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/about#visimisi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="{{ url('/about#galeri') }}">Galeri Kami</a></li>
                        <li><a class="dropdown-item" href="{{ url('/about#fitur_unggulan') }}">Fitur Unggulan</a></li>
                    </ul>
                </div>
                <div class="nav-item dropdown">
                    <a href="{{ url('/service') }}" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan Kami
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/service#jenis_layanan') }}">Jenis Layanan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/service#prosedur_pelayanan') }}">Prosedur Pelayanan</a></li>
                        <li><a class="dropdown-item" href="{{ url('/service#alur_pendaftaran') }}">Alur Pendaftaran</a></li>
                        <li><a class="dropdown-item" href="{{ url('/service#biaya_pelayanan') }}">Biaya Pelayanan</a></li>
                    </ul>
                </div>
                
                <a href="{{ url('/dokter') }}"
                    class="nav-item nav-link {{ $title === 'Dokter' ? 'active' : '' }}">Dokter
                    @if ($title === 'Dokter')
                        <span class="active-indicator d-none d-lg-block"><i class="fas fa-caret-down"></i></span>
                    @endif
                </a>
                <a href="{{ url('/berita') }}"
                    class="nav-item nav-link {{ $title === 'Berita' ? 'active' : '' }}">Berita
                    @if ($title === 'Berita')
                        <span class="active-indicator d-none d-lg-block"><i class="fas fa-caret-down"></i></span>
                    @endif
                </a>
                <a href="{{ url('/contact') }}"
                    class="nav-item nav-link {{ $title === 'Hubungi Kami' ? 'active' : '' }}">Kontak
                    @if ($title === 'Hubungi Kami')
                        <span class="active-indicator d-none d-lg-block"><i class="fas fa-caret-down"></i></span>
                    @endif
                </a>

                {{-- Tombol Logout (Sebagai item menu setelah Contact) --}}
                {{-- Hanya tampil di mobile --}}
                {{-- @if (Auth::check() && Auth::user()->role === 'pengunjung')
                    <li class="nav-item d-lg-none mt-2"> 
                        <form method="POST" action="{{ route('pengunjung.logout') }}">
                            @csrf
                            <button type="submit"
                                class="nav-link btn btn-link text-decoration-none text-start w-100 py-2"
                                style="color: var(--bs-navbar-color);">Log Out</button>
                        </form>
                    </li>
                @endif --}}

                {{-- Indikator Profil dan Logout untuk Desktop (di sebelah kanan tombol Pendaftaran Pasien) --}}
                @if (Auth::check() && Auth::user()->role === 'pengunjung')
                    <div class="nav-item dropdown d-none d-lg-block ms-3"> {{-- Memberi margin kiri di desktop --}}
                        <a class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-2" src="{{ asset('dashboard/img/user.png') }}"
                                alt="" style="width: 28px; height: 28px;">
                            <span style="font-size: 14px;">Hi, {{ Str::limit(Auth::user()->name, 10) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <form method="POST" action="{{ route('pengunjung.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Tombol pendaftaran --}}
<a href="{{ url('/pendaftaran') }}" class="btn btn-primary rounded-0 py-4 px-lg-4 d-none d-lg-block">
    Pendaftaran Pasien<i class="fa fa-arrow-right ms-3"></i>
</a>
<a href="{{ url('/pendaftaran') }}"
    class="btn btn-primary rounded-0 d-block d-lg-none d-flex justify-content-center align-items-center text-center"
    style="height: 50px;">
    Daftar Sekarang<i class="fa fa-arrow-right ms-2"></i>
</a>
        </div>
    </nav>


    <!-- Navbar End -->

    @yield('post')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Peta Google Maps</h5>
                    {{-- BAGIAN BARU: PETA GOOGLE MAPS EMBED --}}
                    <div class="mb-3 rounded-3 overflow-hidden shadow-sm">
                        {{-- Link ke Google Maps versi penuh saat peta diklik --}}
                        <a href="https://www.google.com/maps/place/Puskesmas+Banjarwangi/@-7.4404697,107.9038249,3a,75y,314.18h,102.96t/data=!3m7!1e1!3m5!1sV3Hjys1BqBSy_p4sEQJB7A!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fcb_client%3Dmaps_sv.tactile%26w%3D900%26h%3D600%26pitch%3D-12.963116366393848%26panoid%3DV3Hjys1BqBSy_p4sEQJB7A%26yaw%3D314.18169053882076!7i16384!8i8192!4m14!1m7!3m6!1s0x2e6602f64fae8f2f:0x8a65286986fcc275!2sPuskesmas+Banjarwangi!8m2!3d-7.440438!4d107.9036791!16s%2Fg%2F11b76fpn3x!3m5!1s0x2e6602f64fae8f2f:0x8a65286986fcc275!8m2!3d-7.440438!4d107.9036791!16s%2Fg%2F11b76fpn3x?hl=id&entry=ttu&g_ep=EgoyMDI1MDYxMC4xIKXMDSoASAFQAw%3D%3D"
                            target="_blank" rel="noopener noreferrer">
                            {{-- Embed kode iframe dari Google Maps Anda di sini --}}
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.22410813576!2d107.90110417381692!3d-7.440437992570504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6602f64fae8f2f%3A0x8a65286986fcc275!2sPuskesmas%20Banjarwangi!5e0!3m2!1sid!2sid!4v1749833765430!5m2!1sid!2sid"
                                width="100%" height="200" {{-- Sesuaikan tinggi peta sesuai keinginan Anda --}}
                                style="border:0; border-radius: 0.5rem;" {{-- Tambahkan border-radius dan pastikan border 0 --}} allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </a>
                    </div>
                    {{-- AKHIR PETA GOOGLE MAPS EMBED --}}


                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Hubungi Kami</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kec. Banjarwangi, Garut</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>pkmbjw@gmail.com</p>
                    <div class="d-flex pt-2">

                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="https://web.facebook.com/puskesmas.banjarwangi.2025"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="https://www.instagram.com/puskesmasbanjarwangi?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle"
                            href="https://youtube.com/@pkmbanjarwangichannel3751?si=MzDwVJ1nNYyEt1wN"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Pelayanan</h5>
                    <a class="btn btn-link">Cardiology</a>
                    <a class="btn btn-link">Pulmonary</a>
                    <a class="btn btn-link">Neurology</a>
                    <a class="btn btn-link">Orthopedics</a>
                    <a class="btn btn-link">Laboratory</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Kunjungi</h5>
                    <a class="btn btn-link" href="{{ url('/about') }}">Tentang Kami</a>
                    <a class="btn btn-link" href="{{ url('/service') }}">Layanan Kami</a>
                    <a class="btn btn-link" href="{{ url('/contact') }}">Hubungi Kami</a>
                    <a class="btn btn-link" href="{{ url('/pendaftaran') }}">Pendaftaran Pasien</a>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">PUSKESMAS-BANJARWANGI</a>, All Right Reserved.
                    </div>
                    {{-- <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <div id="botmanTooltip">👋 Klik di sini untuk bantuan!</div>

    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a> --}}


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('home/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('home/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('home/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('home/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('home/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('home/js/main.js') }}"></script>

    <!-- Template SweetAlert -->
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Template Alert --}}
    <script>
        // SweetAlert2 untuk pesan sukses
        // Periksa apakah ada pesan 'success' dari session
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false, // Tombol OK tidak ditampilkan
                timer: 3000 // Menghilang setelah 3 detik
            });
        @endif
    </script>

    {{-- Template Chatbot --}}
    <script>
        const tooltip = document.getElementById('botmanTooltip');
        console.log('JS-Tooltip: Element found:', tooltip);

        function toggleTooltip(show) {
            console.log('JS-Tooltip: Attempting to toggle. Show:', show);
            if (tooltip) {
                tooltip.style.display = show ? 'block' : 'none';
                console.log('JS-Tooltip: Display set to:', tooltip.style.display);
            } else {
                console.warn('JS-Tooltip: Cannot toggle, element not found in toggleTooltip.');
            }
        }

        function startTooltipCycle() {
            console.log('JS-Tooltip: Starting cycle.');
            toggleTooltip(true);
            setTimeout(() => {
                toggleTooltip(false);
                // Ulangi setelah 3 detik tersembunyi (5000ms - 2000ms = 3000ms)
                setTimeout(startTooltipCycle, 3000);
            }, 5000); // Sembunyikan setelah 5 detik
        }

        document.addEventListener('DOMContentLoaded', () => {
    console.log('JS-Tooltip: DOMContentLoaded fired.');
    const chatContainer = document.querySelector('.chatbot-container'); // Ambil container chat kustom Anda
    if (tooltip && chatContainer && chatContainer.style.display === 'none') {
        startTooltipCycle();
    } else {
        console.warn('JS-Tooltip: Tooltip not cycling because chat is open or elements not found.');
    }
});

        window.addEventListener('load', () => {
            console.log('JS-Tooltip: window.load fired. Re-checking tooltip visibility.');
            if (tooltip && tooltip.style.display === 'none') {
                // Ini mungkin tidak lagi diperlukan jika DOMContentLoaded sudah menemukan elemen
                // tetapi bisa menjadi fallback yang baik.
                // toggleTooltip(true);
                // console.log('JS-Tooltip: Forced display: block on window.load as fallback.');
            }
        });
    </script>

    {{-- <script>
    var botmanWidget = {
        aboutText: 'ChatBot Puskesmas',
        introMessage: "👋 Halo! Ada yang bisa saya bantu?",
        chatServer: '/botman',
        mainColor: '#3490dc', // Warna utama UI widget (header, dll.)
        
        // --- INI PENTING: Atur bubbleBackground ke TRANSPARAN atau warna dasar yang netral ---
        // Biarkan CSS eksternal yang mengatur warnanya
        bubbleBackground: 'transparent', // Atur ini agar tidak ada background default dari JS
        
        bubbleAvatarUrl: '/home/img/Logo Chatbot.svg',
        title: 'ChatBot Puskesmas',
        renderBrowser: true, 
        html_sanitizer: false, 
        
        onNewMessage: function(event, message, data) {
            // Logika onNewMessage Anda (tambah kelas chatbot/visitor)
            setTimeout(function() {
                var messageBubbleElement = document.querySelector('.msg:last-child');
                if (messageBubbleElement && message) {
                    if (message.isFrom('bot')) {
                        messageBubbleElement.parentElement.classList.add('chatbot');
                    } else {
                        messageBubbleElement.parentElement.classList.add('visitor');
                    }
                    // Logika decodeHtmlEntities
                    var messageContentElement = messageBubbleElement.querySelector('div > p:last-child') || 
                                                messageBubbleElement.querySelector('.message-text') ||
                                                messageBubbleElement.querySelector('div > p:first-child');
                    if (messageContentElement && message.text) {
                        messageContentElement.innerHTML = decodeHtmlEntities(message.text);
                    }
                }
                if (typeof scrollChatToBottom === 'function') {
                    scrollChatToBottom();
                }
            }, 300);
        }
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}

    {{-- <script>
        // Definisi fungsi forceResponsiveChatHeight
        function forceResponsiveChatHeight() {
            const olChat = document.querySelector('ol.chat');
            const messageArea = document.getElementById('messageArea'); // Periksa apakah elemen ini benar-benar ada

            const botmanBody = document.querySelector('.botman-widget-body');

            if (olChat) {
                olChat.style.height = 'auto';
                olChat.style.flexGrow = '1';
                olChat.style.minHeight = '0';
                console.log('JS-Custom: ol.chat styled.');
            } else {
                console.warn('JS-Custom: ol.chat not found for forceResponsiveChatHeight.');
            }

            // Hanya terapkan jika #messageArea benar-benar ada di DOM BotMan Anda
            if (messageArea) {
                messageArea.style.flexGrow = '1';
                messageArea.style.display = 'flex';
                messageArea.style.flexDirection = 'column';
                messageArea.style.overflowY = 'auto';
                console.log('JS-Custom: #messageArea styled.');
            } else {
                console.warn('JS-Custom: #messageArea not found. Fallback to ol.chat for scroll.');
                if (olChat) {
                    olChat.style.flexGrow = '1';
                    olChat.style.overflowY = 'auto';
                }
            }

            if (botmanBody) {
                botmanBody.style.flexGrow = '1';
                botmanBody.style.display = 'flex';
                botmanBody.style.flexDirection = 'column';
                botmanBody.style.overflow = 'hidden';
                console.log('JS-Custom: .botman-widget-body styled.');
            } else {
                console.warn('JS-Custom: .botman-widget-body not found.');
            }
        }

        // Definisi fungsi scrollChatToBottom
        function scrollChatToBottom() {
            // Coba #messageArea dulu, kalau tidak ada, coba ol.chat
            const scrollContainer = document.getElementById('messageArea') || document.querySelector('ol.chat');
            if (scrollContainer) {
                setTimeout(() => {
                    scrollContainer.scrollTop = scrollContainer.scrollHeight;
                    console.log('JS-Custom: Scrolled to bottom. scrollHeight:', scrollContainer.scrollHeight);
                }, 50);
            } else {
                console.warn('JS-Custom: Scroll container for auto-scroll not found.');
            }
        }

        // Definisi MutationObserver untuk auto-scroll saat pesan baru
        // Targetkan ol.chat karena itu adalah container pesan utama BotMan
        const targetNodeForObserver = document.querySelector('ol.chat');
        if (targetNodeForObserver) {
            const observerConfig = {
                childList: true,
                subtree: true
            };
            const observer = new MutationObserver((mutationsList) => {
                for (let mutation of mutationsList) {
                    if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                        console.log('JS-Custom: MutationObserver detected new node(s). Triggering scroll.');
                        scrollChatToBottom();
                        break;
                    }
                }
            });
            observer.observe(targetNodeForObserver, observerConfig);
            console.log('JS-Custom: MutationObserver started on:', targetNodeForObserver.id || targetNodeForObserver
                .tagName);
        } else {
            console.warn(
                'JS-Custom: Target node for MutationObserver not found. Auto-scroll on new messages might not work reliably.'
            );
        }

        // Panggil saat window.load untuk inisialisasi awal
        window.addEventListener('load', () => {
            console.log('JS-Custom: Window loaded. Attempting initial forceResponsiveChatHeight and scroll.');
            setTimeout(() => {
                forceResponsiveChatHeight();
                scrollChatToBottom();
            }, 1500); // Delay yang lebih lama untuk memastikan BotMan selesai load dan elemen DOM-nya ada
        });
    </script> --}}

    

    {{-- CSS CHATBOT --}}
    <style>
/* CSS UNTUK UI CHAT CUSTOM ANDA */
.chatbot-container {
    width: 400px;
    height: 500px;
    background-color: #f0f0f0; /* BACKGROUND KUSTOM: Ganti sesuai keinginan */
    /* box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); */
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    font-family: sans-serif;
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
}

.chatbot-header {
    background-color: #3490dc;
    color: #fff;
    padding: 10px 15px; /* Sesuaikan padding */
    display: flex; /* Menggunakan flexbox untuk tata letak */
    align-items: center;
    justify-content: space-between;
    font-weight: bold;
    position: relative;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.chatbot-header .profile {
    display: flex;
    align-items: center;
    gap: 10px;
}

.chatbot-header .profile-avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
}

.chatbot-header .profile-name {
    font-size: 16px;
}

.chat-close-btn {
    background: none;
    border: none;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    position: static; /* Ubah posisi agar tetap di dalam flow */
}

/* Tambahkan kelas ini ke body untuk efek overlay */
body.chatbot-open {
    /* Mencegah scroll pada halaman utama */
    overflow: hidden; 
}


body.chatbot-open::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
    z-index: 9998; /* Z-index di bawah chat bot (9999) */
}

/*
 * Bagian ini adalah override khusus untuk mode mobile
 * (layar dengan lebar maksimal 600px)
 */
@media (max-width: 600px) {
    /* Gaya untuk container chat */
    .chatbot-container {
        width: 100%;
        height: 100%;
        bottom: 0;
        right: 0;
        border-radius: 0;
        box-shadow: none;
    }

    /* Mengubah lebar pesan agar lebih penuh di mobile */
    .message-bubble {
        max-width: 90% !important; /* Gunakan !important untuk menimpa gaya default */
    }

    /* Opsi: Hapus padding pada area pesan untuk tampilan edge-to-edge */
    .chatbot-messages {
        padding: 10px;
    }
}

body.chatbot-open::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
        z-index: 9998; /* Z-index di bawah chat bot (9999) */
    }


.chatbot-messages {
    flex-grow: 1;
    padding: 20px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
}

/* Ganti seluruh CSS untuk .message-bubble dan turunannya */
.message-bubble {
    padding: 8px 12px; /* Mengurangi padding untuk ukuran yang lebih kecil */
    border-radius: 18px 18px 18px 0; /* Sudut asimetris untuk pesan bot */
    margin-bottom: 10px;
    max-width: 70%; /* Mengurangi lebar maksimum dari 80% */
    line-height: 1.4;
    font-size: 14px; /* Mengurangi ukuran font */
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.user-message {
    background-color: #3490dc;
    color: #fff;
    align-self: flex-end;
    border-radius: 18px 18px 0 18px; /* Ubah border-radius untuk pesan user */
}

.bot-message {
    display: flex;
    align-items: flex-start;
    padding: 8px 12px; /* Mengurangi padding untuk ukuran yang lebih kecil */
    border-radius: 18px 18px 18px 0;
    margin-bottom: 10px;
    max-width: 70%; /* Mengurangi lebar maksimum dari 80% */
    line-height: 1.4;
    font-size: 14px; /* Mengurangi ukuran font */
    background-color: #e5e5ea;
    color: #000;
    align-self: flex-start;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.chatbot-input-area {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ccc;
    background-color: #fff;
}

#userInput {
    flex-grow: 1;
    border: none;
    padding: 10px;
    border-radius: 20px;
    background-color: #f0f0f0;
    outline: none;
    font-size: 14px;
}

.send-button {
    background-color: #3490dc; /* WARNA DARI mainColor Anda */
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-left: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    outline: none;
}

/* Tambahkan ini ke file CSS Anda */
.button-container {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-top: 10px;
}
/* Ganti seluruh CSS untuk .chat-button */
.chat-button {
    background-color: #ffffff; /* Ubah background menjadi putih */
    color: #007bff; /* Warna teks biru */
    border: 1px solid #007bff; /* Tambahkan border biru */
    border-radius: 999px; /* Membuat bentuk kapsul */
    padding: 8px 15px;
    cursor: pointer;
    font-size: 14px;
    outline: none;
    text-decoration: none;
    text-align: center;
    display: inline-block;
    transition: all 0.3s ease;
    /* --- PERBAIKAN DI SINI --- */
    width: 200px; /* Atur lebar tombol agar konsisten */
    white-space: nowrap; /* Mencegah teks terpotong */
    overflow: hidden; /* Sembunyikan teks yang terlalu panjang */
    text-overflow: ellipsis; /* Tampilkan ... jika teks terlalu panjang */
}

.chat-button:hover {
    background-color: #007bff; /* Isi warna saat di-hover */
    color: #fff; /* Warna teks putih saat di-hover */
}

/* CSS untuk Tombol Bulat di Sudut Bawah */
.floating-chat-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    z-index: 1001; /* Pastikan di atas container chat */
}

/* CSS untuk Tombol Tutup di Header */
.chat-close-btn {
    background: none;
    border: none;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
}

/* Update CSS untuk header agar tombol tutup bisa diposisikan */
.chatbot-header {
    /* ... kode yang sudah ada ... */
    position: relative;
}

/* Pastikan tooltip memiliki posisi tetap dan z-index yang lebih rendah dari chat */
#botmanTooltip {
    position: fixed;
    bottom: 95px;
    right: 26px;
    z-index: 999; /* z-index jendela chat adalah 1000 */
}

/* Tambahkan ini ke file CSS Anda */
.floating-chat-btn .toggle-icon {
    width: 60px; /* Atur ukuran gambar agar pas di dalam tombol 60x60px */
    height: 60px;
    border-radius: 50%; /* Pastikan gambar tidak bulat */
}

/* From Uiverse.io by vinodjangid07 */ 
.messageBox {
  width: fit-content;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #2d2d2d;
  padding: 0 15px;
  border-radius: 10px;
  border: 1px solid rgb(63, 63, 63);
}
.messageBox:focus-within {
  border: 1px solid rgb(110, 110, 110);
}
.fileUploadWrapper {
  width: fit-content;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: Arial, Helvetica, sans-serif;
}

#file {
  display: none;
}
.fileUploadWrapper label {
  cursor: pointer;
  width: fit-content;
  height: fit-content;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.fileUploadWrapper label svg {
  height: 18px;
}
.fileUploadWrapper label svg path {
  transition: all 0.3s;
}
.fileUploadWrapper label svg circle {
  transition: all 0.3s;
}
.fileUploadWrapper label:hover svg path {
  stroke: #fff;
}
.fileUploadWrapper label:hover svg circle {
  stroke: #fff;
  fill: #3c3c3c;
}
.fileUploadWrapper label:hover .tooltip {
  display: block;
  opacity: 1;
}
.tooltip {
  position: absolute;
  top: -40px;
  display: none;
  opacity: 0;
  color: white;
  font-size: 10px;
  text-wrap: nowrap;
  background-color: #000;
  padding: 6px 10px;
  border: 1px solid #3c3c3c;
  border-radius: 5px;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.596);
  transition: all 0.3s;
}
.messages-area {
    width: 100%;
    flex-grow: 1;
    padding: 10px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
}

    .sender-area {
        background-color: #f0f0f0; /* Latar belakang terang */
        width: 100%;
        height: 50px; /* Diperkecil agar lebih pas */
        display: flex;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
        border-top: 1px solid #ddd;
    }

    .input-place {
        display: flex;
        flex-direction: row;
        margin-top: 5px;
        margin-left: 8px;
        align-items: center;
        background-color: #fffefe; /* Warna input terang */
        border-radius: 7px;
        height: 40px;
        width: 95%;
        gap: 5px;
        border: 1px solid #ddd;
    }

    .send-input {
        outline: none;
        display: flex;
        border: none;
        background: none;
        height: 40px;
        width: 90%;
        border-radius: 7px;
        background: none;
        color: #000; /* Warna teks gelap */
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        margin-left: 5px;
    }

    .send-input::placeholder {
        color: #888; /* Warna placeholder gelap */
    }

    .send {
        width: 30px;
        height: 30px;
        background-color: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .send-icon {
        width: 17px;
    }

    .send-icon path {
        fill: #888; /* Warna ikon kirim gelap */
    }


    /* balon chat */
    /* Ganti seluruh CSS untuk .message-bubble dan turunannya */
.message-bubble {
    padding: 10px 15px;
    border-radius: 18px 18px 18px 0; /* Sudut asimetris untuk pesan bot */
    margin-bottom: 10px;
    max-width: 80%;
    line-height: 1.4;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan lembut */
}

.user-message {
    background-color: #3490dc;
    color: #fff;
    align-self: flex-end;
    border-radius: 18px 18px 0 18px; /* Ubah border-radius untuk pesan user */
}

.bot-message {
    background-color: #e5e5ea;
    color: #000;
    align-self: flex-start;
}

/* CSS untuk avatar bot */
.bot-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
}

/* Update CSS untuk pesan bot */
.bot-message {
    display: flex; /* Mengatur layout agar avatar dan teks sejajar */
    align-items: flex-start;
    padding: 10px 15px; /* Sesuaikan padding agar avatar punya ruang */
    border-radius: 18px 18px 18px 0;
    margin-bottom: 10px;
    max-width: 80%;
    line-height: 1.4;
    background-color: #e5e5ea;
    color: #000;
    align-self: flex-start;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.bot-message .bot-text {
    /* Container untuk teks pesan */
    background-color: transparent;
    padding: 0;
    margin: 0;
}
</style>


{{-- HTML CHATBOT --}}
{{-- HTML CHATBOT YANG SUDAH DIPERBAIKI --}}
<div id="chatbot-container" class="chatbot-container" style="display: none;">
    <div class="chatbot-header">
    <div class="profile">
        <img src="/home/img/Logo Chatbot.svg" alt="Avatar" class="profile-avatar">
        <span class="profile-name">ChatBot Puskesmas</span>
    </div>
    <button id="closeChatBtn" class="chat-close-btn">
        <i class="fas fa-times"></i>
    </button>
</div>
    
    <div class="messages-area" id="chatMessages">
        </div>
    <div class="sender-area">
        <div class="input-place">
            <input placeholder="Send a message." class="send-input" type="text" id="messageInput">
            <div id="sendBtn" class="send">
                <svg class="send-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path fill="#6B6C7B" d="M481.508,210.336L68.414,38.926c-17.403-7.222-37.064-4.045-51.309,8.287C2.86,59.547-3.098,78.551,1.558,96.808 L38.327,241h180.026c8.284,0,15.001,6.716,15.001,15.001c0,8.284-6.716,15.001-15.001,15.001H38.327L1.558,415.193 c-4.656,18.258,1.301,37.262,15.547,49.595c14.274,12.357,33.937,15.495,51.31,8.287l413.094-171.409 C500.317,293.862,512,276.364,512,256.001C512,235.638,500.317,218.139,481.508,210.336z"></path></g></g></svg>
            </div>
        </div>
    </div>
</div>
</div>

{{-- <button id="toggleChatBtn" class="floating-chat-btn">
    <i class="fas fa-comment-dots"></i>
</button> --}}

<button id="toggleChatBtn" class="floating-chat-btn">
    <img src="/home/img/Logo Chatbot.svg" alt="Chat" class="toggle-icon">
</button>


{{-- JS CHATBOT --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const chatContainer = document.querySelector('.chatbot-container');
    const toggleChatBtn = document.getElementById('toggleChatBtn');
    const closeChatBtn = document.getElementById('closeChatBtn');
    const chatMessages = document.getElementById('chatMessages');
    const tooltip = document.getElementById('botmanTooltip'); // Dapatkan elemen tooltip disini
    const userInput = document.getElementById('messageInput');
const sendBtn = document.getElementById('sendBtn');
    
    
    // Pastikan Anda memiliki meta tag CSRF token di HTML Anda
    // <meta name="csrf-token" content="{{ csrf_token() }}">
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let isChatOpen = false;
    let hasIntroduced = false;

    // Fungsi untuk menampilkan pesan ke layar
    // Ganti seluruh fungsi appendMessage Anda dengan ini
// Ganti seluruh fungsi appendMessage Anda dengan ini
function appendMessage(sender, content) {
    const chatMessages = document.getElementById('chatMessages');
    const messageContainer = document.createElement('div');
    
    if (sender === 'user') {
        messageContainer.classList.add('message-bubble', 'user-message');
        messageContainer.innerHTML = content;
    } else if (sender === 'bot') {
        messageContainer.classList.add('message-bubble', 'bot-message');
        
        // Tambahkan avatar untuk pesan bot
        const avatar = document.createElement('img');
        avatar.classList.add('bot-avatar');
        avatar.src = '/home/img/Logo Chatbot.svg'; // Path gambar Anda
        
        const textContent = document.createElement('div');
        textContent.classList.add('bot-text');
        
        if (typeof content === 'object' && content.text && content.buttons) {
            textContent.innerHTML = `<p>${content.text}</p>`;
            const buttonContainer = document.createElement('div');
            buttonContainer.classList.add('button-container');
            
            content.buttons.forEach(button => {
                const buttonElement = document.createElement(button.url ? 'a' : 'button');
                buttonElement.classList.add('chat-button');
                buttonElement.textContent = button.text;

                if (button.url) {
                    buttonElement.href = button.url;
                    buttonElement.target = '_blank';
                } else {
                    buttonElement.addEventListener('click', () => {
                        userInput.value = button.value;
                        sendMessage();
                    });
                }
                buttonContainer.appendChild(buttonElement);
            });
            textContent.appendChild(buttonContainer);
        } else {
            textContent.innerHTML = content;
        }
        
        messageContainer.appendChild(avatar);
        messageContainer.appendChild(textContent);
    }

    chatMessages.appendChild(messageContainer);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

    // Fungsi untuk mengirim pesan ke BotMan backend
    async function sendMessage() {
        const message = userInput.value.trim();
        if (message === '') return;

        appendMessage('user', message);
        userInput.value = '';

        try {
            const response = await fetch('https://puskesmasbanjarwangi.site/botman', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();
            
            if (data.reply) {
                appendMessage('bot', data.reply);
            }
        } catch (error) {
            console.error('Error:', error);
            appendMessage('bot', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // Event listener untuk tombol bulat (toggle)
    toggleChatBtn.addEventListener('click', () => {
    if (!isChatOpen) {
        chatContainer.style.display = 'flex';
        toggleChatBtn.style.display = 'none';
        isChatOpen = true;

        if (!hasIntroduced) {
            // Gabungkan pesan perkenalan dan tombol dalam satu objek
            const welcomeMessageWithButtons = {
                text: "Halo kak! 👋 Ada yang bisa aku bantu hari ini? Berikut beberapa pertanyaan yang sering ditanyakan. Silakan pilih salah satu di bawah atau ketik pertanyaan yang ingin kakak tanyakan:",
                buttons: [
                    {
                        text: 'Jadwal Dokter',
                        value: 'jadwal dokter'
                    },
                    {
                        text: 'Jam Buka',
                        value: 'jam buka'
                    },
                    {
                        text: 'Kontak Kami',
                        value: 'kontak'
                    }
                ]
            };

            appendMessage('bot', welcomeMessageWithButtons);
            hasIntroduced = true;
        }
    }
});

    // Event listener untuk tombol tutup
    closeChatBtn.addEventListener('click', () => {
        document.body.classList.remove('chatbot-open'); /* TAMBAH: Hapus kelas dari body */
        chatContainer.style.display = 'none';
        toggleChatBtn.style.display = 'flex';
        isChatOpen = false;
        if (tooltip) {
             startTooltipCycle();
        }
    });

    // Event listener untuk tombol kirim
    sendBtn.addEventListener('click', sendMessage);

    // Event listener untuk tombol 'Enter' pada keyboard
    userInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    
});
</script>


</body>

</html>
