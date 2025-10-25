@extends('admin.layout')

@section('title', 'Kelola Komentar')

@section('content')
<div class="animate-fade-in-up">
    <!-- Filters Tabs -->
    <div class="mb-6 flex items-center gap-2">
        @php
            $mode = $mode ?? 'all';
            $tabBase = 'inline-flex items-center px-4 py-2 rounded-lg border transition ';
            $active = 'bg-blue-600 text-white border-blue-600';
            $inactive = 'bg-white text-gray-700 border-gray-200 hover:bg-gray-50';
        @endphp
        <a href="{{ route('admin.comments') }}" class="{{ $tabBase }} {{ $mode==='all' ? $active : $inactive }}">
            <i class="fas fa-layer-group mr-2"></i>Semua
        </a>
        <a href="{{ route('admin.comments.berita') }}" class="{{ $tabBase }} {{ $mode==='berita' ? $active : $inactive }}">
            <i class="fas fa-newspaper mr-2"></i>Berita
        </a>
        <a href="{{ route('admin.comments.galeri') }}" class="{{ $tabBase }} {{ $mode==='galeri' ? $active : $inactive }}">
            <i class="fas fa-images mr-2"></i>Galeri
        </a>
    </div>
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Total Comments Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-comments text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Komentar</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $totalComments }}</h3>
                </div>
            </div>
        </div>

        <!-- Approved Comments Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-green-100 text-green-600 mr-4">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Disetujui</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $approvedComments }}</h3>
                </div>
            </div>
        </div>

        <!-- Pending Comments Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-yellow-100 text-yellow-600 mr-4">
                    <i class="fas fa-clock text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Menunggu Persetujuan</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $pendingComments }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Breakdown by Type -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Berita Comments Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-purple-100 text-purple-600 mr-4">
                    <i class="fas fa-newspaper text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Komentar Berita</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $beritaComments }}</h3>
                </div>
            </div>
        </div>

        <!-- Galeri Comments Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-indigo-100 text-indigo-600 mr-4">
                    <i class="fas fa-images text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Komentar Galeri</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $galeriComments }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Table -->
    <div class="glass-effect rounded-2xl shadow-lg overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800 flex items-center">
                <div class="p-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-3">
                    <i class="fas fa-comments"></i>
                </div>
                Daftar Komentar
            </h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full table-fixed text-xs">
                <colgroup>
                    <col class="w-12">
                    <col class="w-32">
                    <col class="w-44">
                    <col class="w-44">
                    <col class="w-[22%]">
                    <col class="w-24">
                    <col class="w-24">
                    <col class="w-28">
                </colgroup>
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr class="text-[11px] text-gray-600">
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">ID</th>
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">Nama</th>
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">Email</th>
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">Artikel</th>
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">Komentar</th>
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">Status</th>
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">Tanggal</th>
                        <th class="px-3 py-2 text-left font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($comments as $comment)
                    <tr class="hover:bg-gray-50 transition-colors duration-200 align-top">
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">#{{ $comment->id }}</div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-7 h-7 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mr-2">
                                    <span class="text-white text-[11px] font-bold">{{ strtoupper(substr($comment->name, 0, 1)) }}</span>
                                </div>
                                <div class="font-medium text-gray-900 truncate">{{ $comment->name }}</div>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="text-gray-600 truncate" title="{{ $comment->email }}">{{ Str::limit($comment->email, 24) }}</div>
                        </td>
                        <td class="px-3 py-2 truncate">
                            @if($comment->post)
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800">
                                        <i class="fas fa-newspaper mr-1"></i>Berita
                                    </span>
                                    <a href="{{ route('guest.berita.detail', $comment->post->id) }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium transition-colors truncate" title="{{ $comment->post->judul }}">
                                        {{ Str::limit($comment->post->judul, 22) }}
                                        <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                    </a>
                                </div>
                            @elseif($comment->galery)
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800">
                                        <i class="fas fa-images mr-1"></i>Galeri
                                    </span>
                                    <a href="{{ route('guest.detail-galeri', $comment->galery->id) }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium transition-colors truncate" title="{{ $comment->galery->judul }}">
                                        {{ Str::limit($comment->galery->judul, 22) }}
                                        <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                    </a>
                                </div>
                            @else
                                <span class="text-gray-400 text-sm italic">Konten dihapus</span>
                            @endif
                        </td>
                        <td class="px-3 py-2">
                            <div class="text-gray-700 truncate" title="{{ $comment->content }}">{{ Str::limit($comment->content, 30) }}</div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            @if($comment->is_approved)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Disetujui
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    Menunggu
                                </span>
                            @endif
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="text-gray-600">{{ $comment->created_at->format('d/m/Y') }}</div>
                            <div class="text-[11px] text-gray-400">{{ $comment->created_at->format('H:i') }}</div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center space-x-1.5">
                                @if($comment->post)
                                    <a href="{{ route('guest.berita.detail', $comment->post->id) }}" target="_blank" class="inline-flex items-center justify-center w-7 h-7 bg-green-100 text-green-700 rounded-md hover:bg-green-200" title="Lihat di Website">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                @elseif($comment->galery)
                                    <a href="{{ route('guest.detail-galeri', $comment->galery->id) }}" target="_blank" class="inline-flex items-center justify-center w-7 h-7 bg-green-100 text-green-700 rounded-md hover:bg-green-200" title="Lihat di Website">
                                        <i class="fas fa-eye text-xs"></i>
                                    </a>
                                @endif
                                <a href="{{ route('admin.comments.show', $comment->id) }}" class="inline-flex items-center justify-center w-7 h-7 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200" title="Edit/Detail">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                @if(!$comment->is_approved)
                                    <button type="button" class="inline-flex items-center justify-center w-7 h-7 bg-green-100 text-green-700 rounded-md hover:bg-green-200" onclick="showApproveModal({{ $comment->id }}, '{{ addslashes($comment->name) }}')" title="Setujui">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                @else
                                    <button type="button" class="inline-flex items-center justify-center w-7 h-7 bg-yellow-100 text-yellow-700 rounded-md hover:bg-yellow-200" onclick="showRejectModal({{ $comment->id }}, '{{ addslashes($comment->name) }}')" title="Tolak">
                                        <i class="fas fa-times text-xs"></i>
                                    </button>
                                @endif
                                <button type="button" class="inline-flex items-center justify-center w-7 h-7 bg-red-100 text-red-700 rounded-md hover:bg-red-200" onclick="showDeleteModal({{ $comment->id }}, '{{ addslashes($comment->name) }}')" title="Hapus">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-comments text-2xl text-gray-400"></i>
                                </div>
                                <p class="text-gray-500 text-lg font-medium">Tidak ada komentar</p>
                                <p class="text-gray-400 text-sm">Belum ada komentar yang masuk ke sistem</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($comments->hasPages())
        <div class="px-4 py-3 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="text-xs text-gray-700">
                    Menampilkan {{ $comments->firstItem() }} - {{ $comments->lastItem() }} dari {{ $comments->total() }} komentar
                </div>
                <div class="flex space-x-1">
                    {{ $comments->links('pagination::tailwind-compact') }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Approve Modal -->
<div id="approveModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                <i class="fas fa-check text-green-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Setujui Komentar</h3>
            <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menyetujui komentar dari <span id="approveUserName" class="font-semibold"></span>?</p>
            <div class="flex justify-center space-x-3">
                <button type="button" onclick="hideApproveModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </button>
                <form id="approveForm" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        Ya, Setujui
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 mb-4">
                <i class="fas fa-times text-yellow-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Tolak Komentar</h3>
            <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menolak komentar dari <span id="rejectUserName" class="font-semibold"></span>?</p>
            <div class="flex justify-center space-x-3">
                <button type="button" onclick="hideRejectModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </button>
                <form id="rejectForm" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                        Ya, Tolak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <i class="fas fa-trash text-red-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Hapus Komentar</h3>
            <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus komentar dari <span id="deleteUserName" class="font-semibold"></span>? <strong>Aksi ini tidak dapat dibatalkan.</strong></p>
            <div class="flex justify-center space-x-3">
                <button type="button" onclick="hideDeleteModal()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="inline">
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

<script>
function showApproveModal(commentId, userName) {
    document.getElementById('approveUserName').textContent = userName;
    document.getElementById('approveForm').action = `/admin/comments/${commentId}/approve`;
    document.getElementById('approveModal').classList.remove('hidden');
}

function hideApproveModal() {
    document.getElementById('approveModal').classList.add('hidden');
}

function showRejectModal(commentId, userName) {
    document.getElementById('rejectUserName').textContent = userName;
    document.getElementById('rejectForm').action = `/admin/comments/${commentId}/reject`;
    document.getElementById('rejectModal').classList.remove('hidden');
}

function hideRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
}

function showDeleteModal(commentId, userName) {
    document.getElementById('deleteUserName').textContent = userName;
    document.getElementById('deleteForm').action = `/admin/comments/${commentId}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function hideDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
window.onclick = function(event) {
    const approveModal = document.getElementById('approveModal');
    const rejectModal = document.getElementById('rejectModal');
    const deleteModal = document.getElementById('deleteModal');
    
    if (event.target == approveModal) {
        hideApproveModal();
    }
    if (event.target == rejectModal) {
        hideRejectModal();
    }
    if (event.target == deleteModal) {
        hideDeleteModal();
    }
}
</script>
@endsection
