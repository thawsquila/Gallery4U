@extends('admin.layout')

@section('title', 'Tambah Tenaga Pendidik')
@section('page-title', 'Tambah Tenaga Pendidik')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
  <div class="p-6 border-b">
    <h2 class="text-xl font-semibold text-gray-800">Form Tenaga Pendidik</h2>
  </div>

  <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
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
      <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
      <input type="text" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="{{ old('nama') }}">
    </div>

    <div class="grid md:grid-cols-2 gap-4">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
        <input type="text" name="jabatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('jabatan') }}">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Bidang</label>
        <input type="text" name="bidang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('bidang') }}">
      </div>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Keahlian (pisahkan dengan koma)</label>
      <input type="text" name="keahlian" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('keahlian') }}" placeholder="RPL, Pemrograman, TOEFL">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Bio</label>
      <textarea name="bio" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('bio') }}</textarea>
    </div>

    <div class="grid md:grid-cols-1 gap-4">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
        <input type="file" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <p class="text-gray-500 text-xs mt-1">Direkomendasikan rasio 3:4. Akan disimpan di public/images/teachers</p>
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Urutan</label>
        <input type="number" name="urutan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('urutan', 0) }}">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
        <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          <option value="aktif" {{ old('status')==='aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="tidak_aktif" {{ old('status')==='tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
      </div>
    </div>

    <div class="flex items-center justify-between">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
      <a href="{{ route('admin.teachers') }}" class="text-gray-600 hover:text-gray-800">Kembali</a>
    </div>
  </form>
</div>
@endsection
