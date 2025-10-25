<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontak Masuk - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Kontak Masuk</h1>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 rounded-lg bg-blue-50 border border-blue-200 text-blue-700">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow border">
            <div class="p-4 flex items-center justify-between">
                <form method="GET" class="w-full max-w-md">
                    <div class="flex">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama, email, subjek, pesan..." class="flex-1 px-3 py-2 border rounded-l-md focus:outline-none focus:ring focus:border-blue-300" />
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-r-md">Cari</button>
                    </div>
                </form>
                <div class="text-sm text-gray-600 ml-4">Belum dibaca: <span class="font-semibold">{{ $unreadCount }}</span></div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">Nama</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Subjek</th>
                            <th class="px-4 py-3 text-left">Waktu</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $m)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $m->name }}</td>
                                <td class="px-4 py-3">{{ $m->email }}</td>
                                <td class="px-4 py-3 truncate max-w-xs">{{ $m->subject }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ $m->created_at->format('d M Y H:i') }}</td>
                                <td class="px-4 py-3">
                                    @if(!$m->is_read)
                                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Baru</span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">Dibaca</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('admin.contacts.show', $m->id) }}" class="text-blue-600 hover:text-blue-800">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada pesan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">{{ $messages->links() }}</div>
        </div>
    </div>
</body>
</html>
