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
            'dpk_asal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
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
            'dpk_asal' => 'required',
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

        // Deteksi pembatas (koma atau titik koma)
        $header = fgetcsv($fileHandle, 0, ';'); // Coba pakai titik koma dulu
        if (count($header) === 1) {
            // Kalau nggak kepecah, berarti filenya pakai koma standar
            rewind($fileHandle);
            $header = fgetcsv($fileHandle, 0, ',');
            $delimiter = ',';
        } else {
            $delimiter = ';';
        }

        // Looping baca data baris demi baris
        while (($row = fgetcsv($fileHandle, 0, $delimiter)) !== false) {
            
            // Bersihkan karakter aneh bawaan Excel (seperti \x85) agar jadi UTF-8 yang bersih
            $row = array_map(function($value) {
                return mb_convert_encoding($value, 'UTF-8', 'auto');
            }, $row);

            // Kolom Excel:
            // 0:No, 1:Nama, 2:Komisariat, 3:Fakultas, 4:Prodi, 5:Tahun, 6:Kaderisasi, 7:No WA, 8:Alamat
            
            // Pastikan kolom Nama (index 1) tidak kosong
            if (!empty($row[1])) { 
                Anggota::create([
                    'nama'     => $row[1],
                    'dpk_asal' => !empty($row[2]) ? $row[2] : 'DPK GMNI Unimma Kampus 2',
                    'fakultas' => $row[3] ?? null,
                    'jurusan'  => $row[4] ?? null,
                    'angkatan' => $row[5] ?? null,
                    'status'   => !empty($row[6]) ? $row[6] : 'Kader Aktif',
                    'no_hp'    => $row[7] ?? null,
                    'alamat'   => $row[8] ?? null,
                ]);
            }
        }
        fclose($fileHandle);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil terupload');
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
