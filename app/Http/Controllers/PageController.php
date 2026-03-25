<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman depan (Landing Page)
    public function beranda()
    {
        // Ambil 6 berita terbaru untuk dipamerkan di depan
        $kegiatans = Kegiatan::latest()->take(6)->get();
        return view('welcome', compact('kegiatans'));
    }

    // Menampilkan halaman baca berita utuh untuk publik
    public function detailKegiatan($slug)
    {
        // Cari berita berdasarkan slug (link URL)
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();
        return view('kegiatan_detail', compact('kegiatan'));
    }
}