<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Data Anggota</h2>
            <a href="{{ route('anggota.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Anggota
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="p-2">Foto</th>
                                <th class="p-2">Nama</th>
                                <th class="p-2">Prodi</th>
                                <th class="p-2">Status</th>
                                <th class="p-2 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($semua_anggota as $item)
                                <tr class="border-b">
                                    <td class="p-2">
                                        @if ($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}"
                                                class="w-12 h-12 rounded-full object-cover">
                                        @else
                                            <div
                                                class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-xs text-gray-400">
                                                No Pic</div>
                                        @endif
                                    </td>
                                    <td class="p-2 font-semibold">{{ $item->nama }}</td>
                                    <td class="p-2">{{ $item->program_studi }}</td>
                                    <td class="p-2">{{ $item->status }}</td>
                                    <td class="p-2 text-center">
                                        <a href="{{ route('anggota.edit', $item->id) }}"
                                            class="text-blue-500 hover:underline mr-2">Edit</a>

                                        <form action="{{ route('anggota.destroy', $item->id) }}" method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin mau hapus anggota ini bray?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                ...
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
