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
        {{-- BAGIAN UTAMA KONTEN (EDIT FORM) --}}
        <div class="col-12"> {{-- Menggunakan col-12 untuk lebar penuh di semua ukuran layar --}}
            <div class="bg-light rounded h-100 main-card-padding">
                {{-- TOMBOL KEMBALI (DIHAPUS KARENA ADA BATAL DI BAWAH) --}}
                {{-- <div class="d-flex justify-content-start mb-3">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div> --}}
                
                <h6 class="mb-4">EDIT DATA ADMIN</h6>
                
                {{-- FORM EDIT --}}
                <form action="{{ route('user.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3"> {{-- Menggunakan g-3 untuk jarak antar kolom --}}
                        <div class="col-12"> {{-- Input akan memenuhi seluruh lebar kolom --}}
                            <div class="form-floating">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Admin" value="{{ old('name', $admin->name) }}" required>
                                <label for="name">Nama Admin</label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12"> {{-- Input akan memenuhi seluruh lebar kolom --}}
                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email@example.com" value="{{ old('email', $admin->email) }}" required>
                                <label for="email">Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- MENAMPILKAN ROLE (TIDAK DAPAT DIEDIT) --}}
                        <div class="col-12"> {{-- Ini akan membuat input role memenuhi seluruh lebar kolom --}}
    <div class="form-floating">
        <input type="text" class="form-control" id="role_display" name="role_display" value="{{ $admin->role }}" readonly>
        <label for="role_display">Peran (Role)</label>
    </div>
</div>
                        {{-- AKHIR MENAMPILKAN ROLE --}}

                        <div class="col-12">
                            <div class="form-floating">
                                {{-- PENTING: JANGAN PERNAH PRE-FILL PASSWORD DENGAN $admin->password --}}
                                {{-- Jika user ingin mengganti password, mereka akan mengisinya --}}
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password (Kosongkan jika tidak ingin diubah)">
                                <label for="password">Password</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="col-12">
    <div class="d-flex gap-2 justify-content-end"> {{-- Ubah justify-content-between menjadi justify-content-end, tambahkan gap-2 --}}
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
        <button class="btn btn-primary" type="submit">Perbarui Data</button>
    </div>
</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection