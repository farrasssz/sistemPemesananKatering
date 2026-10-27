@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php $b = $biodata ?? null; @endphp

<div class="mb-3">
    <label class="form-label" for="foto">Foto Profil <small class="text-muted">(jpg/png/webp, maks 2 MB)</small></label>
    @if ($b?->foto)
        <div class="mb-2">
            <img src="{{ asset('foto/' . $b->foto) }}" alt="Foto" class="rounded" style="width:90px;height:90px;object-fit:cover">
            <div class="form-check mt-1">
                <input class="form-check-input" type="checkbox" name="hapus_foto" id="hapus_foto" value="1">
                <label class="form-check-label" for="hapus_foto">Hapus foto saat ini</label>
            </div>
        </div>
    @endif
    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
            value="{{ old('nama_lengkap', $b?->nama_lengkap) }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="jabatan">Jabatan / Headline <small class="text-muted">(mis. Web Developer)</small></label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $b?->jabatan) }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $b?->tempat_lahir) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
            value="{{ old('tanggal_lahir', $b?->tanggal_lahir?->format('Y-m-d')) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
            <option value="">-- Pilih --</option>
            @foreach (['Laki-laki', 'Perempuan'] as $jk)
                <option value="{{ $jk }}" @selected(old('jenis_kelamin', $b?->jenis_kelamin) === $jk)>{{ $jk }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label" for="status">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="">-- Pilih --</option>
            @foreach (['Belum menikah', 'Menikah'] as $st)
                <option value="{{ $st }}" @selected(old('status', $b?->status) === $st)>{{ $st }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label" for="kewarganegaraan">Kewarganegaraan</label>
        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
            value="{{ old('kewarganegaraan', $b?->kewarganegaraan) }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $b?->email) }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="no_hp">No. HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $b?->no_hp) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label" for="sosial_media">Sosial Media <small class="text-muted">(mis. @username)</small></label>
        <input type="text" class="form-control" id="sosial_media" name="sosial_media" value="{{ old('sosial_media', $b?->sosial_media) }}">
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $b?->alamat) }}">
</div>

<div class="mb-3">
    <label class="form-label" for="tentang_saya">Profil Singkat</label>
    <textarea class="form-control" id="tentang_saya" name="tentang_saya" rows="3">{{ old('tentang_saya', $b?->tentang_saya) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label" for="pendidikan">Pendidikan <small class="text-muted">(satu baris per jenjang, format: Nama Sekolah | 2016-2019)</small></label>
    <textarea class="form-control" id="pendidikan" name="pendidikan" rows="3"
        placeholder="SMA Negeri 1 Contoh | 2019-2022">{{ old('pendidikan', $b?->pendidikan) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label" for="keahlian">Keahlian <small class="text-muted">(pisahkan dengan koma)</small></label>
    <input type="text" class="form-control" id="keahlian" name="keahlian" value="{{ old('keahlian', $b?->keahlian) }}">
</div>

<div class="mb-4">
    <label class="form-label" for="pengalaman">Pengalaman Kerja
        <small class="text-muted">(baris pertama = judul, baris berikutnya = poin. Pisahkan antar pengalaman dengan baris kosong)</small></label>
    <textarea class="form-control" id="pengalaman" name="pengalaman" rows="6"
        placeholder="PT Contoh - Staff IT&#10;Mengelola jaringan kantor&#10;Membuat laporan bulanan&#10;&#10;CV Lain - Magang&#10;Membantu pembuatan website">{{ old('pengalaman', $b?->pengalaman) }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('biodata.index') }}" class="btn btn-gray-200">Batal</a>
