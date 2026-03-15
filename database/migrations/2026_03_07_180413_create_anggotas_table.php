<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id(); // ID unik otomatis
            $table->string('nama'); // Nama lengkap anggota
            $table->string('program_studi'); // Jurusan/Prodi di Unimma
            $table->string('status'); // Contoh: Calon Anggota, Kader Aktif, Pengurus (Diubah dari status_kader)
            $table->string('foto')->nullable(); // Foto anggota
            $table->timestamps(); 
        });
    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};