<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Postingan: {{ $kegiatan->judul }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Judul Kegiatan</label>
                        <input type="text" name="judul" value="{{ $kegiatan->judul }}" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" value="{{ $kegiatan->tanggal_kegiatan }}" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Deskripsi/Isi Berita</label>
                        <textarea name="konten" rows="5" class="w-full border-gray-300 rounded-md" required>{{ $kegiatan->konten }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Foto Kegiatan (Kosongkan jika tidak diganti)</label>
                        @if($kegiatan->foto)
                            <img src="{{ asset('storage/'.$kegiatan->foto) }}" class="w-32 mb-2 rounded">
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