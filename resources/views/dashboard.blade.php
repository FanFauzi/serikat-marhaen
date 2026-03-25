<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight">
            {{ __('Pusat Komando') }}
        </h2>
    </x-slot>

    @php
        $total_kader = \App\Models\Anggota::count();
        $total_kabar = \App\Models\Kegiatan::count();
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-gradient-to-r from-red-700 to-red-600 rounded-3xl shadow-xl overflow-hidden relative">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="absolute -right-10 -top-24 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>

                <div class="p-8 md:p-10 relative z-10 flex items-center justify-between">
                    <div class="text-white">
                        <h3 class="text-3xl md:text-4xl font-black mb-2 drop-shadow-md">Merdeka,
                            {{ Auth::user()['name'] }}! ✊</h3>
                        <p class="text-red-100 text-lg md:text-xl font-medium">Selamat datang di Dashboard Admin DPK
                            GMNI Unimma Kampus 2.</p>
                    </div>
                    <div class="hidden md:flex">
                        <div
                            class="w-24 h-24 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-5xl font-black text-white border-4 border-white/30 shadow-2xl transform rotate-12">
                            G
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <a href="{{ route('anggota.index') }}"
                    class="group bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:border-red-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center group-hover:bg-red-600 group-hover:text-white transition-colors duration-300 shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4
                                    class="text-2xl font-black text-gray-900 mb-1 group-hover:text-red-600 transition-colors">
                                    Buku Induk</h4>
                                <p class="text-gray-500 text-sm font-medium">Kelola database kader & anggota.</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span
                                class="text-4xl font-black text-gray-200 group-hover:text-red-100 transition-colors">{{ $total_kader }}</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('kegiatan.index') }}"
                    class="group bg-white p-8 rounded-3xl shadow-sm border border-gray-100 hover:shadow-2xl hover:border-red-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center group-hover:bg-red-600 group-hover:text-white transition-colors duration-300 shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4
                                    class="text-2xl font-black text-gray-900 mb-1 group-hover:text-red-600 transition-colors">
                                    Kabar Berita</h4>
                                <p class="text-gray-500 text-sm font-medium">Tulis jejak pergerakan terbaru.</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span
                                class="text-4xl font-black text-gray-200 group-hover:text-red-100 transition-colors">{{ $total_kabar }}</span>
                        </div>
                    </div>
                </a>

                <a href="{{ url('/') }}" target="_blank"
                    class="group bg-gray-900 p-8 rounded-3xl shadow-md border border-gray-800 hover:shadow-2xl hover:bg-black transition-all duration-300 md:col-span-2 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 bg-gray-800 text-white rounded-2xl flex items-center justify-center border border-gray-700 shadow-inner group-hover:border-red-500 transition-colors">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-2xl font-black text-white mb-1">Lihat Halaman Depan</h4>
                                <p class="text-gray-400 text-sm font-medium">Cek tampilan *Landing Page* yang dilihat
                                    oleh masyarakat luas.</p>
                            </div>
                        </div>
                        <div
                            class="hidden sm:flex w-12 h-12 rounded-full bg-gray-800 items-center justify-center text-gray-400 group-hover:text-red-500 group-hover:bg-gray-900 transition-all border border-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
