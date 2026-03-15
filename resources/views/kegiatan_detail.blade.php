<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kegiatan->judul }} - DPK GMNI Unimma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <nav class="bg-red-700 text-white shadow-md py-3 md:py-4">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 flex justify-between items-center">
            <a href="{{ route('beranda') }}" class="font-bold text-sm md:text-lg hover:text-gray-200 transition">← Kembali</a>
            <span class="text-xs sm:text-sm md:text-base font-semibold tracking-wider">GMNI UNIMMA KAMPUS 2</span>
        </div>
    </nav>

    <main class="flex-grow max-w-4xl mx-auto w-full px-4 sm:px-6 py-6 md:py-10">
        <article class="bg-white rounded-xl shadow-lg overflow-hidden">
            @if($kegiatan->foto)
                <img src="{{ asset('storage/'.$kegiatan->foto) }}" alt="{{ $kegiatan->judul }}" class="w-full h-48 sm:h-64 md:h-auto md:max-h-[500px] object-cover">
            @endif

            <div class="p-5 sm:p-8">
                <div class="flex flex-wrap items-center text-xs md:text-sm text-gray-500 mb-3 md:mb-4 gap-2">
                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full font-semibold">Kegiatan</span>
                    <span>{{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d F Y') }}</span>
                </div>

                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 md:mb-6 leading-tight">
                    {{ $kegiatan->judul }}
                </h1>

                <div class="prose prose-sm sm:prose-base md:prose-lg prose-red max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $kegiatan->konten }}
                </div>
            </div>
        </article>

        <div class="mt-8 md:mt-10 border-t border-gray-300 pt-6 md:pt-8 flex items-center">
            <div class="w-10 h-10 md:w-12 md:h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg shrink-0">G</div>
            <div class="ml-3 md:ml-4">
                <p class="font-bold text-gray-900 text-sm md:text-base">DPK GMNI Unimma Kampus 2</p>
                <p class="text-xs md:text-sm text-gray-500">Pejuang Pemikir - Pemikir Pejuang</p>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-6 text-center mt-auto">
        <p class="text-xs md:text-sm">&copy; {{ date('Y') }} DPK GMNI Unimma Kampus 2.</p>
    </footer>

</body>
</html>