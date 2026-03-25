<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'tgl_kegiatan' => 'required|date',
            'foto_1' => 'image|mimes:jpg,png,jpeg|max:2048', // Minimal 1 foto utama
            'foto_2' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'foto_3' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();
        // Bikin link otomatis dari judul (Auto-Slug)
        $data['slug'] = Str::slug($request->judul) . '-' . Str::random(5); 

        // Loop untuk mengecek dan menyimpan 3 foto
        for ($i = 1; $i <= 3; $i++) {
            $nama_foto = 'foto_' . $i;
            if ($request->hasFile($nama_foto)) {
                $data[$nama_foto] = $request->file($nama_foto)->store('foto-kegiatan', 'public');
            }
        }

        Kegiatan::create($data);

        return redirect()->route('kegiatan.index')->with('success', 'Kabar Pergerakan Berhasil Diupload');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi data yang diedit
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'tgl_kegiatan' => 'required|date',
            'foto_1' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
            'foto_2' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'foto_3' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $data = $request->all();

        // Bikin ulang link/slug biar sesuai sama judul yang baru
        $data['slug'] = Str::slug($request->judul) . '-' . Str::random(5);

        // Cek 3 laci foto: Kalau ada file baru yang masuk, hapus file lamanya!
        for ($i = 1; $i <= 3; $i++) {
            $nama_foto = 'foto_' . $i;
            
            if ($request->hasFile($nama_foto)) {
                // Hapus foto lama di server biar memori nggak penuh
                if ($kegiatan->$nama_foto) {
                    Storage::disk('public')->delete($kegiatan->$nama_foto);
                }
                // Simpan foto baru
                $data[$nama_foto] = $request->file($nama_foto)->store('foto-kegiatan', 'public');
            }
        }

        $kegiatan->update($data);

        return redirect()->route('kegiatan.index')->with('success', 'Mantap! Kabar Pergerakan berhasil diupdate bray!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan->foto) {
            Storage::disk('public')->delete($kegiatan->foto);
        }
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Postingan berhasil dihapus!');
    }
}
