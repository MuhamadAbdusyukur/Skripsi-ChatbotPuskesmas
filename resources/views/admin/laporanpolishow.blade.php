@extends('layouts.admin')

@section('post')

<div class="container-fluid main-content-container">
    <div class="row g-4">
        {{-- GANTI col-xl-6 MENJADI col-xl-12 UNTUK LAYAR PENUH DI DESKTOP --}}
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 main-card-padding">
                {{-- TAMBAHKAN TOMBOL KEMBALI UNTUK NAVIGASI --}}
                <div class="d-flex justify-content-between mb-3">
    <a href="{{ route('admin.laporan') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.laporan.pdf_poli', ['id' => $datapoli->id]) }}" class="btn btn-danger btn-sm" target="_blank">
            <i class="fas fa-file-pdf me-2"></i> Download PDF
        </a>
    </div>
</div>
                
                {{-- UKURAN HEADING DI MOBILE MENYESUAIKAN CSS --}}
                <h6 class="mb-4">DATA PENGUNJUNG {{ $datapoli->nama }}</h6>

                <div class="table-responsive">
                    {{-- TAMBAHKAN table-striped dan table-hover --}}
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">TELEPON</th>
                                <th scope="col">TANGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- GANTI @foreach DENGAN @forelse UNTUK PENGECEKAN DATA KOSONG --}}
                            @forelse($pengunjung as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_kunjung)->format('d F Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pengunjung untuk poli ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection