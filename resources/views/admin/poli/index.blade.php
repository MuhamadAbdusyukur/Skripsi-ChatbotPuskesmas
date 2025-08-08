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
        {{-- BAGIAN TABEL POLI --}}
        <div class="col-12">
            <div class="bg-light rounded h-100 main-card-padding">
                {{-- JUDUL DAN TOMBOL TAMBAH (SEJAJAR) --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">DAFTAR PELAYANAN POLI</h6>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#tambahPoliForm" aria-expanded="false" aria-controls="tambahPoliForm">
                        <i class="fas fa-plus me-2"></i> Tambah Poli
                    </button>
                </div>

                {{-- FORM TAMBAH (TERSEMBUNYI SECARA DEFAULT) --}}
                <div class="collapse my-4" id="tambahPoliForm">
                    <div class="bg-light rounded h-100 p-4 border">
                        <h6 class="mb-4">TAMBAH DATA PELAYANAN POLI</h6>
                        <form action="{{ route('poli.store') }}" method="POST">
                            @csrf
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Pelayanan Poli" value="{{ old('nama') }}" required>
                                        <label for="nama">Nama Pelayanan Poli</label>
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Tambah Poli</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- TABEL --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NAMA POLI</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($poli as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>
                                    <form action="{{ route('poli.delete', $d->id) }}" method="POST" style="display:inline-block;">
                                        <a href="{{ route('poli.edit', $d->id) }}" class="btn btn-sm btn-primary" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete(event)" title="Hapus Data">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data poli ditemukan.</td>
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