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
</div> --}}

<div class="container-fluid main-content-container"> {{-- Menggunakan container-fluid agar mengisi lebar penuh --}}
    <div class="row g-4"> {{-- Tambahkan row g-4 untuk struktur grid yang benar --}}
        <div class="col-12"> {{-- Gunakan col-12 untuk konten utama --}}
            <div class="bg-light rounded h-100 main-card-padding"> {{-- Tambahkan padding di sini --}}
                {{-- JUDUL DAN TOMBOL TAMBAH (SEJAJAR) --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="mb-0">DAFTAR BERITA</h6> {{-- Menggunakan h6 agar konsisten, mb-0 untuk margin bawah 0 --}}
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm"> {{-- Menggunakan btn-sm untuk konsistensi ukuran --}}
                        <i class="fas fa-plus me-2"></i> Tambah Berita
                    </a>
                </div>

                {{-- === Bagian Tabel Responsif === --}}
                <div class="table-responsive"> {{-- Ini yang membuat tabel scrollable di mobile --}}
                    <table class="table table-striped table-hover table-bordered align-middle"> {{-- Menambahkan class Bootstrap --}}
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th> {{-- Tambahkan # untuk nomor urut --}}
                                <th scope="col">Judul</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Publish</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                            <tr>
                                <td class="text-center">{{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}</td> {{-- Nomor urut berkelanjutan --}}
                                <td>{{ $article->title }}</td>
                                <td class="text-center">
                                    @if($article->image && Storage::disk('public')->exists($article->image))
                                    <img src="{{ url('storage/articles/' . $article->image) }}" alt="Gambar">
                                    {{-- <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-thumbnail rounded" style="width: 80px; height: 80px; object-fit: cover;"> --}}
                                    @else
                                        <i class="fa-solid fa-image-slash fa-2x text-muted" title="Tidak ada gambar"></i><br> {{-- Ikon jika tidak ada gambar --}}
                                        <small class="text-muted">Tidak ada gambar</small>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $article->published_at ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $article->published_at ? 'Published' : 'Draft' }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : '-' }}</td>
                                <td>
                                    <div class="d-flex flex-column flex-sm-row justify-content-center"> {{-- Tombol aksi responsif --}}
                                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm mb-1 mb-sm-0 me-sm-1">Edit</a>
                                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada berita yang ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- === Akhir Tabel Responsif === --}}

                {{-- Tambahkan link paginasi jika menggunakan paginate() --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection