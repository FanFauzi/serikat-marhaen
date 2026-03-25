<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-black text-gray-900">Edit Kabar Pergerakan</h2>
                    <a href="{{ route('kegiatan.index') }}" class="text-gray-500 hover:text-red-600 font-bold">&larr; Batal & Kembali</a>
                </div>

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-600 p-4 rounded-r-xl">
                        <ul class="text-sm text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Judul Kegiatan *</label>
                                <input type="text" name="judul" value="{{ old('judul', $kegiatan->judul) }}" required class="w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-200">
                            </div>

                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Isi Berita / Konten *</label>
                                <textarea name="konten" id="editor" rows="10" class="w-full rounded-xl border-gray-300">{!! old('konten', $kegiatan->konten) !!}</textarea>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Tanggal Kegiatan *</label>
                                <input type="date" name="tgl_kegiatan" value="{{ old('tgl_kegiatan', $kegiatan->tgl_kegiatan) }}" required class="w-full rounded-xl border-gray-300">
                            </div>

                            <div>
                                <label class="font-bold text-gray-700 block mb-1">Kategori *</label>
                                <select name="kategori" class="w-full rounded-xl border-gray-300">
                                    <option value="Berita" {{ $kegiatan->kategori == 'Berita' ? 'selected' : '' }}>Berita Umum</option>
                                    <option value="Kaderisasi" {{ $kegiatan->kategori == 'Kaderisasi' ? 'selected' : '' }}>Kaderisasi (PPAB/KTD)</option>
                                    <option value="Aksi" {{ $kegiatan->kategori == 'Aksi' ? 'selected' : '' }}>Aksi Massa</option>
                                    <option value="Opini" {{ $kegiatan->kategori == 'Opini' ? 'selected' : '' }}>Opini Kader</option>
                                </select>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 space-y-4">
                                <h3 class="font-bold text-red-700 mb-2 border-b border-gray-200 pb-2">Ganti Dokumentasi</h3>
                                <p class="text-[10px] text-gray-500 mb-3 leading-tight">Biarkan kosong jika tidak ingin mengganti foto yang sudah ada.</p>
                                
                                <div>
                                    <label class="text-sm font-bold text-gray-600 block mb-1">Foto Utama</label>
                                    @if($kegiatan->foto_1)
                                        <img src="{{ asset('storage/'.$kegiatan->foto_1) }}" class="w-24 h-16 object-cover rounded mb-2 border">
                                    @endif
                                    <input type="file" name="foto_1" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-gray-200 file:text-gray-700 cursor-pointer">
                                </div>
                                
                                <div class="border-t border-gray-200 pt-3">
                                    <label class="text-sm font-bold text-gray-600 block mb-1">Foto Tambahan 1</label>
                                    @if($kegiatan->foto_2)
                                        <img src="{{ asset('storage/'.$kegiatan->foto_2) }}" class="w-24 h-16 object-cover rounded mb-2 border">
                                    @endif
                                    <input type="file" name="foto_2" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-gray-200 file:text-gray-700 cursor-pointer">
                                </div>

                                <div class="border-t border-gray-200 pt-3">
                                    <label class="text-sm font-bold text-gray-600 block mb-1">Foto Tambahan 2</label>
                                    @if($kegiatan->foto_3)
                                        <img src="{{ asset('storage/'.$kegiatan->foto_3) }}" class="w-24 h-16 object-cover rounded mb-2 border">
                                    @endif
                                    <input type="file" name="foto_3" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-gray-200 file:text-gray-700 cursor-pointer">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-gray-900 hover:bg-red-700 text-white font-black py-4 rounded-xl shadow-lg transition-all mt-4">
                                UPDATE KABAR!
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