@extends('admin.layout')

@section('title', 'Detail Komentar')

@section('content')
<div class="animate-fade-in-up">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-4">
                <i class="fas fa-comment text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Komentar #{{ $comment->id }}</h1>
                <p class="text-gray-600">Informasi lengkap komentar pengguna</p>
            </div>
        </div>
        <a href="{{ route('admin.comments') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Comment Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="glass-effect rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white mr-3">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Informasi Komentar</h3>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">{{ strtoupper(substr($comment->name, 0, 1)) }}</span>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Nama Pengguna</p>
                            <p class="font-semibold text-gray-900">{{ $comment->name }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600 mb-1">Email</p>
                            <p class="font-medium text-gray-900">{{ $comment->email }}</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600 mb-1">IP Address</p>
                            <p class="font-medium text-gray-900">{{ $comment->ip_address }}</p>
                        </div>
                    </div>

                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">User Agent</p>
                        <p class="text-sm text-gray-700 break-all">{{ Str::limit($comment->user_agent, 100) }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600 mb-2">Status</p>
                            @if($comment->is_approved)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-2"></i>
                                    Disetujui
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-2"></i>
                                    Menunggu Persetujuan
                                </span>
                            @endif
                        </div>
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600 mb-1">Tanggal</p>
                            <p class="font-medium text-gray-900">{{ $comment->created_at->format('d F Y, H:i') }}</p>
                            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    @if($comment->parent)
                    <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <p class="text-sm font-medium text-blue-800 mb-2">Balasan untuk:</p>
                        <div class="bg-white p-3 rounded border">
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-medium text-gray-900">{{ $comment->parent->name }}</span>
                                <span class="text-xs text-gray-500">{{ $comment->parent->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="text-sm text-gray-700">{{ Str::limit($comment->parent->content, 100) }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Comment Content -->
            <div class="glass-effect rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-green-500 to-teal-500 text-white mr-3">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Isi Komentar</h3>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-blue-500">
                    <p class="text-gray-800 leading-relaxed">{{ $comment->content }}</p>
                </div>
            </div>

            <!-- Related Article/Gallery -->
            @if($comment->post)
            <div class="glass-effect rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 text-white mr-3">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Artikel Terkait</h3>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h4 class="font-bold text-gray-900 mb-2">{{ $comment->post->judul }}</h4>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($comment->post->isi), 200) }}</p>
                    <a href="{{ route('guest.berita.detail', $comment->post->id) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        Lihat Artikel
                    </a>
                </div>
            </div>
            @elseif($comment->galery)
            <div class="glass-effect rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-indigo-500 to-blue-500 text-white mr-3">
                        <i class="fas fa-images"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Galeri Terkait</h3>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <h4 class="font-bold text-gray-900 mb-2">{{ $comment->galery->judul }}</h4>
                    @if($comment->galery->deskripsi)
                        <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($comment->galery->deskripsi), 200) }}</p>
                    @endif
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-sm text-gray-600"><i class="fas fa-images mr-1"></i>{{ $comment->galery->fotos->count() }} Foto</span>
                        <span class="text-sm text-gray-600"><i class="fas fa-tag mr-1"></i>{{ $comment->galery->kategori }}</span>
                    </div>
                    <a href="{{ route('guest.detail-galeri', $comment->galery->id) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition-colors">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        Lihat Galeri
                    </a>
                </div>
            </div>
            @endif

            <!-- Replies -->
            @if($comment->replies->count() > 0)
            <div class="glass-effect rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-indigo-500 to-purple-500 text-white mr-3">
                        <i class="fas fa-reply"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Balasan ({{ $comment->replies->count() }})</h3>
                </div>
                <div class="space-y-3">
                    @foreach($comment->replies as $reply)
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-indigo-500">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-xs font-bold">{{ strtoupper(substr($reply->name, 0, 1)) }}</span>
                                </div>
                                <span class="font-medium text-gray-900">{{ $reply->name }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-gray-500">{{ $reply->created_at->format('d/m/Y H:i') }}</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $reply->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $reply->is_approved ? 'Disetujui' : 'Menunggu' }}
                                </span>
                            </div>
                        </div>
                        <p class="text-gray-700">{{ $reply->content }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Actions Sidebar -->
        <div class="space-y-6">
            <!-- Actions -->
            <div class="glass-effect rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-red-500 to-pink-500 text-white mr-3">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Aksi</h3>
                </div>
                
                <div class="space-y-3">
                    @if(!$comment->is_approved)
                        <button type="button" class="w-full inline-flex items-center justify-center px-4 py-3 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors font-medium" onclick="showApproveModal({{ $comment->id }}, '{{ addslashes($comment->name) }}')">
                            <i class="fas fa-check mr-2"></i>
                            Setujui Komentar
                        </button>
                    @else
                        <button type="button" class="w-full inline-flex items-center justify-center px-4 py-3 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors font-medium" onclick="showRejectModal({{ $comment->id }}, '{{ addslashes($comment->name) }}')">
                            <i class="fas fa-times mr-2"></i>
                            Tolak Komentar
                        </button>
                    @endif

                    <button type="button" class="w-full inline-flex items-center justify-center px-4 py-3 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors font-medium" onclick="showDeleteModal({{ $comment->id }}, '{{ addslashes($comment->name) }}')">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Komentar
                    </button>

                    <div class="pt-3 border-t border-gray-200">
                        @if($comment->post)
                        <a href="{{ route('guest.berita.detail', $comment->post->id) }}" target="_blank" class="w-full inline-flex items-center justify-center px-4 py-3 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors font-medium">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Lihat Artikel
                        </a>
                        @elseif($comment->galery)
                        <a href="{{ route('guest.detail-galeri', $comment->galery->id) }}" target="_blank" class="w-full inline-flex items-center justify-center px-4 py-3 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition-colors font-medium">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Lihat Galeri
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="glass-effect rounded-2xl p-6 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="p-2 rounded-lg bg-gradient-to-r from-teal-500 to-cyan-500 text-white mr-3">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Statistik</h3>
                </div>
                
                <div class="grid grid-cols-1 gap-4">
                    <div class="text-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg">
                        <div class="text-2xl font-bold text-blue-600">{{ $comment->replies->count() }}</div>
                        <div class="text-sm text-blue-700">Balasan</div>
                    </div>
                    <div class="text-center p-4 bg-gradient-to-r from-green-50 to-teal-50 rounded-lg">
                        <div class="text-lg font-bold text-green-600">{{ $comment->created_at->diffForHumans() }}</div>
                        <div class="text-sm text-green-700">Waktu</div>
                    </div>
                </div>
            </div>
        </div>
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
