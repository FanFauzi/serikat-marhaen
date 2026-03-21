<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/post/{slug}', [PageController::class, 'detailKegiatan'])->name('kegiatan.baca');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/anggota/import', [App\Http\Controllers\AnggotaController::class, 'import'])->name('anggota.import');

    Route::resource('anggota', AnggotaController::class);
    Route::resource('kegiatan', KegiatanController::class);
});

require __DIR__ . '/auth.php';
