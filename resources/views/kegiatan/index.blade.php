<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">Kelola Kabar Pergerakan</h2>
            <a href="{{ route('kegiatan.create') }}"
                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors text-sm">
                + Tulis Kabar Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div
                    class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative shadow-sm">
                    <strong class="font-bold">Mantap Bray!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-white uppercase bg-gray-900">
                            <tr>
                                <th scope="col" class="px-6 py-4 rounded-tl-xl">Thumbnail</th>
                                <th scope="col" class="px-6 py-4">Judul Kabar</th>
                                <th scope="col" class="px-6 py-4">Kategori</th>
                                <th scope="col" class="px-6 py-4">Tanggal</th>
                                <th scope="col" class="px-6 py-4 text-center rounded-tr-xl">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatan as $item)
                                <tr class="bg-white border-b hover:bg-red-50 transition duration-150">
                                    <td class="px-6 py-4">
                                        @if ($item->foto_1)
                                            <img src="{{ asset('storage/' . $item->foto_1) }}" alt="Thumbnail"
                                                class="w-20 h-14 object-cover rounded-md border border-gray-300 shadow-sm">
                                        @else
                                            <div
                                                class="w-20 h-14 bg-gray-200 rounded-md flex items-center justify-center text-xs text-gray-500 border border-gray-300">
                                                No Image</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900 text-base">
                                        {{ $item->judul }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-red-100 text-red-700 font-bold px-3 py-1 rounded-full text-[10px] uppercase tracking-wider">
                                            {{ $item->kategori }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->tgl_kegiatan)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('kegiatan.show', $item->id) }}"
                                                class="bg-gray-900 hover:bg-red-600 text-white px-3 py-2 rounded-md text-xs font-bold uppercase transition-colors shadow-sm">Baca</a>
                                            <a href="{{ route('kegiatan.edit', $item->id) }}"
                                                class="bg-gray-100 border border-gray-300 hover:bg-yellow-100 text-yellow-700 px-3 py-2 rounded-md text-xs font-bold uppercase transition-colors shadow-sm">Edit</a>
                                            <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin mau hapus berita ini bray?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="bg-white border border-gray-300 text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-xs font-bold uppercase transition-colors shadow-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                        Belum ada kabar pergerakan yang ditulis. Ayo buat sejarah bray!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
