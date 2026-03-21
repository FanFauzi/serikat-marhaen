<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">Buku Induk Kader</h2>
            <a href="{{ route('anggota.index') }}" class="text-gray-500 hover:text-red-600 font-semibold text-sm">&larr; Kembali</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl border border-gray-100 overflow-hidden">
                <div class="bg-red-700 h-32"></div>
                <div class="px-8 pb-8 relative">
                    <div class="-mt-16 mb-6 flex justify-center">
                        @if($anggota->foto)
                            <img src="{{ asset('storage/'.$anggota->foto) }}" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg bg-white">
                        @else
                            <div class="w-32 h-32 rounded-full bg-gray-100 border-4 border-white shadow-lg flex items-center justify-center text-gray-400 font-black text-5xl">{{ strtoupper(substr($anggota->nama, 0, 1)) }}</div>
                        @endif
                    </div>
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-black text-gray-900">{{ $anggota->nama }}</h3>
                        <p class="text-red-600 font-bold uppercase text-sm mt-1">{{ $anggota->dpk_asal }}</p>
                    </div>
                    <div class="border-t border-gray-200 mb-8"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">FAKULTAS</p>
                            <p class="text-base font-semibold text-gray-900">{{ $anggota->fakultas ?? '-' }}</p>
                        </div>

                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">JURUSAN / PRODI</p>
                            <p class="text-base font-semibold text-gray-900">{{ $anggota->jurusan ?? '-' }}</p>
                        </div>

                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">NO HP</p>
                            <p class="text-base font-semibold text-gray-900">{{ $anggota->no_hp ?? '-' }}</p>
                        </div>
                        
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">TAHUN ANGKATAN (PPAB)</p>
                            <p class="text-base font-semibold text-gray-900">{{ $anggota->angkatan ?? '-' }}</p>
                        </div>

                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 md:col-span-2">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">TEMPAT, TANGGAL LAHIR</p>
                            <p class="text-base font-semibold text-gray-900">{{ $anggota->ttl ?? '-' }}</p>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 md:col-span-2">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">ALAMAT ASAL</p>
                            <p class="text-base font-medium text-gray-800">{{ $anggota->alamat ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>