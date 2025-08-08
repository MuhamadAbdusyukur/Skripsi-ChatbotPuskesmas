@extends('layouts.admin')

@section('post')
<div class="container-fluid main-content-container">
    <div class="row g-4 justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-7">
            <div class="bg-light rounded h-100 main-card-padding">
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
                <h6 class="mb-4">EDIT GAMBAR GALERI</h6>
                <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- PENTING: Untuk metode update --}}

                    {{-- SERTAKAN PARTIAL FORM DI SINI --}}
                    @include('admin.gallery._form', ['gallery' => $gallery]) {{-- Kirim variabel $gallery ke partial --}}

                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Perbarui Gambar</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection