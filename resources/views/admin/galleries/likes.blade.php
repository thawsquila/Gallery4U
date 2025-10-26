<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Gallery4U - Daftar Suka - {{ $gallery->judul }}</title>
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3c72',
                        'primary-dark': '#2a5298',
                        'primary-light': '#4b6cb7',
                        'text-dark': '#1f2937',
                        'text-light': '#6b7280'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(203, 213, 225, 0.3);
            box-shadow: 0 4px 20px 0 rgba(31, 38, 135, 0.05);
            transition: all 0.3s ease;
        }
        
        .glass-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.15);
        }
        
        .card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen shadow-xl bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80 py-8 px-4 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 via-transparent to-indigo-600/10"></div>
            <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-blue-500/20 to-transparent"></div>
            
            <!-- Logo Section -->
            <div class="relative pb-6 mb-6 border-b border-white/10">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0 bg-white/10 backdrop-blur-sm rounded-xl p-2.5 border border-white/10 shadow-lg">
                        <img src="/images/favicon.svg" alt="Logo SMK" class="w-10 h-10 object-contain">
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Admin Panel</h2>
                        <p class="text-sm text-white/80 font-medium">Gallery4U</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="relative mt-6 px-4">
                <!-- Main Menu Items -->
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-700/50">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300">
                                <i class="fas fa-tachometer-alt text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.contacts.index') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-700/50">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300">
                                <i class="fas fa-envelope text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Kontak Masuk</span>
                    </a>
                    
                    <a href="{{ route('admin.posts') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-700/50">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300">
                                <i class="fas fa-newspaper text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Berita & Event</span>
                    </a>
                    
                    <a href="{{ route('admin.teachers') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-700/50">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300">
                                <i class="fas fa-chalkboard-teacher text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Tenaga Pendidik</span>
                    </a>
                    
                    <a href="{{ route('admin.galleries') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 bg-white text-[#1F2937] shadow-md">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-white ring-1 ring-blue-100 text-blue-600">
                                <i class="fas fa-images text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Galeri</span>
                        <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </a>

                    <a href="{{ route('admin.comments') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-700/50">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300">
                                <i class="fas fa-comments text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Kelola Komentar</span>
                    </a>

                    <a href="{{ route('admin.users') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-700/50">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300">
                                <i class="fas fa-users text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Pengguna</span>
                    </a>

                    <a href="{{ route('admin.visitors') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 text-slate-300 hover:text-white hover:bg-slate-700/50">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300">
                                <i class="fas fa-user-clock text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Pengunjung</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="my-6 border-t border-white/10"></div>

                <!-- Action Items -->
                <div class="space-y-2">
                    <a href="{{ route('guest.home') }}" target="_blank" class="group flex items-center px-4 py-3 text-slate-300 hover:text-white hover:bg-emerald-500/20 rounded-xl transition-all duration-300">
                        <div class="p-2 rounded-lg mr-3 bg-emerald-500/20 text-emerald-400 group-hover:bg-emerald-500/30 group-hover:text-emerald-300">
                            <i class="fas fa-external-link-alt text-sm"></i>
                        </div>
                        <span class="font-medium">Lihat Website</span>
                        <i class="fas fa-arrow-up-right-from-square ml-auto text-xs opacity-60"></i>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="glass-effect shadow-lg relative z-40">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Daftar Suka - {{ $gallery->judul }}</h1>
                            <p class="text-sm text-gray-600 mt-1">Pengguna yang menyukai galeri ini</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.galleries') }}" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                                <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                            </a>
                            <div class="relative" x-data="{ open: false }" x-init="open = false" @click.away="open = false">
                                <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none group">
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500">Admin</p>
                                    </div>
                                    @php $avHead = Auth::user()->avatar ? asset('images/avatars/'.Auth::user()->avatar).'?v='.time() : null; @endphp
                                    <div class="w-10 h-10 rounded-full overflow-hidden ring-2 ring-blue-100 bg-white shadow-lg group-hover:shadow-xl transition-shadow">
                                        @if($avHead)
                                            <img src="{{ $avHead }}" alt="Avatar" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-r from-primary to-primary-dark flex items-center justify-center">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        @endif
                                    </div>
                                </button>
                                
                                <div x-show="open" 
                                     x-cloak
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl py-2 z-[100] border border-gray-100"
                                     style="display: none;">
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="py-1">
                                        <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                            <i class="fas fa-user-cog mr-2 text-gray-500"></i> Profile
                                        </a>
                                        <a href="{{ route('admin.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                            <i class="fas fa-cog mr-2 text-gray-500"></i> Settings
                                        </a>
                                    </div>
                                    <div class="border-t border-gray-100"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-6 relative z-10">
                <!-- Gallery Info Card -->
                <div class="glass-effect rounded-2xl p-6 mb-6 animate-fade-in-up card">
                    <div class="flex items-start gap-6">
                        @if($gallery->fotos && $gallery->fotos->isNotEmpty())
                            <div class="w-24 h-24 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="{{ asset('images/gallery/' . $gallery->fotos->first()->file) }}" 
                                     alt="{{ $gallery->judul }}" 
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-24 h-24 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white flex-shrink-0">
                                <i class="fas fa-images text-2xl"></i>
                            </div>
                        @endif
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $gallery->judul }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit($gallery->deskripsi, 200) }}</p>
                            <div class="flex items-center gap-6 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-heart text-red-500"></i>
                                    {{ number_format($gallery->likes->count()) }} suka
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-images"></i>
                                    {{ $gallery->fotos->count() }} foto
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-calendar"></i>
                                    {{ $gallery->created_at->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Likes List -->
                <div class="glass-effect rounded-2xl overflow-hidden animate-fade-in-up">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Daftar Pengguna yang Menyukai ({{ number_format($likes->total()) }})
                        </h3>
                    </div>
                    
                    @if($likes->count() > 0)
                        <div class="divide-y divide-gray-100">
                            @foreach($likes as $index => $like)
                                <div class="p-6 hover:bg-gray-50 transition-colors" style="animation-delay: {{ $index * 0.1 }}s">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                                {{ strtoupper(substr($like->user->name ?? 'U', 0, 1)) }}
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-900">{{ $like->user->name ?? 'Pengguna' }}</h4>
                                                <p class="text-sm text-gray-600">{{ $like->user->email ?? 'Email tidak tersedia' }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-sm text-gray-500 flex items-center gap-1">
                                                <i class="fas fa-heart text-red-500"></i>
                                                {{ $like->created_at->diffForHumans(\Carbon\Carbon::now(), true) }} yang lalu
                                            </div>
                                            <div class="text-xs text-gray-400">
                                                {{ $like->created_at->format('d M Y, H:i') }} WIB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        @if($likes->hasPages())
                            <div class="p-6 border-t border-gray-200">
                                {{ $likes->links() }}
                            </div>
                        @endif
                    @else
                        <div class="p-12 text-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-heart text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Yang Menyukai</h3>
                            <p class="text-gray-600">Galeri ini belum mendapat like dari pengguna</p>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>
