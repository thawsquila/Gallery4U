@extends('admin.dashboard')

@section('title', 'Edit Tenaga Pendidik')
@section('page-title', 'Edit Tenaga Pendidik')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
  <div class="p-6 border-b">
    <h2 class="text-xl font-semibold text-gray-800">Form Edit Tenaga Pendidik</h2>
  </div>

  <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
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

    <div class="grid md:grid-cols-3 gap-4 items-start">
      <div class="md:col-span-2">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
          <input type="text" name="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="{{ old('nama', $teacher->nama) }}">
        </div>

        <div class="grid md:grid-cols-2 gap-4">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
            <input type="text" name="jabatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('jabatan', $teacher->jabatan) }}">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Bidang</label>
            <input type="text" name="bidang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('bidang', $teacher->bidang) }}">
          </div>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Keahlian (pisahkan dengan koma)</label>
          <input type="text" name="keahlian" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('keahlian', $teacher->keahlian) }}" placeholder="RPL, Pemrograman, TOEFL">
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Bio</label>
          <textarea name="bio" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('bio', $teacher->bio) }}</textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Urutan</label>
            <input type="number" name="urutan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('urutan', $teacher->urutan) }}">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
            <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              <option value="aktif" {{ old('status', $teacher->status)==='aktif' ? 'selected' : '' }}>Aktif</option>
              <option value="tidak_aktif" {{ old('status', $teacher->status)==='tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
          </div>
        </div>
      </div>

      <div class="space-y-3">
        <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
        <div class="h-40 w-32 rounded-lg overflow-hidden bg-gray-100 border flex items-center justify-center">
          @if($teacher->foto)
            <img src="{{ asset('images/teachers/' . $teacher->foto) }}" alt="{{ $teacher->nama }}" class="h-full w-full object-cover"/>
          @else
            <i class="fas fa-user text-gray-400 text-3xl"></i>
          @endif
        </div>
        <input type="file" name="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <p class="text-xs text-gray-500">Kosongkan jika tidak ingin mengganti foto.</p>

        
      </div>
    </div>

    <div class="flex items-center justify-between">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
      <a href="{{ route('admin.teachers') }}" class="text-gray-600 hover:text-gray-800">Kembali</a>
    </div>
  </form>
</div>
@endsection
