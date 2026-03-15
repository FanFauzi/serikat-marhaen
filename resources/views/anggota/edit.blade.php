<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Anggota: {{ $anggota->nama }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block font-bold mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $anggota->nama }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ $anggota->program_studi }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Status</label>
                        <select name="status" class="w-full border-gray-300 rounded-md">
                            <option value="Calon Anggota" {{ $anggota->status == 'Calon Anggota' ? 'selected' : '' }}>Calon Anggota</option>
                            <option value="Anggota Muda" {{ $anggota->status == 'Anggota Muda' ? 'selected' : '' }}>Anggota Muda</option>
                            <option value="Anggota Biasa" {{ $anggota->status == 'Anggota Biasa' ? 'selected' : '' }}>Anggota Biasa</option>
                            <option value="Pengurus" {{ $anggota->status == 'Pengurus' ? 'selected' : '' }}>Pengurus</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Foto (Kosongkan jika tidak diganti)</label>
                        @if($anggota->foto)
                            <img src="{{ asset('storage/'.$anggota->foto) }}" class="w-20 mb-2 rounded">
                        @endif
                        <input type="file" name="foto" class="w-full">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>