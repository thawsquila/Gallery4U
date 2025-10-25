@extends('admin.dashboard')

@section('title', 'Edit Berita & Event')

@section('page-title', 'Edit Berita & Event')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6 border-b">
        <h2 class="text-xl font-semibold text-gray-800">Form Edit Berita & Event</h2>
    </div>
    
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')
        
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
            <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
            <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul', $post->judul) }}" required>
        </div>
        
        <div class="mb-4">
            <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Pilih Kategori</option>
                <option value="1" {{ old('kategori_id', $post->kategori_id) == 1 ? 'selected' : '' }}>Berita</option>
                <option value="2" {{ old('kategori_id', $post->kategori_id) == 2 ? 'selected' : '' }}>Event</option>
                <option value="3" {{ old('kategori_id', $post->kategori_id) == 3 ? 'selected' : '' }}>Jurusan</option>
            </select>
        </div>
        
        <!-- Field khusus Event -->
        <div id="event-fields" class="mb-4 {{ $post->kategori_id != 2 ? 'hidden' : '' }}">
            <div class="mb-4">
                <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Event</label>
                <input type="date" name="tanggal" id="tanggal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('tanggal', $post->tanggal) }}">
            </div>
            <div class="mb-4">
                <label for="waktu_mulai" class="block text-gray-700 text-sm font-bold mb-2">Waktu Mulai (WIB)</label>
                <input type="time" name="waktu_mulai" id="waktu_mulai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('waktu_mulai', $post->waktu_mulai) }}">
            </div>
            
            <div class="mb-4">
                <label for="lokasi" class="block text-gray-700 text-sm font-bold mb-2">Lokasi Event</label>
                <input type="text" name="lokasi" id="lokasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('lokasi', $post->lokasi) }}">
            </div>
            <div class="mb-4">
                <label for="tiket" class="block text-gray-700 text-sm font-bold mb-2">Tiket</label>
                <input type="text" name="tiket" id="tiket" placeholder="cth: Gratis (Wajib Registrasi)" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('tiket', $post->tiket) }}">
            </div>
            <div class="mb-4">
                <label for="kapasitas" class="block text-gray-700 text-sm font-bold mb-2">Kapasitas Peserta</label>
                <input type="number" name="kapasitas" id="kapasitas" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('kapasitas', $post->kapasitas) }}">
            </div>
        </div>
        
        <div class="mb-4">
            <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Isi Konten</label>
            <textarea name="isi" id="isi" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('isi', $post->isi) }}</textarea>
        </div>
        
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar</label>
            @if($post->gambar)
            <div class="mb-2">
                <img src="{{ asset('images/posts/' . $post->gambar) }}" alt="{{ $post->judul }}" class="h-32 w-auto object-cover rounded">
                <p class="text-sm text-gray-600 mt-1">Gambar saat ini: {{ $post->gambar }}</p>
            </div>
            @endif
            <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, GIF. Maks: 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</p>
        </div>
        
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="aktif" {{ old('status', $post->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak_aktif" {{ old('status', $post->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update
            </button>
            <a href="{{ route('admin.posts') }}" class="text-gray-600 hover:text-gray-800">
                Kembali
            </a>
        </div>
    </form>
</div>

<script>
    // Show/hide event fields based on category selection
    document.addEventListener('DOMContentLoaded', function() {
        const kategoriSelect = document.getElementById('kategori_id');
        const eventFields = document.getElementById('event-fields');
        
        function toggleEventFields() {
            if (kategoriSelect.value === '2') { // Event category
                eventFields.classList.remove('hidden');
            } else {
                eventFields.classList.add('hidden');
            }
        }
        
        // Initial check
        toggleEventFields();
        
        // Listen for changes
        kategoriSelect.addEventListener('change', toggleEventFields);
    });
</script>
@endsection