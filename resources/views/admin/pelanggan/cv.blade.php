<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CV - {{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
            color: #334155;
        }

        .cv-container {
            max-width: 900px;
            margin: auto;
        }

        .cv-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.09);
        }

        .cv-header {
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: white;
            padding: 38px;
        }

        .profile-photo {
            width: 145px;
            height: 145px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255, 255, 255, 0.9);
            background: white;
        }

        .profile-placeholder {
            width: 145px;
            height: 145px;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            border: 5px solid rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 55px;
        }

        .section-title {
            color: #1d4ed8;
            font-weight: 700;
            font-size: 17px;
            margin-bottom: 20px;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 17px;
            height: 100%;
        }

        .info-label {
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            margin-bottom: 7px;
        }

        .info-value {
            color: #0f172a;
            font-weight: 600;
            overflow-wrap: anywhere;
            margin-bottom: 0;
        }

        .section-divider {
            border-color: #e2e8f0;
            margin: 28px 0;
        }

        .btn-custom {
            border-radius: 9px;
            padding: 10px 17px;
        }

        @media print {
            body {
                background: white;
            }

            .no-print {
                display: none !important;
            }

            .cv-card {
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .cv-header {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .container {
                padding: 0 !important;
            }
        }

        @media (max-width: 576px) {
            .cv-header {
                padding: 28px 20px;
                text-align: center;
            }

            .cv-header .row {
                justify-content: center;
            }

            .cv-header .profile-photo,
            .cv-header .profile-placeholder {
                margin-bottom: 20px;
            }

            .cv-content {
                padding: 24px !important;
            }
        }
    </style>
</head>

<body>

    <div class="container py-4 py-md-5">
        <div class="cv-container">

            <!-- Tombol navigasi -->
            <div class="d-flex justify-content-between align-items-center mb-4 no-print">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary btn-custom">
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>

                <div class="d-flex gap-2">
                    <a href="{{ route('pelanggan.edit', $pelanggan->pelanggan_id) }}"
                        class="btn btn-warning btn-custom">
                        <i class="bi bi-pencil-square me-1"></i>
                        Edit
                    </a>

                    <button onclick="window.print()" class="btn btn-primary btn-custom">
                        <i class="bi bi-printer me-1"></i>
                        Cetak CV
                    </button>
                </div>
            </div>

            <div class="card cv-card">

                <!-- Header dan foto profil -->
                <div class="cv-header">
                    <div class="row align-items-center g-4">
                        <div class="col-md-auto">
                            @if (!empty($pelanggan->foto))
                                <img src="{{ asset('storage/' . $pelanggan->foto) }}"
                                    alt="Foto {{ $pelanggan->first_name }}" class="profile-photo">
                            @else
                                <div class="profile-placeholder">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            @endif
                        </div>

                        <div class="col">
                            <p class="text-uppercase small mb-2" style="letter-spacing: 2px; color: #bfdbfe;">
                                Curriculum Vitae
                            </p>

                            <h1 class="fw-bold mb-2">
                                {{ $pelanggan->first_name }}
                                {{ $pelanggan->last_name }}
                            </h1>

                            <p class="mb-3" style="color: #dbeafe;">
                                <i class="bi bi-person-badge me-2"></i>
                                Data Pelanggan #{{ $pelanggan->pelanggan_id }}
                            </p>

                            <span class="badge rounded-pill text-bg-light px-3 py-2">
                                <i class="bi bi-patch-check-fill me-1 text-primary"></i>
                                Profil Pelanggan
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Isi CV -->
                <div class="card-body cv-content p-4 p-md-5">

                    <div class="section-title">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Informasi Pribadi
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-person me-1"></i>
                                    Nama Lengkap
                                </div>
                                <p class="info-value">
                                    {{ $pelanggan->first_name }}
                                    {{ $pelanggan->last_name }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-envelope me-1"></i>
                                    Alamat Email
                                </div>
                                <p class="info-value">
                                    {{ $pelanggan->email ?: 'Belum diisi' }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-telephone me-1"></i>
                                    Nomor Telepon
                                </div>
                                <p class="info-value">
                                    {{ $pelanggan->phone ?: 'Belum diisi' }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-gender-ambiguous me-1"></i>
                                    Jenis Kelamin
                                </div>
                                <p class="info-value">
                                    {{ $pelanggan->gender ?: 'Belum diisi' }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    Tanggal Lahir
                                </div>
                                <p class="info-value">
                                    @if ($pelanggan->birthday)
                                        {{ \Carbon\Carbon::parse($pelanggan->birthday)->format('d F Y') }}
                                    @else
                                        Belum diisi
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">
                                    <i class="bi bi-hash me-1"></i>
                                    ID Pelanggan
                                </div>
                                <p class="info-value">
                                    #{{ $pelanggan->pelanggan_id }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr class="section-divider">

                    <div class="section-title">
                        <i class="bi bi-card-text me-2"></i>
                        Ringkasan Profil
                    </div>

                    <p class="text-secondary mb-0" style="line-height: 1.8;">
                        Halaman ini menampilkan informasi profil pelanggan
                        yang tersimpan di dalam sistem. Data mencakup identitas,
                        informasi kontak, jenis kelamin, dan tanggal lahir.
                    </p>

                    <div class="text-center mt-5 pt-3">
                        <small class="text-secondary">
                            Dokumen profil pelanggan ·
                            {{ date('Y') }}
                        </small>
                    </div>

                </div>
            </div>

            <p class="text-center text-secondary small mt-3 no-print">
                Pastikan data pelanggan sudah benar sebelum mencetak CV.
            </p>

        </div>
    </div>

</body>

</html>
