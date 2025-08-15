@extends('layouts.main')

@section('post')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown text-center">Hubungi Kami</h1>
        <nav aria-label="breadcrumb" class="custom-breadcrumb-position">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">BERANDA</a></li>
                <li class="breadcrumb-item text-info active" aria-current="page">KONTAK</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="h-100 bg-light rounded d-flex align-items-center p-4">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                        <i class="fa fa-map-marker-alt text-primary"></i>
                    </div>
                    <div class="ms-4">
                        <p class="mb-1 text-secondary">Alamat</p>
                        <h6 class="mb-0">Kec. Banjarwangi, Garut</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="h-100 bg-light rounded d-flex align-items-center p-4">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                        <i class="fa fa-phone-alt text-primary"></i>
                    </div>
                    <div class="ms-4">
                        <p class="mb-1 text-secondary">Hubungi Kami</p>
                        <h6 class="mb-0">+62 821-1717-5388</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="h-100 bg-light rounded d-flex align-items-center p-4">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                        <i class="fa fa-envelope-open text-primary"></i>
                    </div>
                    <div class="ms-4">
                        <p class="mb-1 text-secondary">Email</p>
                        <h6 class="mb-0">laporpkmbanjarwangi@gmail.com</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tambahan Tautan Media Sosial --}}
        <div class="row g-4 mt-4 justify-content-center">
            <div class="col-12 text-center">
                <h4 class="mb-3">Ikuti Kami di Media Sosial</h4>
                <a class="btn btn-outline-primary btn-social" href="https://web.facebook.com/puskesmas.banjarwangi.2025" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary btn-social" href="https://www.instagram.com/puskesmasbanjarwangi?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-primary btn-social" href="https://youtube.com/@pkmbanjarwangichannel3751?si=MzDwVJ1nNYyEt1wN" target="_blank"><i
                                class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="row g-5 mt-4">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-4">Kritik dan Saran</h1>
                <p class="mb-4">Kami sangat menghargai masukan Anda. Silakan sampaikan kritik, saran, atau pertanyaan Anda melalui formulir di bawah ini.</p>

                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                                <label for="nama">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" required>
                                <label for="email">Alamat Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" name="layanan" id="layanan">
                                    <option value="" disabled selected>Pilih Jenis Pelayanan</option>
                                    <option value="umum">Klaster 1</option>
                                    <option value="gigi">Klaster 2</option>
                                    <option value="kia">Klaster 3</option>
                                    <option value="kia">Klaster 4</option>
                                    <option value="kia">Unit Gawat Darurat (UGD)</option>
                                    <option value="kia">Laboratorium</option>
                                    <option value="kia">Rawat Inap </option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                                <label for="layanan">Jenis Pelayanan</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="pesan" placeholder="Tuliskan pesan Anda di sini" id="pesan" style="height: 150px" maxlength="500" required></textarea>
                                <label for="pesan">Pesan Anda (maks. 500 karakter)</label>
                                <div class="text-end text-muted mt-1">
                                    <small id="charCount">0/500 karakter</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100" style="min-height: 400px;">
                    <iframe class="rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.22410813576!2d107.90110417381696!3d-7.4404379925705015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6602f64fae8f2f%3A0x8a65286986fcc275!2sPuskesmas%20Banjarwangi!5e0!3m2!1sid!2sid!4v1754909313687!5m2!1sid!2sid"
                        frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('pesan');
        const charCount = document.getElementById('charCount');

        textarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            charCount.textContent = `${currentLength}/500 karakter`;
        });
    });
</script>
@endsection