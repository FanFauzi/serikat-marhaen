<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tulis Postingan Kegiatan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Judul Kegiatan</label>
                        <input type="text" name="judul" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Deskripsi/Isi Berita</label>
                        <textarea name="konten" rows="5" class="w-full border-gray-300 rounded-md" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Foto Kegiatan</label>
                        <input type="file" name="foto" class="w-full">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Posting Kegiatan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>