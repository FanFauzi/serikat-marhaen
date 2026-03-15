<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman utama (Beranda)
    public function beranda()
    {
        // Ambil 3 kegiatan terbaru saja untuk di halaman depan
        $kegiatan_terbaru = Kegiatan::latest()->take(3)->get(); 
        
        return view('welcome', compact('kegiatan_terbaru'));
    }

    // Menampilkan detail satu kegiatan berdasarkan slug-nya
    public function detailKegiatan($slug)
    {
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();
        
        return view('kegiatan_detail', compact('kegiatan'));
    }
}