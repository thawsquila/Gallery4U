@extends('admin.layout')

@section('title', 'Tenaga Pendidik')

@section('content')
<div class="animate-fade-in-up">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Total Teachers Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-blue-100 text-blue-600 mr-4">
                    <i class="fas fa-chalkboard-teacher text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Guru</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $teachers->total() }}</h3>
                </div>
            </div>
        </div>

        <!-- Active Teachers Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-green-100 text-green-600 mr-4">
                    <i class="fas fa-user-check text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Guru Aktif</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $teachers->where('status', 'aktif')->count() }}</h3>
                </div>
            </div>
        </div>

        <!-- Departments Card -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-purple-100 text-purple-600 mr-4">
                    <i class="fas fa-sitemap text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Bidang</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $teachers->pluck('bidang')->filter()->unique()->count() }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Main Content -->
    <div class="glass-effect rounded-2xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                        <div class="p-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-3">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        Daftar Tenaga Pendidik
                    </h3>
                    <p class="text-sm text-gray-600 mt-1">Kelola data guru/tenaga pendidik di halaman ini</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <div class="relative">
                        <input type="text" id="search" placeholder="Cari guru..." 
                            class="pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full md:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.teachers.create') }}" 
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-2.5 rounded-xl transition-all duration-300 flex items-center justify-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Baru
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="px-6 pt-4">
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">{{ session('success') }}</div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full table-fixed text-xs">
                <colgroup>
                    <col class="w-16">
                    <col class="w-56">
                    <col class="w-40">
                    <col class="w-40">
                    <col class="w-28">
                    <col class="w-28">
                </colgroup>
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200 text-[11px] text-gray-600">
                        <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-image mr-2 text-blue-500"></i>
                                Foto
                            </div>
                        </th>
                        <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2 text-green-500"></i>
                                Nama
                            </div>
                        </th>
                        <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-briefcase mr-2 text-purple-500"></i>
                                Jabatan
                            </div>
                        </th>
                        <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-graduation-cap mr-2 text-orange-500"></i>
                                Bidang
                            </div>
                        </th>
                        <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-toggle-on mr-2 text-indigo-500"></i>
                                Status
                            </div>
                        </th>
                        <th class="px-3 py-2 text-left font-semibold uppercase tracking-wider">
                            <div class="flex items-center">
                                <i class="fas fa-cogs mr-2 text-gray-500"></i>
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($teachers as $t)
                    <tr class="hover:bg-gray-50 transition-colors align-top">
                        <td class="px-3 py-2">
                            <div class="h-12 w-12 rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                                @if($t->foto)
                                    <img src="{{ asset('images/teachers/' . $t->foto) }}" alt="{{ $t->nama }}" class="h-full w-full object-cover transition-transform duration-300 hover:scale-110"/>
                                @else
                                    <div class="h-full w-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-indigo-100 text-blue-500">
                                        <i class="fas fa-user text-lg"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-3 py-2">
                            <div class="font-semibold text-gray-900">{{ $t->nama }}</div>
                            <div class="text-[11px] text-gray-500 flex items-center mt-0.5">
                                <i class="fas fa-sort-numeric-down mr-1"></i>
                                Urutan: {{ $t->urutan }}
                            </div>
                        </td>
                        <td class="px-3 py-2">
                            <span class="text-gray-700 truncate" title="{{ $t->jabatan }}">{{ Str::limit($t->jabatan, 28) ?? '-' }}</span>
                        </td>
                        <td class="px-3 py-2">
                            @if($t->bidang)
                                <span class="px-2.5 py-1 inline-flex items-center text-xs font-medium rounded-full bg-purple-50 text-purple-700 border border-purple-100 truncate">
                                    <i class="fas fa-graduation-cap mr-1"></i>
                                    {{ $t->bidang }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            @if($t->status === 'aktif')
                                <span class="px-2.5 py-1 inline-flex items-center text-xs font-medium rounded-full bg-green-50 text-green-700 border border-green-100">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="px-2.5 py-1 inline-flex items-center text-xs font-medium rounded-full bg-red-50 text-red-700 border border-red-100">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5"></span>
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-3 py-2 text-right">
                            <div class="flex items-center justify-end space-x-1.5">
                                <a href="{{ route('guest.teachers', ['q' => $t->nama]) }}" target="_blank" class="inline-flex items-center justify-center w-7 h-7 bg-green-100 text-green-700 rounded-md hover:bg-green-200" title="Lihat di Website">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                                <a href="{{ route('admin.teachers.edit', $t->id) }}" 
                                   class="inline-flex items-center justify-center w-7 h-7 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200" title="Edit">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <form id="delete-form-{{ $t->id }}" action="{{ route('admin.teachers.destroy', $t->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" 
                                        onclick="confirmDelete('{{ $t->id }}', '{{ addslashes($t->nama) }}')"
                                        class="inline-flex items-center justify-center w-7 h-7 bg-red-100 text-red-700 rounded-md hover:bg-red-200" title="Hapus">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-20 text-center">
                            <div class="mx-auto w-20 h-20 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center mb-6 shadow-lg">
                                <i class="fas fa-chalkboard-teacher text-blue-500 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Belum ada data guru</h3>
                            <p class="text-gray-500 mb-6 max-w-sm mx-auto">Mulai dengan menambahkan data tenaga pendidik pertama untuk mengelola informasi guru.</p>
                            <a href="{{ route('admin.teachers.create') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Guru Baru
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($teachers->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                {{ $teachers->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-user-times text-2xl text-red-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 text-center mb-2">Hapus Tenaga Pendidik</h3>
            <p class="text-gray-600 text-center mb-6">Apakah Anda yakin ingin menghapus <span id="deleteTeacherName" class="font-semibold"></span>? Data yang sudah dihapus tidak dapat dikembalikan.</p>
            
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeModal()" class="px-6 py-2.5 border border-gray-300 text-gray-700 bg-white rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    Batal
                </button>
                <button type="button" onclick="deleteTeacher()" class="px-6 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Delete confirmation modal
function confirmDelete(id, name) {
    document.getElementById('deleteTeacherName').textContent = name;
    
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    
    // Show modal with animation
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
    
    // Store the id for delete action
    modal.dataset.teacherId = id;
}

function closeModal() {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function deleteTeacher() {
    const modal = document.getElementById('deleteModal');
    const id = modal.dataset.teacherId;
    
    // Submit the form
    const form = document.getElementById(`delete-form-${id}`);
    if (form) {
        form.submit();
    } else {
        // Fallback if form not found
        fetch(`/admin/teachers/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'DELETE',
                'Content-Type': 'application/x-www-form-urlencoded',
            }
        })
        .then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            } else {
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            window.location.reload();
        });
    }
}
</script>
@endpush

@push('scripts')
<script>
// Search functionality
document.getElementById('search').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        if (row.querySelector('td:first-child') === null) return;
        
        const name = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
        const jabatan = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
        const bidang = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';
        
        if (name.includes(searchTerm) || jabatan.includes(searchTerm) || bidang.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endpush

@endsection
