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
            $table->string('nama');
            $table->string('dpk_asal')->default('DPK GMNI Unimma Kampus 2');
            $table->string('fakultas')->nullable();
            $table->string('jurusan')->nullable(); 
            $table->string('no_hp')->nullable();
            $table->string('ttl')->nullable();
            $table->string('angkatan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('status')->default('Anggota'); 
            $table->string('foto')->nullable();
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