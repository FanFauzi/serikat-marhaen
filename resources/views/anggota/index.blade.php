<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center pb-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Data Anggota</h2>
            <a href="{{ route('anggota.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Anggota
            </a>
        </div>
        <div
            class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="font-bold text-gray-800">Import Data Instan</h3>
                <p class="text-sm text-gray-500">Upload file data anggota berformat <strong
                        class="text-red-600">.csv</strong></p>
            </div>

            <form action="{{ route('anggota.import') }}" method="POST" enctype="multipart/form-data"
                class="flex items-center gap-2">
                @csrf
                <input type="file" name="file_anggota" accept=".csv" required
                    class="block w-full text-sm text-gray-500
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
            file:bg-red-50 file:text-red-700
            hover:file:bg-red-100 cursor-pointer">

                <button type="submit"
                    class="bg-gray-900 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full text-sm shadow-md transition-colors whitespace-nowrap">
                    Import Sekarang
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-600">
                                <thead class="text-xs text-white uppercase bg-gray-900">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 rounded-tl-lg">Profil Kader</th>
                                        <th scope="col" class="px-6 py-4">Nama Lengkap</th>
                                        <th scope="col" class="px-6 py-4">DPK Asal</th>
                                        <th scope="col" class="px-6 py-4 text-center rounded-tr-lg">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($anggota as $item)
                                        <tr class="bg-white border-b hover:bg-red-50 transition duration-150">
                                            <td class="px-6 py-4">
                                                @if ($item->foto)
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto"
                                                        class="w-12 h-12 rounded-full object-cover border-2 border-red-600 shadow-sm">
                                                @else
                                                    <div
                                                        class="w-12 h-12 rounded-full bg-gray-200 border-2 border-gray-300 flex items-center justify-center text-gray-500 font-bold text-lg shadow-sm">
                                                        {{ strtoupper(substr($item->nama, 0, 1)) }}
                                                    </div>
                                                @endif
                                            </td>

                                            <td class="px-6 py-4 font-bold text-gray-900 text-base">
                                                {{ $item->nama }}
                                            </td>

                                            <td class="px-6 py-4 font-medium text-red-600">
                                                {{ $item->dpk_asal ?? 'DPK GMNI Unimma Kampus 2' }}
                                            </td>

                                            <td class="px-6 py-4 text-center">
                                                <div class="flex justify-center gap-2">
                                                    <a href="{{ route('anggota.show', $item->id) }}"
                                                        class="bg-gray-900 hover:bg-red-600 text-white px-4 py-2 rounded-md text-xs font-bold uppercase tracking-wider transition-colors shadow-sm">
                                                        Lihat Detail
                                                    </a>

                                                    <a href="{{ route('anggota.edit', $item->id) }}"
                                                        class="text-gray-500 hover:text-blue-600 p-2">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                                Belum ada data anggota. Silakan Import atau Tambah manual.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
