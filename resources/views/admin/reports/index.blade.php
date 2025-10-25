@extends('admin.layout')

@section('title', 'Laporan Website')

@push('styles')
<style>
  .card { border: 1px solid rgba(203,213,225,.5); }
</style>
@endpush

@section('content')
<div class="mb-6 flex items-center justify-between">
  <div class="flex gap-2">
    <a href="{{ route('admin.reports.print', request()->query()) }}" target="_blank" class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium shadow hover:opacity-95 transition">
      <i class="fas fa-print mr-2"></i> Cetak
    </a>
    <a href="{{ route('admin.reports.pdf', request()->query()) }}" class="px-4 py-2 rounded-lg bg-white ring-1 ring-gray-300 text-gray-800 font-medium shadow hover:bg-gray-50 transition">
      <i class="fas fa-file-pdf mr-2 text-red-500"></i> PDF
    </a>
  </div>
</div>

<form method="get" class="glass-effect rounded-2xl p-4 mb-6">
  <div class="grid md:grid-cols-3 gap-4 items-end">
    <div>
      <label class="block text-sm text-gray-600 mb-1">Dari Tanggal</label>
      <input type="date" name="from" value="{{ $fromDate }}" class="w-full rounded-lg border-gray-300">
    </div>
    <div>
      <label class="block text-sm text-gray-600 mb-1">Sampai Tanggal</label>
      <input type="date" name="to" value="{{ $toDate }}" class="w-full rounded-lg border-gray-300">
    </div>
    <div>
      <button class="w-full md:w-auto px-4 py-2 rounded-lg bg-blue-600 text-white font-medium shadow hover:bg-blue-700 transition">Terapkan</button>
    </div>
  </div>
</form>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
  <div class="glass-effect rounded-2xl p-6 card">
    <div class="text-sm text-gray-500">Total Berita & Event</div>
    <div class="text-2xl font-bold">{{ $totalPosts }}</div>
  </div>
  <div class="glass-effect rounded-2xl p-6 card">
    <div class="text-sm text-gray-500">Total Galeri</div>
    <div class="text-2xl font-bold">{{ $totalGalleries }}</div>
  </div>
  <div class="glass-effect rounded-2xl p-6 card">
    <div class="text-sm text-gray-500">Total Foto</div>
    <div class="text-2xl font-bold">{{ $totalPhotos }}</div>
  </div>
  <div class="glass-effect rounded-2xl p-6 card">
    <div class="text-sm text-gray-500">Total Kunjungan (Periode)</div>
    <div class="text-2xl font-bold">{{ $totalVisitorsRange }}</div>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <div class="bg-white rounded-2xl p-6 card">
    <h3 class="text-lg font-semibold mb-4">Halaman Terpopuler (Top 5)</h3>
    <div class="space-y-3">
      @forelse($mostVisitedPages as $page)
        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
          <div>
            <div class="font-medium text-gray-800">{{ $page->page_name }}</div>
            <div class="text-xs text-gray-500">{{ $page->page_visited }}</div>
          </div>
          <div class="text-sm px-3 py-1 rounded-full bg-blue-100 text-blue-700">{{ $page->total }} kunjungan</div>
        </div>
      @empty
        <p class="text-sm text-gray-500">Belum ada data</p>
      @endforelse
    </div>
  </div>
  <div class="bg-white rounded-2xl p-6 card">
    <h3 class="text-lg font-semibold mb-4">Konten Terpopuler (Top 5)</h3>
    <div class="space-y-3">
      @forelse($mostViewedPosts as $post)
        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
          <div>
            <div class="font-medium text-gray-800">{{ $post->judul }}</div>
            <div class="text-xs text-gray-500">{{ $post->kategori_id == 1 ? 'Berita' : 'Event' }} • {{ $post->created_at->format('d M Y') }}</div>
          </div>
          <div class="text-sm px-3 py-1 rounded-full bg-orange-100 text-orange-700">{{ number_format($post->views) }} views</div>
        </div>
      @empty
        <p class="text-sm text-gray-500">Belum ada data</p>
      @endforelse
    </div>
  </div>
</div>

<div class="mt-6 bg-white rounded-2xl p-6 card">
  <div class="flex items-center justify-between mb-3">
    <h3 class="text-lg font-semibold">Tren Kunjungan ({{ $fromDate }} — {{ $toDate }})</h3>
    <form method="get" class="flex items-center gap-2">
      <input type="hidden" name="from" value="{{ $fromDate }}">
      <input type="hidden" name="to" value="{{ $toDate }}">
      <label class="text-sm text-gray-600">Per halaman:</label>
      <select name="per_page" class="px-2 py-1.5 border rounded-md text-sm" onchange="this.form.submit()">
        @foreach([15,30,60,100] as $n)
          <option value="{{ $n }}" @selected(($perPage ?? 30)==$n)>{{ $n }}</option>
        @endforeach
      </select>
    </form>
  </div>
  <div class="overflow-x-auto">
    <table class="min-w-full text-sm">
      <thead>
        <tr class="text-left text-gray-600 border-b">
          <th class="py-2 pr-4">Tanggal</th>
          <th class="py-2">Kunjungan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($visitorChart as $row)
          <tr class="border-b">
            <td class="py-2 pr-4">{{ \Carbon\Carbon::parse($row['date'])->format('d M Y') }}</td>
            <td class="py-2">{{ $row['count'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-3">{{ $visitorChart->links('pagination::tailwind-compact') }}</div>
</div>
@endsection
