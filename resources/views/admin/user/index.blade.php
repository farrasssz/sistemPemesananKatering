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
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Data User</h1>
                    <p class="mb-0">List data seluruh user</p>
                </div>
                <div>
                    <a href="{{ route('user.create') }}" class="btn btn-success text-white"><i
                            class="fas fa-plus me-1"></i> Tambah User</a>
                </div>
            </div>
        </div>

        @if (session("success"))
            <div class="alert alert-success">{!!session('success')!!}</div>
        @endif

        <div class="row">
            <div class="col-12 mb-4">

                {{-- Alert Pesan Sukses (Sesuai Desain Gambar) --}}
                @if (session('success'))
                    <div class="alert alert-dismissible fade show p-3 mb-4 border-0 rounded-3"
                        style="background-color: #d1e7dd; color: #0f5132;" role="alert">
                        <span class="fw-bold">{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                {{-- Alert Pesan Error --}}
                @if (session('error'))
                    <div class="alert alert-dismissible fade show p-3 mb-4 border-0 rounded-3"
                        style="background-color: #f8d7da; color: #842029;" role="alert">
                        <span class="fw-bold">{{ session('error') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="table-user" class="table table-centered table-nowrap mb-0 rounded">

                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-0">#</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0 rounded-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($dataUser as $item)
                                        <tr>
                                            {{-- Nomor Urut --}}
                                            <td>{{ $loop->iteration }}</td>

                                            {{-- Informasi User --}}
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>

                                            {{-- Tombol Aksi --}}
                                            <td>
                                                <div class="d-flex align-items-center gap-1">

                                                    {{-- Edit User --}}
                                                    <a href="{{ route('user.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm text-white" title="Edit user">
                                                        <i class="fas fa-edit me-1"></i>
                                                        Edit
                                                    </a>

                                                    {{-- Hapus User --}}
                                                    <form action="{{ route('user.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Hapus user">
                                                            <i class="fas fa-trash-alt me-1"></i>
                                                            Hapus
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <i class="fas fa-users fa-2x text-secondary mb-2"></i>
                                                <p class="mb-0 text-secondary">
                                                    Belum ada data user.
                                                </p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end main content --}}
@endsection
