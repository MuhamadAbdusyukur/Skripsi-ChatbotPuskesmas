@extends('layouts.admin')

@section('post')

{{-- ALERT SUKSES --}}
<div class="col-12">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

<div class="container-fluid main-content-container">
    <div class="row g-4">
        {{-- BAGIAN UTAMA KONTEN (FORM EDIT) --}}
        <div class="col-12"> {{-- Menggunakan col-12 untuk lebar penuh di semua ukuran layar --}}
            <div class="bg-light rounded h-100 main-card-padding">
                
                <h6 class="mb-4">EDIT DATA PENDAFTARAN PASIEN</h6>
                
                {{-- FORM PENDAFTARAN --}}
                <form action="{{ route('data.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" required minlength="16" maxlength="16" pattern="\d{16}" value="{{ old('nik', $data->nik) }}">
                                <label for="nik">Nomor Induk Kependudukan</label>
                                @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Anda" value="{{ old('nama', $data->nama) }}" required>
                                <label for="nama">Nama Anda</label>
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                {{-- PERBAIKAN: Konten textarea berada di antara tag pembuka dan penutup --}}
                                {{-- Pastikan old('alamat', ...) karena sebelumnya ada old('nik', ...) --}}
                                <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Lengkap Anda" id="alamat" name="alamat" style="height: 100px" required>{{ old('alamat', $data->alamat) }}</textarea>
                                <label for="alamat">Alamat</label>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> {{-- Ini akan menjadi 2 kolom di layar medium ke atas --}}
                            <div class="form-floating">
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" placeholder="Telepon" value="{{ old('telepon', $data->telepon) }}" required>
                                <label for="telepon">Telepon</label>
                                @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"> {{-- Ini akan menjadi 2 kolom di layar medium ke atas --}}
                            <div class="form-floating">
                                {{-- PERBAIKAN: ID input harus unik, pisahkan dari div.date --}}
                                <input type="date" class="form-control @error('tgl_kunjung') is-invalid @enderror" id="tgl_kunjung_input" name="tgl_kunjung" placeholder="Tanggal Kunjungan" style="height: 58px;" value="{{ old('tgl_kunjung', $data->tgl_kunjung) }}" required>
                                <label for="tgl_kunjung_input">Tanggal Kunjungan</label> {{-- Tambahkan label untuk form-floating --}}
                                @error('tgl_kunjung')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select name="poli_id" id="poli_id" class="form-select border-0 @error('poli_id') is-invalid @enderror" style="height: 55px;" required>
                                    <option selected disabled>Pilih Poli</option> {{-- Tambahkan disabled agar tidak bisa dipilih --}}
                                    @foreach ($poli as $p)
                                    <option value="{{ $p->id }}" {{ old('poli_id', $data->poli_id) == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                                <label for="poli_id">Jenis Poli</label> {{-- Tambahkan label untuk select --}}
                                @error('poli_id')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
    <div class="d-flex gap-2 justify-content-end"> {{-- Menggunakan d-flex dan gap untuk jarak, justify-content-end untuk rata kanan --}}
        <a href="{{ route('admin.index') }}" class="btn btn-secondary ">Batal</a> {{-- Tombol batal --}}
        <button class="btn btn-primary " type="submit">Perbarui Data</button>
    </div>
</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection