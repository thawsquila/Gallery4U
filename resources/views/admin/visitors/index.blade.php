@extends('admin.layout')

@section('title','Pengunjung')

@section('content')
<div class="grid gap-6">
  <div class="glass-effect rounded-2xl p-4">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-3">
      <h2 class="text-lg font-bold text-gray-800">Kunjungan Terbaru</h2>
      <div class="text-xs text-gray-600">Total: {{ number_format($stats['total']) }} • Hari ini: {{ number_format($stats['today']) }} • 7 Hari: {{ number_format($stats['week']) }}</div>
    </div>

    <form method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-2 mb-3">
      <input type="text" name="search" value="{{ $q }}" placeholder="Cari IP / halaman / user agent..." class="sm:col-span-3 px-3 py-1.5 border rounded-md text-xs focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
      <div class="flex items-center gap-2 sm:justify-end">
        <select name="per_page" class="px-2.5 py-1.5 border rounded-md text-xs" onchange="this.form.submit()">
          @foreach([10,20,50,100] as $n)
            <option value="{{ $n }}" @selected($per==$n)>{{ $n }}/hal</option>
          @endforeach
        </select>
        <button class="px-3 py-1.5 bg-blue-600 text-white rounded-md text-xs">Terapkan</button>
      </div>
    </form>

    <div class="overflow-x-auto">
      <table class="min-w-full table-fixed bg-white border rounded-xl overflow-hidden text-xs">
        <colgroup>
          <col class="w-32">
          <col class="w-28">
          <col>
          <col class="w-[28%]">
        </colgroup>
        <thead>
          <tr class="bg-gray-50 text-left text-gray-600 text-[11px]">
            <th class="px-2.5 py-1.5">Waktu</th>
            <th class="px-2.5 py-1.5">IP</th>
            <th class="px-2.5 py-1.5">Halaman</th>
            <th class="px-2.5 py-1.5">User Agent</th>
          </tr>
        </thead>
        <tbody class="divide-y">
          @forelse($visitors as $v)
            <tr class="hover:bg-gray-50 align-top">
              <td class="px-2.5 py-1.5 text-gray-700 whitespace-nowrap">{{ \Carbon\Carbon::parse($v->visit_date)->format('d M Y H:i') }}</td>
              <td class="px-2.5 py-1.5 text-gray-700 font-mono whitespace-nowrap">{{ $v->ip_address }}</td>
              <td class="px-2.5 py-1.5 text-gray-700 truncate" title="{{ $v->page_visited }}">{{ $v->page_visited }}</td>
              <td class="px-2.5 py-1.5 text-gray-500 truncate" title="{{ $v->user_agent }}">
                {{ \Illuminate\Support\Str::limit(preg_replace('/\((.*?)\)/','',$v->user_agent), 40) }}
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="px-2.5 py-4 text-center text-gray-500">Belum ada data kunjungan.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">{{ $visitors->links('pagination::tailwind-compact') }}</div>
  </div>
</div>
@endsection
