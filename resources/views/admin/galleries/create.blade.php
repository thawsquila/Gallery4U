@extends('admin.dashboard')

@section('title', 'Tambah Galeri')

@section('page-title', 'Tambah Galeri')

@section('content')
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('galleryCreateForm');
        const submitButton = document.getElementById('submitBtn');
        
        // Pastikan tombol submit selalu aktif
        submitButton.disabled = false;
        
        // Tambahkan event listener untuk tombol submit
        submitButton.addEventListener('click', function(e) {
            console.log('Submit button clicked');
            
            // Disable the button to prevent double submission
            submitButton.disabled = true;
            submitButton.innerHTML = 'Memproses...';
            
            // Submit form manually
            setTimeout(function() {
                form.submit();
            }, 100);
        });
    });
</script>
@endpush
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6 border-b">
        <h2 class="text-xl font-semibold text-gray-800">Form Tambah Galeri</h2>
    </div>
    
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-6" id="galleryCreateForm">
        @csrf
        
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
            <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul') }}" required>
            <p class="text-gray-500 text-xs mt-1">Masukkan judul untuk galeri ini</p>
        </div>
        
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional)</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi') }}</textarea>
            <p class="text-gray-500 text-xs mt-1">Masukkan deskripsi untuk galeri ini (opsional)</p>
        </div>
        
        <div class="mb-4">
            <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Posisi</label>
            <input type="number" name="position" id="position" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('position', 1) }}" required>
            <p class="text-gray-500 text-xs mt-1">Urutan posisi galeri (angka yang lebih kecil akan ditampilkan lebih dulu)</p>
        </div>
        
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
            <select name="kategori" id="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Pilih Kategori</option>
                <option value="Kegiatan Sekolah" {{ old('kategori') == 'Kegiatan Sekolah' ? 'selected' : '' }}>Kegiatan Sekolah</option>
                <option value="Ekstrakurikuler" {{ old('kategori') == 'Ekstrakurikuler' ? 'selected' : '' }}>Ekstrakurikuler</option>
                <option value="Prestasi" {{ old('kategori') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                <option value="Fasilitas Sekolah" {{ old('kategori') == 'Fasilitas Sekolah' ? 'selected' : '' }}>Fasilitas Sekolah</option>
                <option value="Acara Khusus" {{ old('kategori') == 'Acara Khusus' ? 'selected' : '' }}>Acara Khusus</option>
                <option value="Dokumentasi Guru dan Siswa" {{ old('kategori') == 'Dokumentasi Guru dan Siswa' ? 'selected' : '' }}>Dokumentasi Guru dan Siswa</option>
            </select>
            <p class="text-gray-500 text-xs mt-1">Pilih kategori untuk galeri ini</p>
        </div>
        
        <div class="mb-4">
            <label for="photos" class="block text-gray-700 text-sm font-bold mb-2">Foto-foto</label>
            <div class="border-dashed border-2 border-gray-300 p-4 rounded">
                <input type="file" name="photos[]" id="photos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple required>
                <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, GIF. Maks: 2MB per file. Anda dapat memilih beberapa file sekaligus.</p>
            </div>
        </div>
        
        <div class="mb-4">
            <label for="judul_foto" class="block text-gray-700 text-sm font-bold mb-2">Judul Foto (Opsional)</label>
            <input type="text" name="judul_foto" id="judul_foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul_foto') }}">
            <p class="text-gray-500 text-xs mt-1">Judul ini akan digunakan untuk semua foto yang diupload. Biarkan kosong untuk menggunakan judul default.</p>
        </div>
        
        <div class="flex items-center justify-between">
            <button type="button" id="submitBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
            <a href="{{ route('admin.galleries') }}" class="text-gray-600 hover:text-gray-800">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection