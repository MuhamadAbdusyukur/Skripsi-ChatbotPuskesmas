{{-- resources/views/admin/gallery/_form.blade.php --}}

<div class="mb-3">
    <label for="image" class="form-label">File Gambar</label>
    {{-- Tampilkan gambar saat ini hanya jika ini form edit dan ada gambar --}}
    @if(isset($gallery) && $gallery->file_path && Storage::disk('public')->exists($gallery->file_path))
        <div class="mb-2">
            <img src="{{ Storage::url($gallery->file_path) }}" alt="Gambar saat ini" class="img-thumbnail" style="max-width: 150px; height: auto;">
            <small class="form-text text-muted d-block">Gambar saat ini</small>
        </div>
    @endif
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" {{ !isset($gallery) ? 'required' : '' }}> {{-- Required hanya untuk create --}}
    <small class="form-text text-muted">Maksimal 2MB (jpeg, png, jpg, gif, svg). {{ isset($gallery) ? 'Kosongkan jika tidak ingin mengubah gambar.' : '' }}</small>
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Deskripsi (Opsional)</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $gallery->description ?? '') }}">
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="order" class="form-label">Urutan Tampil (Opsional)</label>
    <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $gallery->order ?? '') }}">
    @error('order')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>