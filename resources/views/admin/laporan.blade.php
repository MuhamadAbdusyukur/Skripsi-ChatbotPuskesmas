@extends('layouts.admin')

@section('post')

<div class="container-fluid main-content-container">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 main-card-padding">
                <h6 class="mb-4">DATA PENGUNJUNG</h6>
                {{-- TAB NAVIGATION --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tanggal-tab" data-bs-toggle="tab" data-bs-target="#tanggal-tab-pane" type="button" role="tab" aria-controls="tanggal-tab-pane" aria-selected="true">
                            <i class="fas fa-calendar-alt me-2"></i>Berdasarkan Tanggal
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="poli-tab" data-bs-toggle="tab" data-bs-target="#poli-tab-pane" type="button" role="tab" aria-controls="poli-tab-pane" aria-selected="false">
                            <i class="fas fa-stethoscope me-2"></i>Berdasarkan Jenis Poli
                        </button>
                    </li>
                </ul>
                
                {{-- TAB CONTENT --}}
                <div class="tab-content pt-3" id="myTabContent">
                    {{-- TAB PANE UNTUK DATA TANGGAL --}}
                    <div class="tab-pane fade show active" id="tanggal-tab-pane" role="tabpanel" aria-labelledby="tanggal-tab" tabindex="0">
                        {{-- <h6 class="mb-4 d-lg-none">DATA PENGUNJUNG BERDASARKAN TANGGAL</h6> --}}
                        
                        {{-- FORM PENCARIAN TANGGAL --}}
                        <div class="d-flex justify-content-end mb-3 responsive-search-container">
                            <form action="{{ route('admin.laporan') }}" method="GET" class="d-flex my-search-form">
                                <input type="text" name="search_date" class="form-control form-control-sm me-2 my-search-input" 
                                       placeholder="Cari Tanggal..." value="{{ request('search_date') }}">
                                <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search me-1"></i> Cari</button>
                                @if(request('search_date'))
                                    <a href="{{ route('admin.laporan') }}" class="btn btn-outline-secondary btn-sm ms-2">Reset</a>
                                @endif
                            </form>
                        </div>
                        {{-- AKHIR FORM PENCARIAN --}}

                        {{-- TABEL DESKTOP & MOBILE STACK --}}
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kunjungan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datatgl as $item)
            <tr>
                <td>{{ ($datatgl->currentPage() - 1) * $datatgl->perPage() + $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_kunjung)->format('d F Y') }}</td>
                <td>{{ $item->kunjungan_tgl }} orang</td>
                <td><a class="btn btn-sm btn-primary" href="{{ route('admin.tgldetail', $item->tgl_kunjung) }}">Lihat</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Tidak ada data kunjungan ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
                        
                        {{-- PAGINASI --}}
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            @if ($datatgl->total() > 0)
                                <div class="text-muted mb-2 mb-md-0">
                                    Menampilkan {{ $datatgl->firstItem() }} hingga {{ $datatgl->lastItem() }} dari total {{ $datatgl->total() }} hasil.
                                </div>
                            @endif
                            <div class="d-flex justify-content-center">
                                {{ $datatgl->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>

                    {{-- TAB PANE UNTUK DATA POLI --}}
                    <div class="tab-pane fade" id="poli-tab-pane" role="tabpanel" aria-labelledby="poli-tab" tabindex="0">
                        {{-- <h6 class="mb-4 d-lg-none">DATA PENGUNJUNG BERDASARKAN JENIS POLI</h6> --}}
                        
                        {{-- TABEL DESKTOP --}}
                        {{-- TABEL DESKTOP & MOBILE STACK --}}
<div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Poli</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @forelse($datapoli as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->pengunjung_count }} orang</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ url('/laporan/poli/'.$item->id) }}">Lihat</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Tidak ada data poli ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection