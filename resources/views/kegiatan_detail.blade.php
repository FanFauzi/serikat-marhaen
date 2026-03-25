<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kegiatan->judul }} - GMNI Unimma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    <nav class="bg-red-700 text-white shadow-md">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ route('beranda') }}" class="font-black text-xl hover:text-red-200 transition">
                    &larr; GMNI <span class="font-normal">Kabar</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="py-10 px-4">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
            
            @if($kegiatan->foto_1)
                <div class="w-full h-64 md:h-96 relative">
                    <img src="{{ asset('storage/'.$kegiatan->foto_1) }}" alt="{{ $kegiatan->judul }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <span class="bg-red-600 text-white font-bold px-3 py-1 rounded-full text-xs uppercase tracking-widest mb-3 inline-block">
                            {{ $kegiatan->kategori }}
                        </span>
                        <h1 class="text-3xl md:text-5xl font-black text-white leading-tight drop-shadow-md mb-2">{{ $kegiatan->judul }}</h1>
                        <p class="text-gray-300 text-sm">Dipublikasikan pada {{ \Carbon\Carbon::parse($kegiatan->tgl_kegiatan)->format('d F Y') }}</p>
                    </div>
                </div>
            @endif

            <div class="p-8 md:p-12">
                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed mb-10">
                    {!! $kegiatan->konten !!}
                </div>

                @if($kegiatan->foto_2 || $kegiatan->foto_3)
                    <div class="border-t border-gray-200 pt-8 mt-8">
                        <h3 class="text-xl font-black text-gray-900 mb-6">Galeri Dokumentasi</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if($kegiatan->foto_2)
                                <img src="{{ asset('storage/'.$kegiatan->foto_2) }}" class="w-full h-64 object-cover rounded-xl shadow-md border border-gray-100 hover:opacity-90 transition">
                            @endif
                            @if($kegiatan->foto_3)
                                <img src="{{ asset('storage/'.$kegiatan->foto_3) }}" class="w-full h-64 object-cover rounded-xl shadow-md border border-gray-100 hover:opacity-90 transition">
                            @endif
                        </div>
                    </div>
                @endif
                
            </div>
        </div>
    </div>

</body>
</html>