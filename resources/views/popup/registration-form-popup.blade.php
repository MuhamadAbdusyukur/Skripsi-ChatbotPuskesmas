<form action="{{ route('pengunjung.store') }}" method="POST" id="registrationForm">
    @csrf
    <div class="row g-3">
        <div class="col-12">
            <div class="form-floating">
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" required minlength="16" maxlength="16" pattern="\d{16}" value="{{ old('nik') }}">
                <label for="nik">Nomor Induk Kependudukan</label>
                @error('nik')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                <label for="nama">Nama Anda</label>
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Lengkap Anda" id="alamat" name="alamat" style="height: 100px" required>{{ old('alamat') }}</textarea>
                <label for="alamat">Alamat</label>
                @error('alamat')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" placeholder="Telepon" value="{{ old('telepon') }}" required>
                <label for="telepon">Telepon</label>
                @error('telepon')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="date" class="form-control @error('tgl_kunjung') is-invalid @enderror" id="tgl_kunjung_input" name="tgl_kunjung" placeholder="Tanggal Kunjungan" style="height: 58px;" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ old('tgl_kunjung') }}" required>
                <label for="tgl_kunjung_input">Tanggal Kunjungan</label>
                @error('tgl_kunjung')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <select name="poli_id" id="poli_id" class="form-select border-0 @error('poli_id') is-invalid @enderror" style="height: 55px;" required>
                    <option selected disabled>Pilih Poli</option>
                    @foreach ($polis as $p)
                    <option value="{{ $p->id }}" {{ old('poli_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                    @endforeach
                </select>
                <label for="poli_id">Jenis Poli</label>
                @error('poli_id')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Daftar Sekarang</button>
        </div>
    </div>
</form>