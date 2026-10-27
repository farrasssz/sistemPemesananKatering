@extends('layouts.app')
@section('title', 'Biodata CV')

@section('header')
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Biodata CV</h1>
            <p class="mb-0">Daftar seluruh biodata</p>
        </div>
        <div>
            <a href="{{ route('biodata.create') }}" class="btn btn-success text-white">+ Tambah Biodata</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Foto</th>
                            <th class="border-0">Nama</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">No. HP</th>
                            <th class="border-0">Jabatan</th>
                            <th class="border-0">Keahlian</th>
                            <th class="border-0 rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataBiodata as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ asset('foto/' . $item->foto) }}" class="rounded-circle" style="width:40px;height:40px;object-fit:cover" alt="">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp ?? '-' }}</td>
                                <td>{{ $item->jabatan ?? '-' }}</td>
                                <td>{{ $item->keahlian ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('biodata.show', $item) }}" target="_blank" class="btn btn-sm btn-info text-white">Lihat CV</a>
                                    <a href="{{ route('biodata.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('biodata.destroy', $item) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Hapus biodata {{ $item->nama_lengkap }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">Belum ada data. Klik "Tambah Biodata".</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
