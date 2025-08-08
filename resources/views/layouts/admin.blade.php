<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Puskesmas Banjarwangi | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('dashboard/img/favicon-puskesmas.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('dashboard/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand m-0 d-flex align-items-center px-3">
                    <img src="{{ asset('home/img/LOGO.svg') }}" alt="Logo Puskesmas Banjarwangi"
                        class="puskesmas-logo-icon me-2">
                </a>
                <div class="navbar-nav w-100">
                    <a href="{{ url('/admin') }}"
                        class="nav-item nav-link {{ $title === 'Beranda' ? 'active' : '' }}"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    {{-- <a href="{{ url('/admin/datacreate') }}" class="nav-item nav-link {{ ($title === "Data Pasien" ? 'active' : '')}}"><i class="fa fa-table me-2"></i>Tambah Pasien</a> --}}
                    <a href="{{ url('/admin/laporan') }}"
                        class="nav-item nav-link {{ $title === 'Data Pengunjung' ? 'active' : '' }}"><i
                            class="fa fa-chart-bar me-2"></i>Data Pengunjung</a>
                    {{-- <a href="{{ url('/admin/poli') }}"
                        class="nav-item nav-link {{ $title === 'Pelayanan Poli' ? 'active' : '' }}"><i
                            class="fa fa-th me-2"></i>Pelayanan Poli</a> --}}
                    <a href="{{ url('/admin/user') }}"
                        class="nav-item nav-link {{ $title === 'Daftar Pengguna' ? 'active' : '' }}"><i
                            class="fa fa-user me-2"></i>Daftar Pengguna</a>
                    <a href="{{ url('/admin/articles') }}"
                        class="nav-item nav-link {{ $title === 'Kelola Berita' ? 'active' : '' }}"><i
                            class="fa fa-newspaper me-2"></i>Kelola Berita</a>
                    <a href="{{ url('/admin/gallery') }}"
                        class="nav-item nav-link {{ $title === 'Kelola Galeri' ? 'active' : '' }}"><i
                            class="fa fa-images me-2"></i>Kelola Galeri</a>
                    <a href="{{ route('admin.dokter.index') }}"
                        class="nav-item nav-link {{ $title === 'Kelola Dokter' ? 'active' : '' }}"><i 
                            class="fa fa-user-md me-2"></i>Kelola Dokter</a>
                    <a href="{{ url('/qna') }}"
                        class="nav-item nav-link {{ $title === 'Kelola Chatbot' ? 'active' : '' }}"><i
                            class="fa fa-comments me-2"></i>Kelola Chatbot</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                {{-- <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a> --}}
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="cursor: pointer">
                            <img class="rounded-circle me-lg-2" src="{{ asset('dashboard/img/user.png') }}"
                                alt="" style="width: 40px; height: 40px;">
                            <span class="d-lg-none d-inline-flex">Hi, {{ Str::words($user->name, 1, '') }}</span>
                            <span class="d-none d-lg-inline-flex">Hi, {{ $user->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('user.edit', $user->id) }}" class="dropdown-item">My Profile</a>
                            <a href="{{ url('/logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                @yield('post')
            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top main-card-padding">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; E-PUSKESMAS - All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dashboard/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/js/tempus-dominus.min.js"></script>
    <script src="{{ asset('dashboard/lib/chart/chart.min.js') }}"></script>

    <script src="{{ asset('dashboard/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('dashboard/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('dashboard/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    @stack('scripts')

    <!-- Template Javascript -->
    <script src="{{ asset('dashboard/js/main.js') }}"></script>

    {{-- Template sweetAlert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(event) {
            // Mencegah aksi submit default dari tombol
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik 'Ya, hapus!', lanjutkan dengan penghapusan
                    // Anda perlu menemukan form terdekat atau melakukan aksi penghapusan di sini.
                    // Contoh: Mengirimkan form yang berisi tombol ini
                    event.target.closest('form').submit();

                    // Atau, jika Anda menghapus melalui AJAX, lakukan panggilan AJAX di sini
                    // Swal.fire(
                    //     'Dihapus!',
                    //     'Data Anda telah dihapus.',
                    //     'success'
                    // )
                }
            });
        }
    </script>

    <script>
        // --- Skrip untuk menampilkan pesan sukses/error dari session (INI SUDAH BENAR) ---
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showConfirmButton: true,
            });
        @endif

        // --- Skrip untuk MENGGANTI alert() bawaan browser saat submit form update ---
        document.addEventListener('DOMContentLoaded', function() {
            const updatePasienForm = document.getElementById('updatePasienForm'); // SESUAIKAN ID INI

            if (updatePasienForm) {
                updatePasienForm.addEventListener('submit', function(event) {
                    // *** INI KUNCI UTAMANYA: MENCEGAH DEFAULT FORM SUBMISSION ***
                    // Ini akan menghentikan validasi HTML5 bawaan browser
                    event.preventDefault();

                    // Optional: Tambahkan validasi JavaScript kustom di sini sebelum SweetAlert
                    // Misalnya:
                    // if (updatePasienForm.nik.value.trim() === '') {
                    //     Swal.fire('Error Validasi', 'NIK tidak boleh kosong.', 'error');
                    //     return; // Hentikan jika validasi sisi klien gagal
                    // }

                    Swal.fire({
                        title: 'Konfirmasi Perubahan Data?',
                        text: "Data pasien akan diperbarui sesuai input Anda.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Perbarui!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengkonfirmasi, submit form secara manual
                            updatePasienForm.submit();
                        }
                    });
                });
            }

            // --- Skrip untuk konfirmasi tombol delete (menggantikan confirm() bawaan) ---
            // Pastikan tombol delete tidak lagi punya onclick="return confirm(...)" di HTML-nya
            document.querySelectorAll('button[type="submit"].btn-danger').forEach(button => {
                const form = button.closest('form');
                if (form && form.querySelector('input[name="_method"][value="DELETE"]')) {
                    button.onclick = function(event) {
                        event.preventDefault(); // Mencegah submit default

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda tidak akan bisa mengembalikan data ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, Hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Submit form jika dikonfirmasi
                            }
                        });
                    };
                }
            });
        });
    </script>

</body>

</html>
