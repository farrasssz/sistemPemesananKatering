@extends('layouts.app')
@section('title', 'Dashboard')

@section('header')
    <h1 class="h4">Dashboard</h1>
    <p class="mb-0">Ringkasan data CV</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="h5 text-gray-600">Total Biodata</h2>
                    <h3 class="fw-extrabold mb-0">{{ $total }}</h3>
                    <a href="{{ route('biodata.index') }}" class="small">Kelola biodata &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-header"><h2 class="fs-5 fw-bold mb-0">Biodata Terbaru</h2></div>
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0">
                <thead class="thead-light">
                    <tr><th class="border-0">Nama</th><th class="border-0">Email</th><th class="border-0">Keahlian</th></tr>
                </thead>
                <tbody>
                    @forelse ($terbaru as $item)
                        <tr>
                            <td><a href="{{ route('biodata.show', $item) }}">{{ $item->nama_lengkap }}</a></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->keahlian ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
