<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori')->default('Berita'); 
            $table->text('konten');
            $table->string('foto_1')->nullable(); // Ini wajib/utama buat Thumbnail depan
            $table->string('foto_2')->nullable(); // Opsional
            $table->string('foto_3')->nullable(); // Opsional
            
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->date('tgl_kegiatan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};