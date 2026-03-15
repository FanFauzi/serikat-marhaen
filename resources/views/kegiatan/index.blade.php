<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Post Kegiatan</h2>
            <a href="{{ route('kegiatan.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                + Tulis Kegiatan Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Judul Kegiatan</th>
                            <th class="p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kegiatan as $item)
                            <tr class="border-b">
                                <td class="p-2">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}
                                </td>
                                <td class="p-2 font-semibold">{{ $item->judul }}</td>
                                <td class="p-2 text-center">
                                    <a href="{{ route('kegiatan.edit', $item->id) }}"
                                        class="text-blue-500 hover:underline mr-2">Edit</a>

                                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Yakin mau hapus postingan ini bray?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-500">Belum ada postingan kegiatan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
