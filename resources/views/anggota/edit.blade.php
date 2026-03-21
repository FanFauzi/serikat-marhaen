<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">Edit Data Kader</h2>
            <a href="{{ route('anggota.index') }}" class="text-gray-500 hover:text-red-600 font-semibold text-sm transition">&larr; Batal & Kembali</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-1">NAMA LENGKAP *</label>
                            <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">ASAL DPK *</label>
                            <input type="text" name="dpk_asal" value="{{ old('dpk_asal', $anggota->dpk_asal) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 bg-gray-50">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">FAKULTAS</label>
                            <input type="text" name="fakultas" value="{{ old('fakultas', $anggota->fakultas ?? '') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">JURUSAN / PROGRAM STUDI</label>
                            <input type="text" name="jurusan" value="{{ old('jurusan', $anggota->jurusan) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">NO HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', $anggota->no_hp ?? '') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">TEMPAT, TANGGAL LAHIR</label>
                            <input type="text" name="ttl" value="{{ old('ttl', $anggota->ttl) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">TAHUN ANGKATAN (PPAB)</label>
                            <input type="text" name="angkatan" value="{{ old('angkatan', $anggota->angkatan) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-1">ALAMAT ASAL</label>
                            <textarea name="alamat" rows="2" class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200">{{ old('alamat', $anggota->alamat) }}</textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-1">GANTI FOTO PROFIL</label>
                            @if($anggota->foto)
                                <img src="{{ asset('storage/'.$anggota->foto) }}" class="w-16 h-16 rounded-full object-cover mb-2 border">
                            @endif
                            <input type="file" name="foto" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="bg-gray-900 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-colors">Update Data Kader</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>