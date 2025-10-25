<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Pesan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Detail Pesan</h1>
            <div class="flex gap-2">
                <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <form method="POST" action="{{ route('admin.contacts.destroy', $message->id) }}" onsubmit="return confirm('Hapus pesan ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="inline-flex items-center gap-2 text-sm text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 rounded-lg bg-blue-50 border border-blue-200 text-blue-700">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow border p-6">
            <div class="grid sm:grid-cols-2 gap-4 mb-6">
                <div>
                    <div class="text-xs text-gray-500">Nama</div>
                    <div class="font-semibold text-gray-900">{{ $message->name }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Email</div>
                    <div class="font-semibold text-gray-900">{{ $message->email }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Tanggal</div>
                    <div class="text-gray-700">{{ $message->created_at->format('d M Y H:i') }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Status</div>
                    <div>
                        @if($message->is_read)
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">Dibaca</span>
                        @else
                            <form method="POST" action="{{ route('admin.contacts.read', $message->id) }}">
                                @csrf
                                <button class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">Tandai Dibaca</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="text-xs text-gray-500 mb-1">Subjek</div>
                <div class="text-lg font-semibold text-gray-900">{{ $message->subject }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500 mb-1">Pesan</div>
                <div class="whitespace-pre-line text-gray-800 leading-relaxed">{{ $message->message }}</div>
            </div>
        </div>
    </div>
</body>
</html>
