@extends('layouts.admin')

@section('post')
<div class="container-fluid main-content-container">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 main-card-padding">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">DAFTAR GALERI</h6>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus me-2"></i> Tambah Gambar
                    </a>
                </div>

                {{-- Notifikasi --}}
                {{-- @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif --}}

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Urutan</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($images as $image)
                            <tr>
                                <td class="text-center">
                                    {{ ($images->currentPage() - 1) * $images->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    @if($image->file_path && Storage::disk('public')->exists($image->file_path))
                                    <img src="{{ asset('storage/' . $image->file_path) }}" 
                                         alt="Gambar Galeri" 
                                         class="img-thumbnail" 
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                    @else
                                    <img src="https://placehold.co/100x100?text=No+Image" 
                                         class="img-thumbnail" 
                                         alt="No Image">
                                    @endif
                                </td>
                                <td>{{ $image->description ?? '-' }}</td>
                                <td>{{ $image->order ?? '-' }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('admin.gallery.edit', $image->id) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.gallery.destroy', $image->id) }}" 
                                              method="POST" 
                                              style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" 
                                                    title="Hapus Data">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    Tidak ada gambar galeri ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination kecil --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{ $images->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CSS Pagination Kecil --}}
<style>
    .pagination .page-link {
        padding: 4px 10px; /* kecilkan padding */
        font-size: 0.875rem; /* kecilkan font */
    }
    .pagination .page-item {
        margin: 0 2px; /* jarak antar tombol */
    }
</style>
@endsection
