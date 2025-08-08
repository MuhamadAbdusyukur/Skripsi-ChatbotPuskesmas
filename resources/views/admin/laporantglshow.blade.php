@extends('layouts.admin')

@section('post')

<div class="container-fluid main-content-container">
    <div class="row g-4">
        {{-- GANTI DENGAN col-xl-12 UNTUK LAYAR PENUH --}}
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 main-card-padding">
                <div class="d-flex justify-content-between mb-3">
    <a href="{{ route('admin.laporan') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.laporan.pdf_tanggal', ['tanggal' => $tgl_kunjung]) }}" class="btn btn-danger btn-sm" target="_blank">
            <i class="fas fa-file-pdf me-2"></i> Download PDF
        </a>
    </div>
</div>
                {{-- FORMAT TANGGAL DI JUDUL AGAR LEBIH RAPI --}}
                <h6 class="mb-4">DATA PENGUNJUNG TANGGAL {{ \Carbon\Carbon::parse($tgl_kunjung)->format('d F Y') }}</h6>

                <div class="table-responsive">
                    {{-- TAMBAHKAN CLASS table-striped dan table-hover --}}
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">TELEPON</th>
                                <th scope="col">JENIS POLI</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- GANTI @foreach DENGAN @forelse UNTUK PENGECEKAN DATA KOSONG --}}
                            @forelse($datatgl as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->poli->nama ?? 'N/A' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pengunjung pada tanggal ini.</td>
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