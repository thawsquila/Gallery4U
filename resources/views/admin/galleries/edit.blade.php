@extends('admin.dashboard')

@section('title', 'Edit Galeri')

@section('page-title', 'Edit Galeri')

@section('content')
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('galleryEditForm');
        const submitButton = document.getElementById('submitBtn');
        
        // Pastikan tombol submit selalu aktif
        submitButton.disabled = false;
        
        // Tambahkan event listener untuk tombol submit
        submitButton.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent any default action
            console.log('Submit button clicked');
            
            // Disable the button to prevent double submission
            submitButton.disabled = true;
            submitButton.innerHTML = 'Memproses...';
            
            // Log untuk debugging
            console.log('Form method:', form.method);
            console.log('Form action:', form.action);
            
            // Submit form setelah sedikit delay
            setTimeout(function() {
                form.submit();
            }, 100);
        });
    });
</script>
@endpush
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6 border-b">
        <h2 class="text-xl font-semibold text-gray-800">Form Edit Galeri</h2>
    </div>
    
    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="p-6" id="galleryEditForm">
        @csrf
        <!-- Tambahkan field tersembunyi untuk memastikan ini adalah update -->
        <input type="hidden" name="is_update" value="true">
        <!-- Route update menggunakan POST, tidak perlu override method -->
        
        @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Galeri</label>
            <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul', $gallery->judul) }}" required>
            <p class="text-gray-500 text-xs mt-1">Masukkan judul untuk galeri ini</p>
        </div>
        
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>
            <p class="text-gray-500 text-xs mt-1">Masukkan deskripsi untuk galeri ini (opsional)</p>
        </div>
        
        <div class="mb-4">
            <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Posisi</label>
            <input type="number" name="position" id="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('position', $gallery->position) }}" required>
            <p class="text-gray-500 text-xs mt-1">Urutan posisi galeri (angka yang lebih kecil akan ditampilkan lebih dulu)</p>
        </div>
        
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="aktif" {{ old('status', $gallery->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ old('status', $gallery->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            <script>
                // Log status value for debugging
                console.log('Current gallery status:', '{{ $gallery->status }}');
            </script>
        </div>
        
        <div class="mb-4">
            <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
            <select name="kategori" id="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Pilih Kategori</option>
                <option value="Kegiatan Sekolah" {{ old('kategori', $gallery->kategori) == 'Kegiatan Sekolah' ? 'selected' : '' }}>Kegiatan Sekolah</option>
                <option value="Ekstrakurikuler" {{ old('kategori', $gallery->kategori) == 'Ekstrakurikuler' ? 'selected' : '' }}>Ekstrakurikuler</option>
                <option value="Prestasi" {{ old('kategori', $gallery->kategori) == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                <option value="Fasilitas Sekolah" {{ old('kategori', $gallery->kategori) == 'Fasilitas Sekolah' ? 'selected' : '' }}>Fasilitas Sekolah</option>
                <option value="Acara Khusus" {{ old('kategori', $gallery->kategori) == 'Acara Khusus' ? 'selected' : '' }}>Acara Khusus</option>
                <option value="Dokumentasi Guru dan Siswa" {{ old('kategori', $gallery->kategori) == 'Dokumentasi Guru dan Siswa' ? 'selected' : '' }}>Dokumentasi Guru dan Siswa</option>
            </select>
            <p class="text-gray-500 text-xs mt-1">Pilih kategori untuk galeri ini</p>
        </div>
        
        <!-- Existing Photos -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Foto-foto Saat Ini</label>
            
            @if($gallery->fotos->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2">
                @foreach($gallery->fotos as $foto)
                <div class="relative group border rounded-lg overflow-hidden">
                    <img src="{{ asset('images/gallery/' . $foto->file) }}" alt="{{ $foto->judul }}" class="w-full h-32 object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full" onclick="if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) { document.getElementById('deletePhoto-{{ $foto->id }}').submit(); }">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-2 text-sm truncate bg-gray-100">
                        {{ $foto->judul }}
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                Belum ada foto dalam galeri ini.
            </div>
            @endif
        </div>
        
        <!-- Add New Photos -->
        <div class="mb-4">
            <label for="photos" class="block text-gray-700 text-sm font-bold mb-2">Tambah Foto Baru (Opsional)</label>
            <div class="border-dashed border-2 border-gray-300 p-4 rounded">
                <input type="file" name="photos[]" id="photos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, GIF. Maks: 2MB per file. Anda dapat memilih beberapa file sekaligus.</p>
            </div>
        </div>
        
        <div class="mb-4">
            <label for="judul_foto" class="block text-gray-700 text-sm font-bold mb-2">Judul Foto Baru (Opsional)</label>
            <input type="text" name="judul_foto" id="judul_foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul_foto') }}">
            <p class="text-gray-500 text-xs mt-1">Judul ini akan digunakan untuk semua foto baru yang diupload. Biarkan kosong untuk menggunakan judul default.</p>
        </div>
        
        <div class="flex items-center justify-between">
            <button type="button" id="submitBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update
            </button>
            <a href="{{ route('admin.galleries') }}" class="text-gray-600 hover:text-gray-800">
                Kembali
            </a>
        </div>
    </form>
    
    <!-- Hidden delete forms for each photo (placed OUTSIDE the main edit form to avoid nested forms) -->
    @if($gallery->fotos->count() > 0)
        <div class="hidden">
            @foreach($gallery->fotos as $foto)
                <form id="deletePhoto-{{ $foto->id }}" action="{{ route('admin.photos.delete', $foto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </div>
    @endif

    <!-- Likes Section -->
    @if(method_exists($gallery, 'likes'))
    <div class="mt-8 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Pengguna yang Menyukai Galeri</h3>
            <p class="text-sm text-gray-600 mt-1">Total suka: <span class="font-semibold">{{ isset($gallery->likes_count) ? number_format($gallery->likes_count) : number_format($gallery->likes->count() ?? 0) }}</span></p>
        </div>
        <div class="p-6">
            @if(isset($gallery->likes) && $gallery->likes->count() > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach($gallery->likes as $like)
                        <li class="py-3 flex items-center justify-between">
                            <div>
                                <div class="font-medium text-gray-800">{{ $like->user->name ?? 'Pengguna' }}</div>
                                <div class="text-sm text-gray-500">{{ $like->user->email ?? '-' }}</div>
                            </div>
                            <div class="text-xs text-gray-400">{{ $like->created_at?->format('d M Y H:i') }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-gray-600">Belum ada yang menyukai galeri ini.</div>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection