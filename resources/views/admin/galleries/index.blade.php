@extends('admin.layout')

@section('title', 'Kelola Galeri')

@section('content')
<div class="animate-fade-in-up text-sm">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4 mb-6">
        <!-- Total Galleries Card -->
        <div class="glass-effect rounded-xl p-4 shadow-md transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-2 rounded-lg bg-purple-100 text-purple-600 mr-3">
                    <i class="fas fa-images text-lg"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Total Galeri</p>
                    <h3 class="text-xl font-bold text-gray-900">{{ $totalGalleries ?? $galleries->total() }}</h3>
                </div>
            </div>
        </div>

        <!-- Active Galleries Card -->
        <div class="glass-effect rounded-xl p-4 shadow-md transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-2 rounded-lg bg-green-100 text-green-600 mr-3">
                    <i class="fas fa-check-circle text-lg"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Galeri Aktif</p>
                    <h3 class="text-xl font-bold text-gray-900">{{ $activeGalleries ?? $galleries->where('status', 'aktif')->count() }}</h3>
                </div>
            </div>
        </div>

        <!-- Inactive Galleries Card -->
        <div class="glass-effect rounded-xl p-4 shadow-md transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-2 rounded-lg bg-red-100 text-red-600 mr-3">
                    <i class="fas fa-times-circle text-lg"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Galeri Tidak Aktif</p>
                    <h3 class="text-xl font-bold text-gray-900">{{ $inactiveGalleries ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Photos Card -->
        <div class="glass-effect rounded-xl p-4 shadow-md transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-2 rounded-lg bg-blue-100 text-blue-600 mr-3">
                    <i class="fas fa-camera text-lg"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Total Foto</p>
                    <h3 class="text-xl font-bold text-gray-900">{{ $galleries->sum(function($gallery) { return $gallery->fotos ? $gallery->fotos->count() : 0; }) }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Likes Card -->
        <div class="glass-effect rounded-xl p-4 shadow-md transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-2 rounded-lg bg-red-100 text-red-600 mr-3">
                    <i class="fas fa-heart text-lg"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Total Suka</p>
                    <h3 class="text-xl font-bold text-gray-900">{{ number_format($totalLikes ?? 0) }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Views Card -->
        <div class="glass-effect rounded-xl p-4 shadow-md transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-2 rounded-lg bg-orange-100 text-orange-600 mr-3">
                    <i class="fas fa-eye text-lg"></i>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Total Views</p>
                    <h3 class="text-xl font-bold text-gray-900">{{ number_format($totalViews ?? 0) }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Main Content -->
    <div class="glass-effect rounded-xl shadow-md overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 flex items-center">
                        <div class="p-1.5 rounded-md bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-2">
                            <i class="fas fa-images"></i>
                        </div>
                        Daftar Galeri
                    </h3>
                    <p class="text-xs text-gray-600 mt-1">Kelola semua galeri foto dan album di sini</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                    <div class="relative">
                        <input type="text" id="search" placeholder="Cari galeri..." 
                            class="pl-8 pr-3 py-1.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 w-full md:w-56">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-xs"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.galleries.create') }}" 
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-4 py-2 rounded-lg transition-all duration-300 flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-sm">
                        <i class="fas fa-plus mr-1"></i>
                        Tambah Baru
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Filter Tabs (match posts style: only status filters) -->
        <div class="px-4 pt-2 pb-0 border-b border-gray-200">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex space-x-2 overflow-x-auto pb-2">
                    <a href="{{ route('admin.galleries') }}" class="filter-btn px-3 py-1.5 text-xs font-medium rounded-md transition-colors {{ !request('status') ? 'text-blue-600 bg-blue-100' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50' }}">
                        <i class="fas fa-list mr-1"></i>
                        Semua
                    </a>
                    <!-- Category filter (before Aktif/Tidak Aktif) -->
                    <div class="relative inline-flex items-center">
                        <i class="fas fa-tag text-indigo-500 mr-2 text-xs"></i>
                        <select id="categoryFilter" class="text-xs border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                            <option value="">Semua Kategori</option>
                            @foreach(($galleryCategories ?? []) as $cat)
                                <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="{{ route('admin.galleries', array_merge(request()->query(), ['status' => 'aktif'])) }}" class="filter-btn px-3 py-1.5 text-xs font-medium rounded-md transition-colors {{ request('status') === 'aktif' ? 'text-green-600 bg-green-100' : 'text-gray-600 hover:text-green-600 hover:bg-green-50' }}">
                        <i class="fas fa-check-circle mr-1"></i>
                        Aktif
                    </a>
                    <a href="{{ route('admin.galleries', array_merge(request()->query(), ['status' => 'tidak_aktif'])) }}" class="filter-btn px-3 py-1.5 text-xs font-medium rounded-md transition-colors {{ request('status') === 'tidak_aktif' ? 'text-red-600 bg-red-100' : 'text-gray-600 hover:text-red-600 hover:bg-red-50' }}">
                        <i class="fas fa-times-circle mr-1"></i>
                        Tidak Aktif
                    </a>
                </div>
            </div>
        </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full table-fixed text-xs">
            <colgroup>
                <col class="w-8">
                <col class="w-72">
                <col class="w-20">
                <col class="w-20">
                <col class="w-24">
                <col class="w-24">
                <col class="w-20">
            </colgroup>
            <thead>
                <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200 text-[11px] text-gray-600">
                    <th class="px-3 py-2 text-left">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        </div>
                    </th>
                    <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-images mr-2 text-purple-500 text-xs"></i>
                            Galeri
                        </div>
                    </th>
                    <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-toggle-on mr-2 text-orange-500 text-xs"></i>
                            Status
                        </div>
                    </th>
                    <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-camera mr-2 text-indigo-500 text-xs"></i>
                            Jumlah Foto
                        </div>
                    </th>
                    <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-2 text-red-500 text-xs"></i>
                            Tanggal
                        </div>
                    </th>
                    <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-heart mr-2 text-pink-500 text-xs"></i>
                            Interaksi
                        </div>
                    </th>
                    <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                        <div class="flex items-center">
                            <i class="fas fa-cogs mr-2 text-gray-500 text-xs"></i>
                            Aksi
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($galleries as $gallery)
                <tr class="hover:bg-gray-50 transition-colors align-top" data-category="{{ $gallery->kategori }}">
                    <td class="px-3 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <input type="checkbox" class="row-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                                @if($gallery->fotos && $gallery->fotos->isNotEmpty())
                                    <img class="h-full w-full object-cover transition-transform duration-300 hover:scale-110" src="{{ asset('images/gallery/' . $gallery->fotos->first()->file) }}" alt="{{ $gallery->judul }}">
                                @else
                                    <div class="h-full w-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                        <i class="fas fa-image text-xl text-gray-400"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="ml-3 min-w-0">
                                @php
                                    $words = preg_split('/\s+/', trim($gallery->judul));
                                @endphp
                                <div class="font-semibold text-gray-900 truncate">
                                    {{ implode(' ', array_slice($words, 0, 2)) }}@if(count($words) > 2)...@endif
                                </div>
                                <div class="text-[11px] text-gray-500 flex items-center mt-0.5 truncate">
                                    <i class="fas fa-tag mr-1"></i>
                                    {{ $gallery->kategori }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        @if($gallery->status === 'aktif')
                            <span class="px-2 py-0.5 inline-flex items-center text-[11px] font-medium rounded-full bg-green-100 text-green-800">
                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Aktif
                            </span>
                        @else
                            <span class="px-2 py-0.5 inline-flex items-center text-[11px] font-medium rounded-full bg-red-100 text-red-800">
                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-red-400" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Tidak Aktif
                            </span>
                        @endif
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex -space-x-2 mr-2">
                                @if($gallery->fotos && $gallery->fotos->isNotEmpty())
                                    @foreach($gallery->fotos->take(3) as $foto)
                                        <div class="h-5 w-5 rounded-full border-2 border-white overflow-hidden shadow-sm">
                                            <img src="{{ asset('images/gallery/' . $foto->file) }}" alt="" class="h-full w-full object-cover">
                                        </div>
                                    @endforeach
                                    @if($gallery->fotos->count() > 3)
                                        <div class="h-5 w-5 rounded-full border-2 border-white bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center text-[10px] font-bold text-white shadow-sm">
                                            +{{ $gallery->fotos->count() - 3 }}
                                        </div>
                                    @endif
                                @else
                                    <div class="h-5 w-5 rounded-full border-2 border-gray-200 bg-gray-100 flex items-center justify-center">
                                        <i class="fas fa-image text-[9px] text-gray-400"></i>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">{{ $gallery->fotos ? $gallery->fotos->count() : 0 }}</div>
                                <div class="text-[11px] text-gray-500">foto</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-gray-600">
                        <div class="font-medium">{{ $gallery->created_at->format('d M Y') }}</div>
                        <div class="text-[11px] text-gray-400">{{ $gallery->created_at->diffForHumans(\Carbon\Carbon::now(), true) }} yang lalu</div>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        @php
                            $likesCount = isset($gallery->likes_count) ? $gallery->likes_count : (isset($gallery->likes) ? $gallery->likes->count() : 0);
                            $commentsCount = isset($gallery->comments_count) ? $gallery->comments_count : 0;
                        @endphp
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center text-gray-700" title="Suka">
                                <i class="fas fa-heart text-red-500 mr-1"></i>{{ number_format($likesCount) }}
                            </span>
                            <span class="inline-flex items-center text-gray-700" title="Komentar">
                                <i class="far fa-comment text-gray-500 mr-1"></i>{{ number_format($commentsCount) }}
                            </span>
                            <span class="inline-flex items-center text-gray-700" title="Views">
                                <i class="fas fa-eye text-blue-500 mr-1"></i>{{ number_format($gallery->views ?? 0) }}
                            </span>
                            @if(!empty($likesCount))
                                <a href="{{ route('admin.galleries.likes', $gallery->id) }}" class="text-[11px] px-2 py-0.5 rounded bg-pink-50 text-pink-600 hover:bg-pink-100 ring-1 ring-pink-200 transition-colors">
                                    Lihat yang suka
                                </a>
                            @endif
                        </div>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap text-right font-medium">
                        <div class="flex items-center justify-end space-x-1.5">
                            <a href="{{ route('guest.detail-galeri', $gallery->id) }}" 
                               target="_blank" 
                               class="inline-flex items-center justify-center w-7 h-7 bg-green-100 text-green-700 rounded-md hover:bg-green-200" title="Lihat di Website">
                                <i class="fas fa-eye text-xs"></i>
                            </a>
                            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" 
                               class="inline-flex items-center justify-center w-7 h-7 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200" title="Edit">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <button type="button" 
                                    onclick="confirmDelete('{{ $gallery->id }}', '{{ addslashes($gallery->judul) }}')" 
                                    class="inline-flex items-center justify-center w-7 h-7 bg-red-100 text-red-700 rounded-md hover:bg-red-200" title="Hapus">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-20 text-center">
                        <div class="mx-auto w-20 h-20 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center mb-6 shadow-lg">
                            <i class="fas fa-images text-blue-500 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Belum ada galeri</h3>
                        <p class="text-gray-500 mb-6 max-w-sm mx-auto">Mulai dengan membuat galeri foto pertama untuk menampilkan koleksi gambar yang menarik.</p>
                        <a href="{{ route('admin.galleries.create') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <i class="fas fa-plus mr-2"></i>
                            Buat Galeri Baru
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if($galleries->count())
    <div class="px-6 py-4 border-t border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-b-2xl">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <div class="text-sm text-gray-600 mb-4 sm:mb-0">
                Menampilkan <span class="font-medium">{{ $galleries->firstItem() }}</span> - <span class="font-medium">{{ $galleries->lastItem() }}</span> dari <span class="font-medium">{{ $galleries->total() }}</span> data
            </div>
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                <div class="flex items-center">
                    <span class="text-sm text-gray-600 mr-2">Tampilkan:</span>
                    <select id="perPageGalleries" class="text-sm border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div class="bg-white px-3 py-1.5 rounded-lg shadow-sm border border-gray-200 no-summary">
                    {{ $galleries->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <i class="fas fa-trash text-red-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Hapus Galeri</h3>
            <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus galeri <span id="galleryTitle" class="font-semibold"></span>? <strong>Semua foto yang terkait juga akan dihapus. Aksi ini tidak dapat dibatalkan.</strong></p>
            <div class="flex justify-center space-x-3">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </button>
                <form id="deleteForm" method="POST" action="" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
  /* Hide the default Laravel Tailwind pagination summary text */
  /* Laravel Tailwind pagination structure wraps summary inside nested divs.
     Hide any <p> inside the pagination nav to remove the "Showing X to Y of Z results" text. */
  .no-summary nav[role="navigation"] p { display: none !important; }
  /* Fallback: hide the first info div in the sm:flex wrapper if present */
  .no-summary nav[role="navigation"] .sm\:flex-1 > div:first-child { display: none !important; }
  /* Hide the pagination buttons as requested */
  .no-summary nav[role="navigation"] ul,
  .no-summary nav[role="navigation"] .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between,
  .no-summary nav[role="navigation"] { display: none !important; }
  /* Ensure the page buttons align nicely */
  .no-summary nav[role="navigation"] { display: block; }
  .no-summary nav[role="navigation"] > div:nth-child(2),
  .no-summary nav[role="navigation"] > span,
  .no-summary nav[role="navigation"] > ul { display: inline-flex; }
}</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sel = document.getElementById('perPageGalleries');
    if (sel) {
      sel.addEventListener('change', function () {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', this.value);
        // Reset to first page when per_page changes
        url.searchParams.delete('page');
        window.location.href = url.toString();
      });
    }
  });
</script>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const filterButtons = document.querySelectorAll('[data-filter]');
        const categoryButtons = document.querySelectorAll('.filter-cat');
        const tableRows = document.querySelectorAll('tbody tr');
        let currentFilter = 'all';
        let currentCategory = null;
        
        // Function to filter table rows
        function filterTable(filter, category) {
            if (filter) currentFilter = filter;
            if (typeof category !== 'undefined') currentCategory = category;
            let hasVisibleRows = false;
            
            tableRows.forEach(row => {
                // Check if the row has status cell with Aktif or Nonaktif
                const statusCell = row.querySelector('td:nth-child(5) span');
                const status = statusCell ? statusCell.textContent.trim().toLowerCase() : '';
                const rowCategory = row.getAttribute('data-category');
                
                // Check status filter
                let statusPass = false;
                if (currentFilter === 'all' || 
                    (currentFilter === 'aktif' && status === 'aktif') || 
                    (currentFilter === 'tidak-aktif' && (status === 'nonaktif' || status.includes('tidak aktif')))) {
                    statusPass = true;
                }
                // Check category filter if applied
                let categoryPass = !currentCategory || currentCategory === rowCategory;
                
                if (statusPass && categoryPass) {
                    row.classList.remove('hidden');
                    hasVisibleRows = true;
                } else {
                    row.classList.add('hidden');
                }
            });
            
            // Show or hide empty state
            const emptyState = document.querySelector('.empty-state');
            if (emptyState) {
                if (hasVisibleRows) {
                    emptyState.classList.add('hidden');
                } else {
                    emptyState.classList.remove('hidden');
                }
            }
            
            // Update active filter button
            filterButtons.forEach(btn => {
                if (btn.getAttribute('data-filter') === filter) {
                    btn.classList.add('text-blue-600', 'border-blue-600');
                    btn.classList.remove('text-gray-500', 'border-transparent');
                } else {
                    btn.classList.remove('text-blue-600', 'border-blue-600');
                    btn.classList.add('text-gray-500', 'border-transparent');
                }
            });
        }
        
        // Add click event to status filter buttons
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                // Visual state for status buttons
                filterButtons.forEach(btn => btn.classList.remove('text-blue-600','bg-blue-100'));
                this.classList.add('text-blue-600','bg-blue-100');
                filterTable(filter);
            });
        });

        // Category filter behavior - redirect to server with kategori parameter
        const catSelect = document.getElementById('categoryFilter');
        if (catSelect) {
            catSelect.addEventListener('change', function() {
                const url = new URL(window.location.href);
                if (this.value) {
                    url.searchParams.set('kategori', this.value);
                } else {
                    url.searchParams.delete('kategori');
                }
                url.searchParams.delete('page'); // Reset to first page
                window.location.href = url.toString();
            });
        }
        
        // Log status values for debugging
        console.log('Status values:');
        tableRows.forEach(row => {
            const statusCell = row.querySelector('td:nth-child(5) span');
            if (statusCell) {
                console.log(statusCell.textContent.trim());
            }
        });
        
        // Initialize with 'all' filter
        filterTable('all');
        
        // Log current filter for debugging
        console.log('Current filter:', currentFilter);
        
        // Search functionality
        const searchInput = document.getElementById('search');
        
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                
                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.classList.remove('hidden');
                    } else {
                        row.classList.add('hidden');
                    }
                });
            });
        }
        
        // Bulk selection
        const selectAllCheckbox = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        const selectedCount = document.getElementById('selectedCount');
        const bulkAction = document.getElementById('bulkAction');
        const applyBulkAction = document.getElementById('applyBulkAction');
        
        function updateSelectionUI() {
            if (!selectedCount || !bulkAction || !applyBulkAction) return;
            
            const selectedRows = document.querySelectorAll('.row-checkbox:checked');
            const count = selectedRows.length;
            
            if (count > 0) {
                selectedCount.classList.remove('hidden');
                const countSpan = selectedCount.querySelector('span');
                if (countSpan) countSpan.textContent = count;
                bulkAction.classList.remove('hidden');
                applyBulkAction.classList.remove('hidden');
            } else {
                selectedCount.classList.add('hidden');
                bulkAction.classList.add('hidden');
                applyBulkAction.classList.add('hidden');
            }
        }
        
        if (selectAllCheckbox && rowCheckboxes.length > 0) {
            selectAllCheckbox.addEventListener('change', function() {
                const isChecked = this.checked;
                rowCheckboxes.forEach(checkbox => {
                    if (checkbox !== this) {
                        checkbox.checked = isChecked;
                    }
                });
                updateSelectionUI();
            });
        }
        
        if (rowCheckboxes.length > 0 && selectAllCheckbox) {
            rowCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    } else {
                        // Check if all checkboxes are checked
                        const allChecked = Array.from(rowCheckboxes).every(cb => cb.checked || cb === selectAllCheckbox);
                        selectAllCheckbox.checked = allChecked;
                    }
                    updateSelectionUI();
                });
            });
        }
        
        // Tooltip functionality
        const tooltipTriggers = document.querySelectorAll('[data-tooltip]');
        if (tooltipTriggers.length > 0) {
            tooltipTriggers.forEach(trigger => {
                const element = trigger;
                const tooltip = document.createElement('div');
                tooltip.className = 'invisible absolute z-10 py-1 px-2 text-xs font-medium text-white bg-gray-900 rounded-md shadow-sm opacity-0 whitespace-nowrap transition-opacity duration-200';
                tooltip.textContent = element.getAttribute('data-tooltip');
                
                element.addEventListener('mouseenter', (e) => {
                    const rect = element.getBoundingClientRect();
                    tooltip.style.left = `${rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2)}px`;
                    tooltip.style.top = `${rect.bottom + 5}px`;
                    tooltip.classList.remove('hidden');
                });
                
                element.addEventListener('mouseleave', () => {
                    tooltip.classList.add('hidden');
                });
            });
        }
    });
    
    // Function to handle gallery deletion confirmation
    function confirmDelete(galleryId, galleryTitle) {
        const modal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        const titleSpan = document.getElementById('galleryTitle');
        
        if (modal && deleteForm && titleSpan) {
            // Set the gallery title in the modal
            titleSpan.textContent = galleryTitle;
            
            // Set the form action URL with the correct ID parameter
            deleteForm.action = '{{ url("/admin/galleries") }}/' + galleryId + '/delete';
            
            // Show the modal
            modal.classList.remove('hidden');
        }
    }
    
    // Function to close the delete confirmation modal
    function closeModal() {
        const modal = document.getElementById('deleteModal');
        
        if (modal) {
            modal.classList.add('hidden');
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            closeModal();
        }
    }

</script>
@endpush

@endsection