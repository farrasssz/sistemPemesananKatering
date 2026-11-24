@extends('layouts.admin.app')

@section('content')
    {{-- start main content --}}
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Pelanggan</h1>
                <p class="mb-0">List data seluruh pelanggan</p>
            </div>
            <div>
                <a href="{{ route('pelanggan.create') }}" class="btn btn-success text-white"><i
                        class="far fa-question-circle me-1"></i> Tambah Pelanggan</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{!! session('success') !!}</div>
    @endif

    <div class="row">
        <div class="col-12 mb-4">

            {{-- Alert Pesan Sukses (Sesuai Desain Gambar) --}}
            @if (session('success'))
                <div class="alert alert-dismissible fade show p-3 mb-4 border-0 rounded-3"
                    style="background-color: #d1e7dd; color: #0f5132;" role="alert">
                    <span class="fw-bold">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Alert Pesan Error --}}
            @if (session('error'))
                <div class="alert alert-dismissible fade show p-3 mb-4 border-0 rounded-3"
                    style="background-color: #f8d7da; color: #842029;" role="alert">
                    <span class="fw-bold">{{ session('error') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="GET" action="{{ route('pelanggan.index') }}" class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="gender" onchange="this.form.submit()" class="form-select">
                                        <option value="">All</option>
                                        <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                            value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                                        <button type="submit" class="input-group-text" id="basic-addon2">
                                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        @if (request('search'))
                                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                                class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table id="table-pelanggan" class="table table-centered table-nowrap mb-0 rounded">

                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0">Foto</th>
                                    <th class="border-0">First Name</th>
                                    <th class="border-0">Last Name</th>
                                    <th class="border-0">Birthday</th>
                                    <th class="border-0">Gender</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Phone</th>
                                    <th class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($dataPelanggan as $item)
                                    <tr>
                                        {{-- Foto Pelanggan --}}
                                        <td>
                                            @if (!empty($item->foto))
                                                <img src="{{ asset('storage/' . $item->foto) }}"
                                                    alt="Foto {{ $item->first_name }}" class="pelanggan-photo"
                                                    loading="lazy"
                                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';">

                                                <span class="pelanggan-photo-placeholder" style="display: none;">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            @else
                                                <span class="pelanggan-photo-placeholder">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Informasi Pelanggan --}}
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->birthday ?: '-' }}</td>
                                        <td>{{ $item->gender ?: '-' }}</td>
                                        <td>{{ $item->email ?: '-' }}</td>
                                        <td>{{ $item->phone ?: '-' }}</td>

                                        {{-- Tombol Aksi --}}
                                        <td>
                                            <div class="d-flex align-items-center gap-1">

                                                {{-- Lihat CV --}}
                                                <a href="{{ route('pelanggan.cv', $item->pelanggan_id) }}"
                                                    class="btn btn-success btn-sm" title="Lihat CV">
                                                    <i class="fas fa-file-alt me-1"></i>
                                                    CV Online
                                                </a>

                                                {{-- Edit Pelanggan --}}
                                                <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                                    class="btn btn-info btn-sm text-white" title="Edit pelanggan">
                                                    <i class="fas fa-edit me-1"></i>
                                                    Edit
                                                </a>

                                                {{-- Hapus Pelanggan --}}
                                                <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Hapus pelanggan">
                                                        <i class="fas fa-trash-alt me-1"></i>
                                                        Hapus
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <i class="fas fa-users fa-2x text-secondary mb-2"></i>
                                            <p class="mb-0 text-secondary">
                                                Belum ada data pelanggan.
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{ $dataPelanggan->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end main content --}}
@endsection
