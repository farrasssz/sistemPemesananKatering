<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    // GANTI 0000 dengan angka NIM kamu (juga di file migration)
    protected $table = 'biodata_0000';

    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'email',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status',
        'kewarganegaraan',
        'alamat',
        'sosial_media',
        'pendidikan',
        'keahlian',
        'pengalaman',
        'tentang_saya',
        'foto',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Pendidikan: satu baris per jenjang, format "Sekolah | 2016-2019"
    public function daftarPendidikan(): array
    {
        $hasil = [];
        foreach (preg_split('/\R/', (string) $this->pendidikan) as $baris) {
            $baris = trim($baris);
            if ($baris === '') continue;
            [$nama, $tahun] = array_pad(array_map('trim', explode('|', $baris, 2)), 2, '');
            $hasil[] = ['nama' => $nama, 'tahun' => $tahun];
        }
        return $hasil;
    }

    // Pengalaman: blok dipisah baris kosong. Baris 1 = judul, sisanya = poin
    public function daftarPengalaman(): array
    {
        $hasil = [];
        foreach (preg_split('/\R\s*\R/', trim((string) $this->pengalaman)) as $blok) {
            $baris = array_values(array_filter(array_map('trim', preg_split('/\R/', $blok))));
            if (! $baris) continue;
            $judul = array_shift($baris);
            $hasil[] = ['judul' => $judul, 'poin' => $baris];
        }
        return $hasil;
    }

    public function daftarKeahlian(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->keahlian))));
    }
}
