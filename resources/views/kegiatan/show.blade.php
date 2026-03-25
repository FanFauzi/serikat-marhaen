<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-3xl border border-gray-100 overflow-hidden">
                
                @if($kegiatan->foto_1)
                    <div class="w-full h-80 md:h-[400px] relative">
                        <img src="{{ asset('storage/'.$kegiatan->foto_1) }}" alt="{{ $kegiatan->judul }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-80"></div>
                        <div class="absolute bottom-6 left-8 right-8 text-white">
                            <span class="bg-red-600 text-white font-bold px-3 py-1 rounded-full text-xs uppercase tracking-widest mb-3 inline-block shadow-md">
                                {{ $kegiatan->kategori }}
                            </span>
                            <h1 class="text-3xl md:text-5xl font-black leading-tight drop-shadow-lg">{{ $kegiatan->judul }}</h1>
                            <p class="mt-2 text-gray-200 text-sm font-medium">📆 Dipublikasikan pada {{ \Carbon\Carbon::parse($kegiatan->tgl_kegiatan)->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif

                <div class="p-8 md:p-12">
                    <a href="{{ route('kegiatan.index') }}" class="inline-block mb-8 text-sm font-bold text-gray-500 hover:text-red-600 transition">&larr; KEMBALI KE DAFTAR KABAR</a>

                    <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed mb-10">
                        {!! $kegiatan->konten !!}
                    </div>

                    @if($kegiatan->foto_2 || $kegiatan->foto_3)
                        <div class="border-t border-gray-200 pt-8 mt-8">
                            <h3 class="text-xl font-black text-gray-900 mb-6">Galeri Dokumentasi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if($kegiatan->foto_2)
                                    <div class="overflow-hidden rounded-xl shadow-md border border-gray-100">
                                        <img src="{{ asset('storage/'.$kegiatan->foto_2) }}" class="w-full h-64 object-cover hover:scale-105 transition duration-500 cursor-pointer">
                                    </div>
                                @endif
                                
                                @if($kegiatan->foto_3)
                                    <div class="overflow-hidden rounded-xl shadow-md border border-gray-100">
                                        <img src="{{ asset('storage/'.$kegiatan->foto_3) }}" class="w-full h-64 object-cover hover:scale-105 transition duration-500 cursor-pointer">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>