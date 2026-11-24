@extends('layouts.admin.app')


@section('content')
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
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Edit Pelanggan</h1>
                    <p class="mb-0">Form untuk mengubah data pelanggan.</p>
                </div>
                <div>
                    <a href="" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>




<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">


                <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}"
                      method="POST"
                      enctype="multipart/form-data">


                    @csrf
                    @method('PUT')


                    <div class="row mb-4">


                        <!-- Kolom 1 -->
                        <div class="col-lg-4 col-sm-6">


                            <div class="mb-3">
                                <label for="first_name" class="form-label">
                                    First name
                                </label>
                                <input type="text"
                                       id="first_name"
                                       name="first_name"
                                       class="form-control"
                                       value="{{ old('first_name', $dataPelanggan->first_name) }}"
                                       required>
                            </div>


                            <div class="mb-3">
                                <label for="last_name" class="form-label">
                                    Last name
                                </label>
                                <input type="text"
                                       id="last_name"
                                       name="last_name"
                                       class="form-control"
                                       value="{{ old('last_name', $dataPelanggan->last_name) }}"
                                       required>
                            </div>


                        </div>


                        <!-- Kolom 2 -->
                        <div class="col-lg-4 col-sm-6">


                            <div class="mb-3">
                                <label for="birthday" class="form-label">
                                    Birthday
                                </label>
                                <input type="date"
                                       id="birthday"
                                       name="birthday"
                                       class="form-control"
                                       value="{{ old('birthday', $dataPelanggan->birthday ? \Carbon\Carbon::parse($dataPelanggan->birthday)->format('Y-m-d') : '') }}">
                            </div>


                            <div class="mb-3">
                                <label for="gender" class="form-label">
                                    Gender
                                </label>


                                <select class="form-select"
                                        id="gender"
                                        name="gender">
                                    <option value="">-- Pilih Gender --</option>


                                    <option value="Male"
                                        {{ old('gender', $dataPelanggan->gender) == 'Male' ? 'selected' : '' }}>
                                        Male
                                    </option>


                                    <option value="Female"
                                        {{ old('gender', $dataPelanggan->gender) == 'Female' ? 'selected' : '' }}>
                                        Female
                                    </option>


                                    <option value="Other"
                                        {{ old('gender', $dataPelanggan->gender) == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                            </div>


                        </div>


                        <!-- Kolom 3 -->
                        <div class="col-lg-4 col-sm-12">


                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email', $dataPelanggan->email) }}"
                                       required>
                            </div>


                            <div class="mb-3">
                                <label for="phone" class="form-label">
                                    Phone
                                </label>
                                <input type="text"
                                       id="phone"
                                       name="phone"
                                       class="form-control"
                                       value="{{ old('phone', $dataPelanggan->phone) }}">
                            </div>


                            <!-- Foto Profil Saat Ini -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Foto Profil Saat Ini
                                </label>


                                <div class="mb-3">
                                    @if ($dataPelanggan->foto_profil)
                                        <img
                                            src="{{ asset('storage/' . $dataPelanggan->foto_profil) }}"
                                            alt="Foto Profil"
                                            width="100"
                                            height="100"
                                            style="object-fit: cover; border-radius: 50%;">


                                    @else
                                        <div class="text-muted">
                                            Belum ada foto profil.
                                        </div>
                                    @endif
                                </div>


                                <label for="foto_profil" class="form-label">
                                    Ganti Foto Profil
                                </label>


                                <input type="file"
                                       id="foto_profil"
                                       name="foto_profil"
                                       class="form-control"
                                       accept=".jpg,.jpeg,.png,.webp">


                                <small class="text-muted">
                                    JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.
                                </small>


                                @error('foto_profil')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Buttons -->
                            <div>
                                <button type="submit" class="btn btn-info">
                                    Simpan
                                </button>


                                <a href="{{ route('pelanggan.index') }}"
                                   class="btn btn-outline-secondary ms-2">
                                    Batal
                                </a>
                            </div>


                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


@endsection
