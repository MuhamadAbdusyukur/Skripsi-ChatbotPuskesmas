@extends('layouts.admin')

@section('post')
    {{-- ALERT SUKSES --}}
    {{-- <div class="col-12">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div> --}}

    <div class="container-fluid main-content-container">
        <div class="row g-4">
            {{-- BAGIAN UTAMA KONTEN --}}
            <div class="col-12">
                <div class="bg-light rounded h-100 main-card-padding">
                    {{-- JUDUL DAN TOMBOL TAMBAH (SEJAJAR) --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">DAFTAR ADMIN</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse"
                            data-bs-target="#tambahAdminForm" aria-expanded="false" aria-controls="tambahAdminForm">
                            <i class="fas fa-plus me-2"></i> Tambah Admin
                        </button>
                    </div>

                    {{-- FORM TAMBAH ADMIN (TERSEMBUNYI SECARA DEFAULT) --}}
                    <div class="collapse my-4" id="tambahAdminForm">
                        <div class="bg-light rounded h-100 p-4 border"> {{-- Tambahkan border agar lebih jelas --}}
                            <h6 class="mb-4">TAMBAH ADMIN</h6>
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12"> {{-- Buat full-width di kolom parent --}}
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Nama Admin"
                                                value="{{ old('name') }}" required>
                                            <label for="name">Nama Admin</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12"> {{-- Buat full-width di kolom parent --}}
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Alamat Email"
                                                value="{{ old('email') }}" required>
                                            <label for="email">Alamat Email</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12"> {{-- Buat full-width di kolom parent --}}
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password" placeholder="Password" value="{{ old('password') }}"
                                                required>
                                            <label for="password">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12"> {{-- Buat full-width di kolom parent --}}
                                        <div class="form-floating">
                                            <select name="role" id="role"
                                                class="form-select @error('role') is-invalid @enderror" required>
                                                <option value="" selected disabled>Pilih Peran</option>
                                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="super_admin"
                                                    {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin
                                                </option>
                                            </select>
                                            <label for="role">Peran (Role)</label>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Tambah Admin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- TABEL DAFTAR ADMIN --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admin as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>{{ $d->role }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                                {{-- Wrap tombol untuk jarak dan responsivitas --}}
                                                <a href="{{ route('user.edit', $d->id) }}" class="btn btn-sm btn-primary"
                                                    title="Edit Data"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('user.delete', $d->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete(event)" title="Hapus Data">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data admin ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
@endsection
