<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV {{ $biodata->nama_lengkap }}</title>
    <style>
        :root { --gelap: #1f2b33; --emas: #e6c65c; --teks: #2b2f33; --abu: #6b7280; }
        * { box-sizing: border-box; }
        body { margin: 0; background: #e5e7eb; font-family: 'Segoe UI', Roboto, Arial, sans-serif; color: var(--teks);
               -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        .toolbar { max-width: 210mm; margin: 16px auto; display: flex; gap: 8px; justify-content: flex-end; padding: 0 8px; }
        .toolbar a, .toolbar button { background: var(--gelap); color: #fff; border: 0; border-radius: 6px; padding: 8px 14px;
               font-size: 14px; text-decoration: none; cursor: pointer; }
        .toolbar .sekunder { background: #fff; color: var(--gelap); }

        .cv { width: 210mm; min-height: 297mm; margin: 0 auto 32px; background: #fff; display: flex; box-shadow: 0 4px 20px rgba(0,0,0,.15); }
        .kiri { width: 33%; background: var(--gelap); color: #fff; padding: 28px 20px; border-radius: 0 0 0 0; }
        .kanan { flex: 1; padding: 36px 32px; }

        .foto { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; display: block; margin: 0 auto 28px;
                border: 4px solid #fff; background: #3b4a55; }
        .foto.inisial { display: flex; align-items: center; justify-content: center; font-size: 52px; font-weight: 700; color: #fff; }

        .label { display: inline-block; background: var(--emas); color: var(--gelap); font-weight: 700; font-size: 12px;
                 letter-spacing: .08em; text-transform: uppercase; padding: 5px 16px; border-radius: 0 999px 999px 0; margin: 0 0 12px -20px; }
        .kanan .label { margin-left: -32px; display: block; width: calc(100% + 32px); border-radius: 0; background: var(--emas); padding: 6px 32px; }
        .kiri .blok { margin-bottom: 24px; }
        .kiri dl { margin: 0; font-size: 13px; line-height: 1.5; }
        .kiri dt { font-weight: 700; margin-top: 8px; }
        .kiri dd { margin: 0; color: #d1d5db; }
        .kiri ul { margin: 0; padding-left: 16px; font-size: 13px; line-height: 1.7; color: #d1d5db; }
        .kontak p { margin: 0 0 10px; font-size: 13px; word-break: break-word; color: #d1d5db; }

        h1 { font-size: 34px; line-height: 1.1; margin: 0 0 4px; text-transform: uppercase; letter-spacing: .02em; }
        .jabatan { font-style: italic; color: var(--abu); font-size: 18px; margin: 0 0 24px; }
        .kanan section { margin-bottom: 22px; }
        .kanan p { font-size: 13px; line-height: 1.6; margin: 0; }
        .baris { display: flex; justify-content: space-between; gap: 12px; font-size: 13px; margin-bottom: 6px; }
        .baris .tahun { color: var(--abu); white-space: nowrap; }
        .kerja h4 { margin: 10px 0 4px; font-size: 14px; }
        .kerja ul { margin: 0; padding-left: 18px; font-size: 13px; line-height: 1.6; }

        @page { size: A4; margin: 0; }
        @media print {
            body { background: #fff; }
            .toolbar { display: none; }
            .cv { margin: 0; box-shadow: none; }
        }
        @media (max-width: 800px) { .cv { width: 100%; flex-direction: column; } .kiri { width: 100%; } }
    </style>
</head>
<body>
    <div class="toolbar">
        <a href="{{ route('biodata.index') }}" class="sekunder">&larr; Kembali</a>
        <a href="{{ route('biodata.edit', $biodata) }}" class="sekunder">Edit</a>
        <button onclick="window.print()">Cetak / Simpan PDF</button>
    </div>

    <div class="cv">
        {{-- ===== Kolom kiri ===== --}}
        <aside class="kiri">
            @if ($biodata->foto)
                <img class="foto" src="{{ asset('foto/' . $biodata->foto) }}" alt="Foto {{ $biodata->nama_lengkap }}">
            @else
                <div class="foto inisial">{{ strtoupper(mb_substr($biodata->nama_lengkap, 0, 1)) }}</div>
            @endif

            <div class="blok">
                <span class="label">Data Diri</span>
                <dl>
                    @if ($biodata->tempat_lahir || $biodata->tanggal_lahir)
                        <dt>Tempat / Tanggal Lahir</dt>
                        <dd>{{ $biodata->tempat_lahir }}{{ $biodata->tempat_lahir && $biodata->tanggal_lahir ? ', ' : '' }}{{ $biodata->tanggal_lahir?->format('d-m-Y') }}</dd>
                    @endif
                    @if ($biodata->jenis_kelamin)<dt>Jenis Kelamin</dt><dd>{{ $biodata->jenis_kelamin }}</dd>@endif
                    @if ($biodata->status)<dt>Status</dt><dd>{{ $biodata->status }}</dd>@endif
                    @if ($biodata->kewarganegaraan)<dt>Kewarganegaraan</dt><dd>{{ $biodata->kewarganegaraan }}</dd>@endif
                </dl>
            </div>

            <div class="blok kontak">
                <span class="label">Kontak</span>
                @if ($biodata->no_hp)<p>&#9742; {{ $biodata->no_hp }}</p>@endif
                <p>&#9993; {{ $biodata->email }}</p>
                @if ($biodata->alamat)<p>&#9906; {{ $biodata->alamat }}</p>@endif
            </div>

            @if ($biodata->sosial_media)
                <div class="blok kontak">
                    <span class="label">Sosial Media</span>
                    <p>{{ $biodata->sosial_media }}</p>
                </div>
            @endif

            @if ($biodata->daftarKeahlian())
                <div class="blok">
                    <span class="label">Keahlian</span>
                    <ul>
                        @foreach ($biodata->daftarKeahlian() as $skill)<li>{{ $skill }}</li>@endforeach
                    </ul>
                </div>
            @endif
        </aside>

        {{-- ===== Kolom kanan ===== --}}
        <main class="kanan">
            <h1>{{ $biodata->nama_lengkap }}</h1>
            @if ($biodata->jabatan)<p class="jabatan">{{ $biodata->jabatan }}</p>@endif

            @if ($biodata->tentang_saya)
                <section>
                    <span class="label">Tentang Saya</span>
                    <p>{!! nl2br(e($biodata->tentang_saya)) !!}</p>
                </section>
            @endif

            @if ($biodata->daftarPendidikan())
                <section>
                    <span class="label">Pendidikan</span>
                    @foreach ($biodata->daftarPendidikan() as $p)
                        <div class="baris"><span>{{ $p['nama'] }}</span><span class="tahun">{{ $p['tahun'] }}</span></div>
                    @endforeach
                </section>
            @endif

            @if ($biodata->daftarPengalaman())
                <section class="kerja">
                    <span class="label">Pengalaman Kerja</span>
                    @foreach ($biodata->daftarPengalaman() as $k)
                        <h4>{{ $k['judul'] }}</h4>
                        @if ($k['poin'])
                            <ul>@foreach ($k['poin'] as $poin)<li>{{ $poin }}</li>@endforeach</ul>
                        @endif
                    @endforeach
                </section>
            @endif
        </main>
    </div>
</body>
</html>
