<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-900">Tulis Kabar Pergerakan</h2>
                    <a href="{{ route('kegiatan.index') }}" class="text-gray-500 hover:text-red-600 font-bold">&larr; Batal</a>
                </div>
                
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-600 p-4 rounded-r-xl">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-bold text-red-800">Waduh bray, ada yang salah nih:</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Judul Kegiatan *</label>
                                <input type="text" name="judul" required class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-200" placeholder="Contoh: PPAB GMNI Unimma 2024 Berjalan Sukses">
                            </div>

                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Isi Berita / Konten *</label>
                                <textarea name="konten" id="editor" rows="10" class="w-full rounded-xl border-gray-300"></textarea>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Tanggal Kegiatan *</label>
                                <input type="date" name="tgl_kegiatan" required class="w-full rounded-xl border-gray-300">
                            </div>

                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Kategori *</label>
                                <select name="kategori" class="w-full rounded-xl border-gray-300">
                                    <option value="Berita">Berita Umum</option>
                                    <option value="Kaderisasi">Kaderisasi (PPAB/KTD)</option>
                                    <option value="Aksi">Aksi Massa</option>
                                    <option value="Opini">Opini Kader</option>
                                </select>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 space-y-3">
                                <h3 class="font-bold text-red-700 mb-2 border-b border-gray-200 pb-2">Upload Dokumentasi</h3>
                                
                                <div>
                                    <label class="text-sm font-bold text-gray-600">Foto Utama (Thumbnail) *</label>
                                    <input type="file" name="foto_1" accept="image/*" required class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-red-50 file:text-red-700 mt-1 cursor-pointer">
                                </div>
                                
                                <div>
                                    <label class="text-sm font-bold text-gray-600">Foto Tambahan 1 (Opsional)</label>
                                    <input type="file" name="foto_2" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-gray-200 file:text-gray-700 mt-1 cursor-pointer">
                                </div>

                                <div>
                                    <label class="text-sm font-bold text-gray-600">Foto Tambahan 2 (Opsional)</label>
                                    <input type="file" name="foto_3" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-gray-200 file:text-gray-700 mt-1 cursor-pointer">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-gray-900 hover:bg-red-700 text-white font-black py-4 rounded-xl shadow-lg transition-all mt-4">
                                TERBITKAN KABAR!
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</x-app-layout>