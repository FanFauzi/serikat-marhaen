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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id(); // ID unik otomatis
            $table->string('judul'); // Judul kegiatan
            $table->string('slug')->unique(); // URL ramah SEO (contoh: /kegiatan/makrab-2026)
            $table->text('konten'); // Isi/deskripsi kegiatan
            $table->string('foto')->nullable(); // Foto kegiatan (nullable = boleh kosong)
            $table->date('tanggal_kegiatan'); // Tanggal pelaksanaan
            $table->timestamps(); // Otomatis mencatat kapan data dibuat & diedit
        });
    }

    /**
     * Batalkan migration (hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};