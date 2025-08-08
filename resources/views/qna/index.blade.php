@extends('layouts.admin')

@section('post')

{{-- ALERT SUKSES QNA --}}
{{-- <div class="col-12">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div> --}}

<div class="container-fluid main-content-container">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 main-card-padding">
                {{-- Judul halaman dan Tombol Tambah Chat (Sejajar di kanan) --}}
                <div class="d-flex justify-content-between align-items-center mb-4"> {{-- mb-4 untuk jarak ke bawah --}}
                    <h6 class="mb-0">DAFTAR CHAT</h6> {{-- mb-0 agar tidak ada margin bawah tambahan --}}
                    <a href="{{ route('qna.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i> Tambah Chat
                    </a>
                </div>
                
                {{-- FORM PENCARIAN (di baris terpisah, rata kanan) --}}
                <div class="d-flex justify-content-end mb-3 responsive-search-container">
                    <form action="{{ route('qna.index') }}" method="GET" class="d-flex my-search-form">
                        <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari Kata Kunci/Jawaban..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search me-2"></i> Cari</button>
                        
                        @if(request('search'))
                            <a href="{{ route('qna.index') }}" class="btn btn-outline-secondary btn-sm ms-2">Reset</a>
                        @endif
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">Jawaban</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($qnas as $qna)
                                <tr>
                                    <td class="text-center">{{ ($qnas->currentPage() - 1) * $qnas->perPage() + $loop->iteration }}</td>
                                    <td>{{ $qna->keyword }}</td>
                                    <td>{!! $qna->reply !!}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                                            <a href="{{ route('qna.edit', $qna) }}" class="btn btn-sm btn-warning" title="Edit Data"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('qna.destroy', $qna) }}" method="POST" style="display:inline-block;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete(event)" title="Hapus Data">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">Tidak ada data QnA ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINASI --}}
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted">
                        Menampilkan {{ $qnas->firstItem() }} hingga {{ $qnas->lastItem() }} dari total {{ $qnas->total() }} hasil.
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $qnas->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- Script untuk confirmDelete (jika belum global di layout) --}}
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