<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // GANTI 0000 dengan angka NIM kamu (juga di app/Models/Biodata.php)
    private string $table = 'biodata_0000';

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 100);
            $table->string('jabatan', 100)->nullable();
            $table->string('email')->unique();
            $table->string('no_hp', 20)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->enum('status', ['Belum menikah', 'Menikah'])->nullable();
            $table->string('kewarganegaraan', 50)->nullable();
            $table->string('alamat')->nullable();
            $table->string('sosial_media', 100)->nullable();
            $table->text('pendidikan')->nullable();
            $table->string('keahlian')->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('tentang_saya')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
