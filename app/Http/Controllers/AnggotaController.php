<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::latest()->get();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required',
            'program_studi' => 'required',
            'status' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048' // Opsional, max 2MB
        ]);

        $data = $request->all();

        // Logika Upload Foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-anggota', 'public');
        }

        Anggota::create($data); // Simpan ke database

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari data anggota berdasarkan ID
        $anggota = Anggota::findOrFail($id);

        // Tampilkan ke halaman show.blade.php
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'program_studi' => 'required',
            'status' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $anggota = Anggota::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($anggota->foto) {
                Storage::disk('public')->delete($anggota->foto);
            }
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('foto-anggota', 'public');
        }

        $anggota->update($data);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function import(Request $request)
    {
        // Validasi wajib upload file CSV/TXT
        $request->validate([
            'file_anggota' => 'required|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('file_anggota');
        $fileHandle = fopen($file->getPathname(), 'r');

        // Lewati baris pertama (biasanya berisi judul kolom / Header)
        $header = fgetcsv($fileHandle);

        // Looping baca data baris demi baris
        while (($row = fgetcsv($fileHandle)) !== false) {

            if (!empty($row[0])) { // Pastikan namanya tidak kosong
                Anggota::create([
                    'nama' => $row[0],
                    'nim' => $row[1] ?? '-',
                    'jurusan' => $row[2] ?? '-',
                ]);
            }
        }
        fclose($fileHandle);

        return redirect()->route('anggota.index')->with('success', 'Ratusan data anggota berhasil disedot ke database bray!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $anggota = Anggota::findOrFail($id);

        if ($anggota->foto) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}
