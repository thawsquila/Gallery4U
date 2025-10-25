@extends('admin.layout')

@section('title','Pengguna')

@section('content')
<div class="grid gap-6">
  <div class="glass-effect rounded-2xl p-5">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-xl font-bold text-gray-800">Daftar Pengguna</h2>
      <div class="text-sm text-gray-600">Total: {{ number_format($counts['total']) }} • Admin: {{ number_format($counts['admins']) }} • Member: {{ number_format($counts['members']) }}</div>
    </div>
    <form method="GET" class="flex items-center gap-3 mb-4">
      <input type="text" name="search" value="{{ $q }}" placeholder="Cari nama atau email..." class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400">
      <select name="per_page" class="px-3 py-2 border rounded-lg" onchange="this.form.submit()">
        @foreach([10,25,50,100] as $n)
          <option value="{{ $n }}" @selected($per==$n)>{{ $n }}/hal</option>
        @endforeach
      </select>
      <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Cari</button>
    </form>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border rounded-xl overflow-hidden">
        <thead>
          <tr class="bg-gray-50 text-left text-gray-600 text-sm">
            <th class="px-4 py-3">Pengguna</th>
            <th class="px-4 py-3">Email</th>
            <th class="px-4 py-3">Role</th>
            <th class="px-4 py-3">Bergabung</th>
            <th class="px-4 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y">
          @forelse($users as $u)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3">
                <div class="flex items-center gap-3">
                  @php $av = $u->avatar ? asset('images/avatars/'.$u->avatar) : null; @endphp
                  <div class="w-9 h-9 rounded-full overflow-hidden bg-gradient-to-r from-blue-500 to-indigo-600 text-white flex items-center justify-center">
                    @if($av)
                      <img src="{{ $av }}" class="w-full h-full object-cover" alt="av">
                    @else
                      {{ strtoupper(substr($u->name,0,1)) }}
                    @endif
                  </div>
                  <div class="font-medium text-gray-800">{{ $u->name }}</div>
                </div>
              </td>
              <td class="px-4 py-3 text-gray-600">{{ $u->email }}</td>
              <td class="px-4 py-3">
                <span class="text-xs px-2 py-1 rounded-full {{ $u->role==='admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">{{ ucfirst($u->role ?? 'user') }}</span>
              </td>
              <td class="px-4 py-3 text-gray-600">{{ $u->created_at?->format('d M Y') }}</td>
              <td class="px-4 py-3">
                <div class="flex items-center justify-end gap-2">
                  @if(auth()->id() !== $u->id)
                    <button type="button" 
                      class="px-3 py-1.5 text-sm rounded-lg ring-1 ring-red-200 text-red-700 hover:bg-red-50 open-delete-user"
                      data-id="{{ $u->id }}" data-name="{{ $u->name }}">
                      Hapus
                    </button>
                  @else
                    <span class="text-xs text-gray-400">Akun Anda</span>
                  @endif
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="px-4 py-6 text-center text-gray-500">Tidak ada data pengguna.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">{{ $users->links('pagination::tailwind-compact') }}</div>
  </div>
</div>
<!-- Delete User Modal -->
<div id="deleteUserModal" class="fixed inset-0 z-50 hidden">
  <div class="absolute inset-0 bg-black/50"></div>
  <div class="relative max-w-md mx-auto mt-28 bg-white rounded-2xl shadow-2xl p-6">
    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-red-100 flex items-center justify-center text-red-600">
      <i class="fas fa-trash"></i>
    </div>
    <h3 class="text-lg font-bold text-center mb-2">Hapus Pengguna</h3>
    <p class="text-center text-gray-600 mb-5">Apakah Anda yakin ingin menghapus akun <span id="delUserName" class="font-semibold text-gray-800"></span>? <span class="font-semibold">Aksi ini tidak dapat dibatalkan.</span></p>
    <div class="flex items-center justify-center gap-3">
      <button type="button" id="cancelDeleteUser" class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700">Batal</button>
      <form id="deleteUserForm" method="POST" action="#">
        @csrf
        @method('DELETE')
        <button class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold">Ya, Hapus</button>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const modal = document.getElementById('deleteUserModal');
    const nameSpan = document.getElementById('delUserName');
    const form = document.getElementById('deleteUserForm');
    const cancel = document.getElementById('cancelDeleteUser');
    document.querySelectorAll('.open-delete-user').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        const name = btn.getAttribute('data-name');
        nameSpan.textContent = name;
        form.setAttribute('action', '{{ url('admin/users') }}/' + id);
        modal.classList.remove('hidden');
      });
    });
    cancel.addEventListener('click', ()=> modal.classList.add('hidden'));
    modal.addEventListener('click', (e)=>{ if(e.target === modal.firstElementChild) modal.classList.add('hidden'); });
  });
</script>
@endpush
@endsection
