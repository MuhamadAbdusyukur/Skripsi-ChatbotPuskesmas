@extends('layouts.admin')

@section('post')

{{-- ALERT SUKSES --}}
{{-- <div class="col-12">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div> --}}

<div class="container-fluid main-content-container">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 main-card-padding">
                {{-- JUDUL DAN TOMBOL AKSI --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">DAFTAR KRITIK DAN SARAN</h6>
                    <div class="d-flex align-items-center">
                        <div class="dropdown me-2">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.feedback', ['filter' => 'hari']) }}">Hari Ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.feedback', ['filter' => 'minggu']) }}">Minggu Ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.feedback', ['filter' => 'bulan']) }}">Bulan Ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.feedback', ['filter' => 'tahun']) }}">Tahun Ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.feedback') }}">Semua Data</a></li>
                            </ul>
                        </div>
                        <a href="{{ route('admin.feedback.export') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-file-pdf me-2"></i> Download PDF
                        </a>
                    </div>
                </div>

                {{-- TABEL --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">LAYANAN</th>
                                <th scope="col">PESAN</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $feedback->nama }}</td>
                                <td>{{ $feedback->email }}</td>
                                <td>{{ $feedback->layanan }}</td>
                                <td>{{ $feedback->pesan }}</td>
                                <td>{{ $feedback->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.feedback.delete', $feedback->id) }}" method="POST" style="display:inline-block;">
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
                                <td colspan="7" class="text-center">Tidak ada kritik dan saran ditemukan.</td>
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