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

<div class="container-fluid main-content-container"> {{-- Menggunakan class kustom untuk padding konsisten --}}
    <div class="row g-4 justify-content-center"> {{-- Menempatkan form di tengah --}}
        <div class="col-12"> {{-- Ukuran form yang responsif --}}
            <div class="bg-light rounded h-100 main-card-padding"> {{-- Menggunakan class kustom untuk padding konsisten --}}
                

                <h6 class="mb-4">{{ isset($qna) ? 'EDIT CHAT' : 'TAMBAH QNA' }}</h6> {{-- Menggunakan h6 agar konsisten --}}

                <form action="{{ isset($qna) ? route('qna.update', $qna->id) : route('qna.store') }}" method="POST"> {{-- Perbaiki $qna menjadi $qna->id --}}
                    @csrf
                    @if(isset($qna)) @method('PUT') @endif

                    <div class="mb-3">
                        <div class="form-floating"> {{-- Menggunakan form-floating --}}
                            <input type="text" name="keyword" class="form-control @error('keyword') is-invalid @enderror" id="keyword" placeholder="Kata Kunci" value="{{ old('keyword', $qna->keyword ?? '') }}" required>
                            <label for="keyword">Kata Kunci</label>
                            @error('keyword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="reply" class="form-control @error('reply') is-invalid @enderror" id="reply" placeholder="Jawaban" style="height: 120px;" required>{{ old('reply', $qna->reply ?? '') }}</textarea>
                            {{-- <label for="reply">Jawaban</label> --}}
                            @error('reply')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
    <label for="is_popular">Jadikan Pertanyaan Sering Diajukan</label>
    <select class="form-control" id="is_popular" name="is_popular">
        <option value="1" {{ $qna->is_popular == 1 ? 'selected' : '' }}>Ya</option>
        <option value="0" {{ $qna->is_popular == 0 ? 'selected' : '' }}>Tidak</option>
    </select>
</div>

                    <div class="d-flex gap-2 justify-content-end mt-4"> {{-- Menggunakan d-flex dan gap untuk tombol --}}
                        <button type="submit" class="btn btn-primary">Simpan</button> {{-- Menggunakan btn-primary --}}
                        <a href="{{ route('qna.index') }}" class="btn btn-secondary">Batal</a> {{-- Tombol batal --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#reply').summernote({
            placeholder: 'Tulis jawaban di sini...',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
