@extends('admin.layout')

@section('title', 'Kelola Berita & Event')

@section('content')
<div class="animate-fade-in-up">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Posts Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-newspaper text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Konten</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $totalCount ?? $posts->total() }}</h3>
                </div>
            </div>
        </div>

        <!-- Active Posts Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-green-100 text-green-600 mr-4">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Konten Aktif</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $activeCount ?? $posts->where('status', 'aktif')->count() }}</h3>
                </div>
            </div>
        </div>

        <!-- Inactive Posts Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-red-100 text-red-600 mr-4">
                    <i class="fas fa-times-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Konten Tidak Aktif</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $inactiveCount ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Views Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-orange-100 text-orange-600 mr-4">
                    <i class="fas fa-eye text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Views</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($posts->sum('views') ?? 0) }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                    <i class="fas fa-exclamation-triangle text-2xl text-red-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 text-center mb-2">Hapus Data</h3>
                <p class="text-gray-600 text-center mb-6">Apakah Anda yakin ingin menghapus <span id="itemName" class="font-semibold"></span>? Tindakan ini tidak dapat dibatalkan.</p>
                
                <div class="flex justify-center space-x-4">
                    <button type="button" onclick="closeModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 bg-white rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        Batal
                    </button>
                    <button type="button" id="confirmDeleteBtn" class="px-6 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200 flex items-center">
                        <span id="buttonText">Ya, Hapus</span>
                        <span id="loadingSpinner" class="ml-2 hidden">
                            <i class="fas fa-spinner fa-spin"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="glass-effect rounded-2xl shadow-lg overflow-hidden">
    <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-100">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-3">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    Daftar Berita & Event
                </h3>
                <p class="text-sm text-gray-600 mt-1">Kelola semua konten berita dan event di sini</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <form action="{{ route('admin.posts') }}" method="GET" class="relative flex-grow max-w-md">
                    <input type="text" id="search" name="search" placeholder="Cari berita/event..." 
                        value="{{ request('search') }}"
                        class="pl-10 pr-4 py-2.5 border border-gray-200 bg-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full transition-all duration-200 shadow-sm hover:shadow">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-blue-400">
                        <i class="fas fa-search"></i>
                    </div>
                    <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center text-blue-500 hover:text-blue-700">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
                <a href="{{ route('admin.posts.create') }}" 
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-2.5 rounded-lg transition-all duration-300 flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5 font-medium">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Baru
                </a>
            </div>
        </div>
    
    <!-- Filter Tabs -->
    <div class="px-6 pt-2 pb-0 border-b border-gray-200">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex space-x-2 overflow-x-auto pb-2">
                <button class="filter-btn px-4 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded-lg transition-colors">
                    <i class="fas fa-list mr-2"></i> Semua
                </button>
                <button class="filter-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <i class="fas fa-newspaper mr-2"></i> Berita
                </button>
                <button class="filter-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <i class="fas fa-calendar-alt mr-2"></i> Event
                </button>
                <button class="filter-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <i class="fas fa-check-circle mr-2"></i> Aktif
                </button>
                <button class="filter-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                    <i class="fas fa-times-circle mr-2"></i> Tidak Aktif
                </button>
            </div>
            
            @if(request('search'))
            <div class="flex items-center mt-2 md:mt-0">
                <span class="text-sm text-gray-600 mr-2">Hasil pencarian untuk: <span class="font-medium">"{{ request('search') }}"</span></span>
                <a href="{{ route('admin.posts') }}" class="text-blue-500 hover:text-blue-700 text-sm font-medium flex items-center">
                    <i class="fas fa-times-circle mr-1"></i> Reset
                </a>
            </div>
            @endif
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-50 to-indigo-50">
                <tr class="text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                    <th class="px-6 py-4">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Views</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($posts as $post)
                <tr class="bg-white hover:bg-blue-50 transition-all duration-200 border-l-4 border-transparent hover:border-blue-400">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($post->gambar)
                            <div class="flex-shrink-0 h-12 w-12 rounded-lg overflow-hidden border-2 border-white shadow-sm">
                                <img class="h-full w-full object-cover hover:scale-105 transition-transform duration-300" src="{{ asset('images/posts/' . $post->gambar) }}" alt="{{ $post->judul }}">
                            </div>
                            @else
                            <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg flex items-center justify-center border-2 border-white shadow-sm">
                                <i class="fas fa-image text-blue-300 text-xl"></i>
                            </div>
                            @endif
                            <div class="ml-4">
                                <div class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">{{ $post->judul }}</div>
                                <div class="text-xs text-gray-500 mt-1">
                                    <span class="inline-flex items-center">
                                        <i class="far fa-clock mr-1"></i>
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if($post->kategori_id == 1)
                            <span class="px-3 py-1.5 inline-flex items-center text-xs font-medium rounded-full bg-blue-50 text-blue-700 border border-blue-100 shadow-sm">
                                <i class="fas fa-newspaper mr-1.5"></i> Berita
                            </span>
                        @elseif($post->kategori_id == 2)
                            <span class="px-3 py-1.5 inline-flex items-center text-xs font-medium rounded-full bg-purple-50 text-purple-700 border border-purple-100 shadow-sm">
                                <i class="fas fa-calendar-alt mr-1.5"></i> Event
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($post->status == 'aktif')
                            <span class="px-3 py-1.5 inline-flex items-center text-xs font-medium rounded-full bg-green-50 text-green-700 border border-green-100 shadow-sm">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                Aktif
                            </span>
                        @else
                            <span class="px-3 py-1.5 inline-flex items-center text-xs font-medium rounded-full bg-red-50 text-red-700 border border-red-100 shadow-sm">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span>
                                Tidak Aktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="p-2 rounded-lg bg-orange-50 text-orange-600 mr-2">
                                <i class="fas fa-eye text-sm"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-gray-800">{{ number_format($post->views ?? 0) }}</span>
                                <span class="text-xs text-gray-500">views</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-600 font-medium">{{ $post->created_at->format('d M Y') }}</span>
                            <span class="text-xs text-gray-400">{{ $post->created_at->format('H:i') }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-1.5">
                            @if($post->kategori_id == 1)
                                <a href="{{ route('guest.berita.detail', $post->id) }}" target="_blank" 
                                   class="inline-flex items-center justify-center w-7 h-7 bg-green-100 text-green-700 rounded-md hover:bg-green-200"
                                   title="Lihat di Website">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                            @elseif($post->kategori_id == 2)
                                <a href="{{ route('guest.event.detail', $post->id) }}" target="_blank" 
                                   class="inline-flex items-center justify-center w-7 h-7 bg-green-100 text-green-700 rounded-md hover:bg-green-200"
                                   title="Lihat di Website">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                            @endif
                            <a href="{{ route('admin.posts.edit', $post->id) }}" 
                               class="inline-flex items-center justify-center w-7 h-7 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200"
                               title="Edit">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <form id="deleteForm-{{ $post->id }}" action="{{ route('admin.posts.delete', $post->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        onclick="event.stopPropagation(); showDeleteModal('{{ $post->id }}', '{{ addslashes($post->judul) }}', 'deleteForm-{{ $post->id }}')"
                                        class="inline-flex items-center justify-center w-7 h-7 bg-red-100 text-red-700 rounded-md hover:bg-red-200"
                                        title="Hapus">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-16 text-center">
                        <div class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-inbox text-2xl text-blue-400"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-800 mb-1">Tidak ada data</h3>
                            <p class="text-sm text-gray-500 mb-4">Belum ada berita atau event yang tersedia</p>
                            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Baru
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-b-2xl">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <div class="text-sm text-gray-600 mb-4 sm:mb-0">
                Menampilkan <span class="font-medium">{{ $posts->firstItem() }}</span> - <span class="font-medium">{{ $posts->lastItem() }}</span> dari <span class="font-medium">{{ $posts->total() }}</span> data
            </div>
            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                <div class="flex items-center">
                    <span class="text-sm text-gray-600 mr-2">Tampilkan:</span>
                    <select id="perPage" class="text-sm border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div class="bg-white px-3 py-1.5 rounded-lg shadow-sm border border-gray-200">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
let currentFormId = '';
let currentFilter = 'all';

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tableRows = document.querySelectorAll('tbody tr');
    const searchInput = document.getElementById('search');
    
    // Handle search form submission with Enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchInput.closest('form').submit();
        }
    });
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Visual active state for pill buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('text-blue-600', 'bg-blue-100');
                btn.classList.add('text-gray-600');
            });
            this.classList.remove('text-gray-600');
            this.classList.add('text-blue-600', 'bg-blue-100');
            
            // Get filter value
            const filterText = this.textContent.trim().toLowerCase();
            currentFilter = filterText;
            
            // Filter table rows
            tableRows.forEach(row => {
                if (row.querySelector('td:first-child') === null) return; // Skip empty state row
                
                const kategori = row.querySelector('td:nth-child(3) span')?.textContent.trim().toLowerCase() || '';
                const status = row.querySelector('td:nth-child(4) span')?.textContent.trim().toLowerCase() || '';
                
                if (filterText === 'semua') {
                    row.style.display = '';
                } else if (filterText === 'berita' && kategori.includes('berita')) {
                    row.style.display = '';
                } else if (filterText === 'event' && kategori.includes('event')) {
                    row.style.display = '';
                } else if (filterText === 'aktif' && status.includes('aktif') && !status.includes('tidak')) {
                    row.style.display = '';
                } else if (filterText === 'tidak aktif' && status.includes('tidak aktif')) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show empty state if no visible rows
            const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none');
            const emptyStateRow = document.querySelector('tr td[colspan="8"]')?.parentNode;
            
            if (visibleRows.length === 0 && emptyStateRow) {
                emptyStateRow.style.display = '';
            } else if (emptyStateRow) {
                emptyStateRow.style.display = 'none';
            }
        });
    });
});


function closeModal() {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

function showDeleteModal(id, name, formId) {
    currentFormId = formId;
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    const itemName = document.getElementById('itemName');
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    const buttonText = document.getElementById('buttonText');
    const loadingSpinner = document.getElementById('loadingSpinner');

    confirmBtn.disabled = false;
    buttonText.textContent = 'Ya, Hapus';
    loadingSpinner.classList.add('hidden');
    itemName.textContent = `"${name}"`;

    // Reset event
    const newConfirmBtn = confirmBtn.cloneNode(true);
    confirmBtn.parentNode.replaceChild(newConfirmBtn, confirmBtn);

    newConfirmBtn.addEventListener('click', function() {
        buttonText.textContent = 'Menghapus...';
        newConfirmBtn.disabled = true;
        loadingSpinner.classList.remove('hidden');
        document.getElementById(formId).submit();
    });

    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

// Close modal click luar
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});

// Close modal ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
});
    
    // Tooltip functionality
    const tooltips = document.querySelectorAll('[data-tooltip]');
    let tooltip = null;
    
    function createTooltip(element) {
        const text = element.getAttribute('data-tooltip');
        const pos = element.getAttribute('data-tooltip-pos') || 'top';
        
        tooltip = document.createElement('div');
        tooltip.className = `tooltip ${pos} bg-gray-900 text-white text-xs rounded py-1 px-2 absolute z-50 whitespace-nowrap`;
        tooltip.textContent = text;
        
        document.body.appendChild(tooltip);
        
        const rect = element.getBoundingClientRect();
        const tooltipRect = tooltip.getBoundingClientRect();
        
        switch(pos) {
            case 'top':
                tooltip.style.top = `${window.scrollY + rect.top - tooltipRect.height - 5}px`;
                tooltip.style.left = `${window.scrollX + rect.left + (rect.width - tooltipRect.width) / 2}px`;
                break;
            case 'bottom':
                tooltip.style.top = `${window.scrollY + rect.bottom + 5}px`;
                tooltip.style.left = `${window.scrollX + rect.left + (rect.width - tooltipRect.width) / 2}px`;
                break;
            case 'left':
                tooltip.style.top = `${window.scrollY + rect.top + (rect.height - tooltipRect.height) / 2}px`;
                tooltip.style.left = `${window.scrollX + rect.left - tooltipRect.width - 5}px`;
                break;
            case 'right':
                tooltip.style.top = `${window.scrollY + rect.top + (rect.height - tooltipRect.height) / 2}px`;
                tooltip.style.left = `${window.scrollX + rect.right + 5}px`;
                break;
        }
    }
    
    function removeTooltip() {
        if (tooltip) {
            tooltip.remove();
            tooltip = null;
        }
    }
    
    tooltips.forEach(el => {
        el.addEventListener('mouseenter', () => createTooltip(el));
        el.addEventListener('mouseleave', removeTooltip);
    });
</script>
@endpush

@push('styles')
<style>
    .tooltip {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        pointer-events: none;
        transition: opacity 0.2s;
    }
    
    .tooltip::after {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-style: solid;
    }
    
    .tooltip.top::after {
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 5px 5px 0 5px;
        border-color: #111827 transparent transparent transparent;
    }
    
    .tooltip.bottom::after {
        top: -5px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 0 5px 5px 5px;
        border-color: transparent transparent #111827 transparent;
    }
    
    .tooltip.left::after {
        right: -5px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 5px 0 5px 5px;
        border-color: transparent transparent transparent #111827;
    }
    
    .tooltip.right::after {
        left: -5px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 5px 5px 5px 0;
        border-color: transparent #111827 transparent transparent;
    }
    
    /* Custom pagination styles */
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .page-item {
        margin: 0 2px;
    }
    
    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
        color: #4b5563;
        font-size: 0.875rem;
        transition: all 0.2s;
    }
    
    .page-link:hover {
        background-color: #f3f4f6;
        color: #1f2937;
    }
    
    .page-item.active .page-link {
        background-color: #2563eb;
        border-color: #2563eb;
        color: white;
    }
    
    .page-item.disabled .page-link {
        opacity: 0.6;
        pointer-events: none;
    }
</style>
@endpush
@endsection