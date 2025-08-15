@extends('layouts.admin')

@section('post')
    {{-- ALERT SUKSES --}}
    {{-- @if (session()->has('success'))
<div class="col-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif --}}

    <div class="col-12">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">DATA PRA-PENDAFTARAN PASIEN</h6>

            {{-- mencari role --}}
            {{-- <div class="row g-4">
                <div class="col-sm-6 col-md-4">
                    <div class="bg-light rounded d-flex align-items-center p-4">
                        <i class="fas fa-layer-group fa-3x text-primary me-3"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Jenis Peran (Role)</p>
                            <h6 class="mb-0">{{ $totalJenisRole }}</h6>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="row g-4 mt-4">
                <div class="col-sm-12 col-md-6">
                    <div class="bg-light rounded p-4">
                        <h6 class="mb-4">Daftar Nama Peran (Role)</h6>
                        <ul class="list-group">
                            @foreach ($daftarRole as $role)
                                <li class="list-group-item">{{ $role }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> --}}
            {{-- akhir mencari role --}}

            {{-- FORM PENCARIAN --}}
            <div class="d-flex justify-content-end align-items-center mb-3 responsive-search-container">
                <form action="{{ route('admin.index') }}" method="GET" class="d-flex my-search-form flex-grow-1">
                    <input type="text" name="search" class="form-control me-2 my-search-input"
                        placeholder="Cari NIK, nama, atau alamat..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search me-2"></i> Cari</button>
                    @if (request('search'))
                        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary btn-sm ms-2">Reset</a>
                    @endif
                </form>
            </div>
            {{-- AKHIR FORM PENCARIAN --}}

            {{-- CONTAINER UNTUK TABEL DAN CARD --}}
            <div class="data-container">
                {{-- TAMPILAN CARD UNTUK MOBILE --}}
                <div class="d-lg-none">
                    @forelse($datas as $d)
                        <div class="card mb-3 responsive-data-card">
                            <div class="card-body">
                                <h6 class="card-title fw-bold">Data Pasien No:
                                    {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}</h6>
                                <hr>
                                <div class="card-text mb-2 responsive-data-list">
                                    <div class="data-item">
                                        <div class="data-label"><strong>NIK:</strong></div>
                                        <div class="data-value">{{ $d->nik }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-label"><strong>NAMA:</strong></div>
                                        <div class="data-value">{{ $d->nama }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-label"><strong>ALAMAT:</strong></div>
                                        <div class="data-value">{{ $d->alamat }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-label"><strong>TELEPON:</strong></div>
                                        <div class="data-value">{{ $d->telepon }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-label"><strong>JENIS POLI:</strong></div>
                                        <div class="data-value">{{ $d->poli->nama ?? 'N/A' }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-label"><strong>TANGGAL:</strong></div>
                                        <div class="data-value">
                                            {{ \Carbon\Carbon::parse($d->tgl_kunjung)->format('d F Y') }}</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    <a href="{{ route('data.edit', $d->id) }}" class="btn btn-sm btn-primary w-100"><i
                                            class="fa fa-edit me-2"></i> Edit</a>
                                    <form action="{{ route('data.destroy', $d->id) }}" method="POST" class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100"
                                            onclick="confirmDelete(event)"><i class="fa fa-trash me-2"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Tidak ada data pendaftaran pasien ditemukan.</p>
                    @endforelse
                </div>

                {{-- TABEL UNTUK DESKTOP --}}
                <div class="table-responsive d-none d-lg-block">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">TELEPON</th>
                                {{-- <th scope="col">JENIS POLI</th> --}}
                                <th scope="col">TANGGAL</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($datas as $d)
                                <tr>
                                    <td>{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}</td>
                                    <td>{{ $d->nik }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->telepon }}</td>
                                    {{-- <td>{{ $d->poli->nama ?? 'N/A' }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($d->tgl_kunjung)->format('d F Y') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('data.edit', $d->id) }}" class="btn btn-sm btn-primary"
                                                title="Edit Data"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('data.destroy', $d->id) }}" method="POST"
                                                style="display:inline;">
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
                                    <td colspan="9" class="text-center">Tidak ada data pendaftaran pasien ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- PAGINASI --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                @if ($datas->total() > 0)
                    <div class="text-muted mb-2 mb-md-0">
                        Menampilkan {{ $datas->firstItem() }} hingga {{ $datas->lastItem() }} dari total
                        {{ $datas->total() }} hasil.
                    </div>
                @endif
                <div class="d-flex justify-content-center">
                    {{ $datas->links('pagination::bootstrap-5') }}
                </div>
            </div>
            {{-- AKHIR PAGINASI --}}
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
