@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('post')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Daftar Dokter</h5>
                        <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus me-2"></i> Tambah Dokter Baru
                    </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Foto</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Profesi</th>
                                    <th scope="col" class="text-center">Jadwal</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokters as $dokter)
                                    <tr>
                                        <td class="text-center">{{ ($dokters->currentPage() - 1) * $dokters->perPage() + $loop->iteration }}</td>
                                        <td>
                                            @if ($dokter->foto)
                                                <img src="{{ asset('storage/' . $dokter->foto) }}" alt="{{ $dokter->nama }}"
                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                            @else
                                                <span>Tidak ada foto</span>
                                            @endif
                                        </td>
                                        <td>{{ $dokter->nama }}</td>
                                        <td>{{ $dokter->profesi }}</td>
                                        <td>{{ $dokter->jadwal }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2 justify-content-center">
                                                <a href="{{ route('admin.dokter.edit', $dokter->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit Data"><i
                                                        class="fa fa-edit"></i></a>
                                                <form action="{{ route('admin.dokter.destroy', $dokter->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete(event)" title="Hapus Data">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            {{-- <a href="{{ route('', $dokter->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit Data"><i class="fa fa-edit"></a>
                                            <form action="{{ route('', $dokter->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data dokter.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- PAGINASI --}}
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted">
                        Menampilkan {{ $dokters->firstItem() }} hingga {{ $dokters->lastItem() }} dari total {{ $dokters->total() }} hasil.
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $dokters->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
    <small class="text-muted">
        Menampilkan {{ () }} hingga {{ () }} dari total {{ () }} hasil.
    </small>
</div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
