<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - SMK Negeri 4 Bogor</title>
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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('styles')
    <style>
        /* Global font: Poppins */
        * {
            font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
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
        
        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
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
        
        /* Ensure dropdown is hidden by default */
        [x-cloak] { display: none !important; }
        
        /* Force dropdown to be closed on page load */
        .dropdown-menu {
            display: none;
        }
        
        .dropdown-menu.show {
            display: block;
        }
    </style>
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
                    <a href="{{ route('admin.dashboard') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.dashboard*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.dashboard*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-tachometer-alt text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Dashboard</span>
                        @if(request()->routeIs('admin.dashboard*'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.contacts.index') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.contacts*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.contacts*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-envelope-open-text text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Kontak Masuk</span>
                        @if(request()->routeIs('admin.contacts*'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>
                    
                    <a href="{{ route('admin.posts') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.posts*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.posts*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-newspaper text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Berita & Event</span>
                        @if(request()->routeIs('admin.posts*'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>
                    
                    <a href="{{ route('admin.teachers') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.teachers*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.teachers*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-chalkboard-teacher text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Tenaga Pendidik</span>
                        @if(request()->routeIs('admin.teachers*'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>
                    
                    <a href="{{ route('admin.galleries') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.galleries*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.galleries*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-images text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Galeri</span>
                        @if(request()->routeIs('admin.galleries*'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>

                    <a href="{{ route('admin.comments') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.comments*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.comments*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-comments text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Kelola Komentar</span>
                        @if(request()->routeIs('admin.comments*'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>

                    <!-- Users Management -->
                    <a href="{{ route('admin.users') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.users') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.users') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-users text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Pengguna</span>
                        @if(request()->routeIs('admin.users'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>

                    <!-- Visitors Page -->
                    <a href="{{ route('admin.visitors') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.visitors') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                        <div class="relative">
                            <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.visitors') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                                <i class="fas fa-user-clock text-sm"></i>
                            </div>
                        </div>
                        <span class="font-medium">Pengunjung</span>
                        @if(request()->routeIs('admin.visitors'))
                            <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        @endif
                    </a>
                </div>

                <!-- Statistics Menu Item -->
                <a href="{{ route('admin.statistics.edit') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.statistics*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                    <div class="relative">
                        <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.statistics*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                            <i class="fas fa-chart-line text-sm"></i>
                        </div>
                    </div>
                    <span class="font-medium">Kustomisasi</span>
                    @if(request()->routeIs('admin.statistics*'))
                        <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <!-- Reports Menu Item -->
                <a href="{{ route('admin.reports.index') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.reports*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                    <div class="relative">
                        <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.reports*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                            <i class="fas fa-file-lines text-sm"></i>
                        </div>
                    </div>
                    <span class="font-medium">Laporan</span>
                    @if(request()->routeIs('admin.reports*'))
                        <div class="absolute right-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    @endif
                </a>

                <!-- Divider -->
                <div class="my-6 border-t border-slate-700/50"></div>

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
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-900">@yield('title', 'Admin Panel')</h1>
                        </div>
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
                            
                            <!-- Dropdown menu -->
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
            </header>

            <!-- Content -->
            <main class="flex-1 p-6 relative z-10">
                @if(session('success'))
                    <div class="mb-6 glass-effect border border-green-400/50 text-white px-6 py-4 rounded-xl shadow-lg animate-fade-in-up" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                            <div>
                                <p class="font-bold text-gray-900">Success!</p>
                                <p class="text-sm text-gray-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 glass-effect border border-red-400/50 text-white px-6 py-4 rounded-xl shadow-lg animate-fade-in-up" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3 text-xl"></i>
                            <div>
                                <p class="font-bold text-gray-900">Error!</p>
                                <p class="text-sm text-gray-700">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="animate-fade-in-up">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    @stack('scripts')
    
    <script>
        // Close dropdown on page navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Force close all Alpine.js dropdowns on page load
            if (window.Alpine) {
                window.Alpine.store('dropdown', { open: false });
            }
        });
        
        // Close dropdown when clicking on navigation links
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function() {
                // Force close dropdown
                const dropdown = document.querySelector('[x-data*="open"]');
                if (dropdown && dropdown.__x) {
                    dropdown.__x.$data.open = false;
                }
            });
        });
    </script>
</body>
</html>
