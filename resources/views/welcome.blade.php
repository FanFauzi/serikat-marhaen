<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPK GMNI Unimma Kampus 2 | Pejuang Pemikir - Pemikir Pejuang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-hero {
            background-image: url('{{ asset('images/hero.jpeg') }}');
            background-size: cover;
            background-position: top center;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased selection:bg-red-600 selection:text-white">

    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-200 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white font-black text-xl shadow-lg transform hover:rotate-12 transition">
                        G</div>
                    <div class="font-extrabold text-xl tracking-tight text-gray-900 leading-none">
                        GMNI<br><span class="text-red-600 text-sm">UNIMMA KAMPUS 2</span>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8 font-semibold text-gray-600">
                    <a href="#beranda" class="hover:text-red-600 transition">Beranda</a>
                    <a href="#nilai" class="hover:text-red-600 transition">Nilai Perjuangan</a>
                    <a href="#inspirasi" class="hover:text-red-600 transition">Sang Proklamator</a>
                    <a href="#kegiatan" class="hover:text-red-600 transition">Kabar Pergerakan</a>
                </div>
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-gray-900 hover:bg-red-600 text-white px-5 py-2.5 rounded-full font-bold text-sm shadow-md transition-all duration-300 transform hover:-translate-y-1">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-gray-500 hover:text-red-600 font-semibold px-3 text-sm transition">Login Admin</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <section id="beranda"
        class="relative pt-20 pb-32 lg:pt-48 lg:pb-64 bg-hero flex items-center justify-center min-h-screen">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-red-900/70"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-red-600/20 border border-red-500 text-red-100 font-semibold text-sm mb-6 animate-pulse">
                Merdeka! GMNI Jaya! Marhaen Menang!
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white mb-6 leading-tight drop-shadow-xl">
                Warisi Apinya,<br>Jangan Warisi <span class="text-red-500">Abunya.</span>
            </h1>
            <p class="text-lg md:text-2xl text-gray-300 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
                Menyatukan pikiran dan tindakan. Bersama DPK GMNI Unimma Kampus 2, mari wujudkan tatanan masyarakat yang
                berkeadilan sosial berlandaskan ajaran Marhaenisme.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#kegiatan"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-8 rounded-full shadow-lg shadow-red-600/30 transition-all duration-300 transform hover:-translate-y-1 hover:scale-105">
                    Lihat Pergerakan Kami
                </a>
                <a href="https://www.instagram.com/serikat_marhaen/?hl=en" target="_blank"
                    class="bg-white/10 hover:bg-white text-white hover:text-gray-900 border border-white/30 backdrop-blur-sm font-bold py-4 px-8 rounded-full transition-all duration-300">
                    Sapa Kami di Instagram
                </a>
            </div>
        </div>
    </section>

    <section id="nilai"
        class="py-20 bg-white relative -mt-10 rounded-t-3xl shadow-[0_-10px_40px_rgba(0,0,0,0.1)] z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">Trisakti Bung Karno</h2>
                <div class="w-24 h-1.5 bg-red-600 mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto font-medium">Tiga pilar utama perjuangan revolusi
                    Indonesia untuk mewujudkan masyarakat sosialisme Indonesia.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="group bg-gray-50 rounded-2xl p-8 hover:bg-red-600 transition-colors duration-300 shadow-sm hover:shadow-2xl border border-gray-100">
                    <div
                        class="w-16 h-16 bg-red-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-8 h-8 text-red-600 group-hover:text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 group-hover:text-white mb-3 transition leading-tight">
                        Berdaulat secara Politik</h3>
                    <p class="text-gray-600 group-hover:text-red-50 transition leading-relaxed">Bangsa Indonesia harus
                        mampu menentukan nasibnya sendiri, bebas dari intervensi, imperialisme, dan neokolonialisme
                        bangsa asing.</p>
                </div>

                <div
                    class="group bg-gray-50 rounded-2xl p-8 hover:bg-red-600 transition-colors duration-300 shadow-sm hover:shadow-2xl border border-gray-100">
                    <div
                        class="w-16 h-16 bg-red-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-8 h-8 text-red-600 group-hover:text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 group-hover:text-white mb-3 transition leading-tight">
                        Berdikari secara Ekonomi</h3>
                    <p class="text-gray-600 group-hover:text-red-50 transition leading-relaxed">Membangun kemandirian
                        ekonomi nasional yang menyejahterakan kaum Marhaen, berdiri di atas kaki sendiri tanpa
                        bergantung pada kapitalisme global.</p>
                </div>

                <div
                    class="group bg-gray-50 rounded-2xl p-8 hover:bg-gray-900 transition-colors duration-300 shadow-sm hover:shadow-2xl border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gray-200 group-hover:bg-red-600 rounded-xl flex items-center justify-center mb-6 transition">
                        <svg class="w-8 h-8 text-gray-700 group-hover:text-white" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.514M11 4v.01M12 4v.01">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 group-hover:text-white mb-3 transition leading-tight">
                        Berkepribadian dalam Kebudayaan</h3>
                    <p class="text-gray-600 group-hover:text-gray-300 transition leading-relaxed">Merawat dan bangga
                        terhadap identitas Nusantara serta asas gotong royong, agar tidak luntur oleh hegemoni
                        imperialisme kebudayaan asing.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="inspirasi" class="py-24 bg-gray-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-red-900/10"></div>
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-red-600/20 rounded-full blur-3xl"></div>
        <div class="absolute -left-20 -bottom-20 w-72 h-72 bg-gray-700/40 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-20">
                <div class="w-full md:w-5/12">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-red-600 translate-x-4 translate-y-4 rounded-2xl transition-transform group-hover:translate-x-6 group-hover:translate-y-6">
                        </div>
                        <img src="{{ asset('images/bung-karno.jpeg') }}" alt="Bung Karno"
                            class="relative z-10 w-full rounded-2xl shadow-2xl grayscale group-hover:grayscale-0 transition duration-700 object-cover border-4 border-gray-900">
                    </div>
                </div>
                <div class="w-full md:w-7/12">
                    <svg class="w-16 h-16 text-red-600 mb-6 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                    </svg>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-black leading-tight mb-8 text-gray-100">
                        "Beri aku 1.000 orang tua, niscaya akan kucabut semeru dari akarnya. <span
                            class="text-red-500">Beri aku 10 pemuda niscaya akan kuguncangkan dunia."</span>
                    </h2>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-1 bg-red-600 rounded-full"></div>
                        <div>
                            <p class="text-xl text-red-400 font-bold tracking-widest uppercase">Ir. Soekarno</p>
                            <p class="text-gray-400 font-medium">Bapak Bangsa & Penggagas Marhaenisme</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kegiatan" class="py-24 bg-gray-100 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-2">Kabar Pergerakan</h2>
                    <p class="text-gray-500">Rekam jejak perjuangan kawan-kawan GMNI Unimma.</p>
                </div>
                <div class="hidden md:block w-32 h-1.5 rounded-full bg-red-600"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($kegiatan_terbaru as $item)
                    <a href="{{ route('kegiatan.baca', $item->slug) }}"
                        class="group bg-white rounded-2xl shadow-md overflow-hidden flex flex-col transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="relative overflow-hidden">
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                    class="w-full h-56 object-cover transform group-hover:scale-110 transition duration-500">
                            @else
                                <div
                                    class="w-full h-56 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-gray-500">
                                    Dokumentasi</div>
                            @endif
                            <div
                                class="absolute top-4 right-4 bg-white/90 backdrop-blur text-red-700 font-bold text-sm px-3 py-1 rounded-full shadow">
                                {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3
                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-red-600 transition-colors">
                                {{ $item->judul }}</h3>
                            <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed text-sm">
                                {{ Str::limit($item->konten, 120) }}
                            </p>
                            <div
                                class="mt-auto flex items-center text-red-600 font-bold text-sm uppercase tracking-wider group-hover:translate-x-2 transition-transform">
                                Baca Selengkapnya <span class="ml-2">&rarr;</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 bg-white p-12 text-center rounded-2xl shadow-sm border border-gray-200">
                        <div
                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Kabar</h3>
                        <p class="text-gray-500">Kawan-kawan admin belum mencatat kegiatan baru.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white border-t-4 border-red-600 relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-red-600/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-center md:text-left">
                    <div class="font-extrabold text-2xl tracking-tight mb-2">GMNI UNIMMA KAMPUS 2</div>
                    <p class="text-gray-400 text-sm">Merdeka! GMNI Jaya! Marhaen Menang!</p>
                </div>
                <div class="flex gap-4">
                    <a href="https://www.instagram.com/serikat_marhaen/?hl=en" target="_blank"
                        class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-full flex items-center justify-center transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-500 text-sm border-t border-gray-800 pt-8">
                &copy; {{ date('Y') }} DPK GMNI Unimma Kampus 2. Semua Hak Dilindungi.
            </div>
        </div>
    </footer>

</body>

</html>
