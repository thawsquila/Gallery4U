<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gallery4U Admin') - SMK Negeri 4 Bogor</title>
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
        /* Print-friendly styles */
        @media print {
            /* Hide sidebar and top header bar */
            .w-64 { display: none !important; }
            header.glass-effect { display: none !important; }
            /* Hide buttons and links not needed */
            .print-hidden, .group.flex.items-center.px-4.py-3, nav a[target="_blank"] { display: none !important; }
            /* Show print header */
            #printHeader { display: block !important; }
            /* Expand content */
            main { padding: 0 !important; }
            body { background: #fff !important; }
            .glass-effect, .card, .shadow, .shadow-lg, .shadow-xl { box-shadow: none !important; }
            /* Avoid page-break issues */
            .card, section, .grid { break-inside: avoid; page-break-inside: avoid; }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('styles')
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
        
        /* Calendar Styles */
        .calendar-day {
            transition: all 0.2s ease;
            position: relative;
        }
        
        .calendar-day:hover {
            transform: translateY(-1px);
        }
        
        .calendar-today {
            background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        
        .calendar-weekend {
            color: #dc2626;
            font-weight: 500;
        }
        
        .calendar-other-month {
            color: #d1d5db;
            opacity: 0.6;
        }
        
        .calendar-selected {
            background: #dbeafe;
            color: #1e40af;
            border: 2px solid #3b82f6;
        }
        
        /* Widget animations */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .widget-animate {
            animation: slideInRight 0.6s ease-out;
        }
        
        /* Clock animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .clock-pulse {
            animation: pulse 2s infinite;
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
                        <p class="text-sm text-white/80 font-medium">SMKN 4 Bogor</p>
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

                    <!-- Statistics Menu Item -->
                <a href="{{ route('admin.statistics.edit') }}" class="group relative flex items-center px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.statistics*') ? 'bg-white text-[#1F2937] shadow-md' : 'text-slate-300 hover:text-white hover:bg-slate-700/50' }}">
                    <div class="relative">
                        <div class="p-2 rounded-lg mr-3 {{ request()->routeIs('admin.statistics*') ? 'bg-white ring-1 ring-blue-100 text-blue-600' : 'bg-blue-500/20 text-blue-400 group-hover:bg-blue-500/30 group-hover:text-blue-300' }}">
                            <i class="fas fa-chart-line text-sm"></i>
                        </div>
                    </div>
                    <span class="font-medium">Kelola Statistik</span>
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
                        <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <div class="flex items-center gap-3">
                            <!-- Print Button -->
                            <button type="button" onclick="window.print()" class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium shadow hover:opacity-95 transition print-hidden">
                                <i class="fas fa-print"></i>
                                Cetak Laporan
                            </button>
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

            <!-- Print Report Header (shown only in print) -->
            <section id="printHeader" class="hidden">
                <div class="px-6 pt-6">
                    <div class="text-center mb-4">
                        <h2 class="text-2xl font-bold">Laporan Performa Website</h2>
                        <div class="text-sm text-gray-600">SMK Negeri 4 Bogor</div>
                        <div class="text-sm text-gray-600">Tanggal Cetak: <span id="printDate"></span></div>
                    </div>
                    <hr>
                </div>
            </section>

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

                <!-- Logged-in User Widget -->
                <section class="mb-6">
                    <div class="glass-effect rounded-2xl p-5 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            @php $av = Auth::user()->avatar ? asset('images/avatars/'.Auth::user()->avatar) : null; @endphp
                            <div class="w-12 h-12 rounded-full overflow-hidden ring-2 ring-blue-100 bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-lg font-bold">
                                @if($av)
                                    <img src="{{ $av }}" alt="Avatar" class="w-full h-full object-cover">
                                @else
                                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                                @endif
                            </div>
                            <div>
                                <div class="text-sm text-gray-500">Anda login sebagai</div>
                                <div class="text-base font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-blue-50 text-blue-700 font-medium">
                            <i class="fas fa-user-shield mr-1"></i>{{ ucfirst(Auth::user()->role ?? 'admin') }}
                        </span>
                    </div>
                </section>

                @hasSection('content')
                    @yield('content')
                @else
                    <!-- Dashboard Content -->
                    <div class="animate-fade-in-up">
                        <!-- Statistics Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <!-- Total Posts Card -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-xl bg-blue-100 text-blue-600 mr-4">
                                        <i class="fas fa-newspaper text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Total Berita & Event</p>
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $totalPosts }}</h3>
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
                                        <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalViews ?? 0) }}</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Galleries Card -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-xl bg-green-100 text-green-600 mr-4">
                                        <i class="fas fa-images text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Total Galeri</p>
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $totalGalleries }}</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Visitors Card -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-xl bg-purple-100 text-purple-600 mr-4">
                                        <i class="fas fa-chart-line text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Total Pengunjung</p>
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $totalVisitors }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Article Statistics Section -->
                        <div class="glass-effect rounded-2xl p-6 shadow-lg card mb-8 relative z-0">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                    <div class="p-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-3">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    Statistik Artikel Terbanyak Dibaca
                                </h3>
                            </div>
                            
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Chart Section -->
                                <div class="bg-white rounded-xl p-6 border border-gray-100">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Top 5 Artikel Terpopuler</h4>
                                    <div class="relative h-80">
                                        <canvas id="mostReadChart"></canvas>
                                    </div>
                                </div>
                                
                                <!-- Detailed List -->
                                <div class="bg-white rounded-xl p-6 border border-gray-100">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Detail Artikel Terpopuler</h4>
                                    <div class="space-y-3 max-h-80 overflow-y-auto">
                                        @forelse($mostViewedPosts ?? [] as $index => $post)
                                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                                <div class="flex items-center space-x-3">
                                                    <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                                        {{ $index + 1 }}
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <h5 class="text-sm font-medium text-gray-800 truncate">{{ $post->judul }}</h5>
                                                        <div class="flex items-center space-x-2 mt-1">
                                                            <span class="text-xs px-2 py-1 rounded-full {{ $post->kategori_id == 1 ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                                                                {{ $post->kategori_id == 1 ? 'Berita' : 'Event' }}
                                                            </span>
                                                            <span class="text-xs text-gray-500">{{ $post->created_at->format('d M Y') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    <div class="text-right">
                                                        <div class="text-lg font-bold text-blue-600">{{ number_format($post->views) }}</div>
                                                        <div class="text-xs text-gray-500">views</div>
                                                    </div>
                                                    <div class="w-12 bg-gray-200 rounded-full h-2">
                                                        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full" 
                                                             style="width: {{ $mostViewedPosts->count() > 0 ? ($post->views / $mostViewedPosts->first()->views) * 100 : 0 }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center py-8">
                                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                                    <i class="fas fa-chart-bar text-2xl text-gray-400"></i>
                                                </div>
                                                <p class="text-gray-500">Belum ada data statistik artikel</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Summary Stats -->
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6 pt-6 border-t border-gray-200">
                                <div class="text-center p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg">
                                    <div class="text-2xl font-bold text-blue-600">{{ $mostViewedPosts->where('kategori_id', 1)->count() ?? 0 }}</div>
                                    <div class="text-sm text-blue-700">Berita Populer</div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-lg">
                                    <div class="text-2xl font-bold text-green-600">{{ $mostViewedPosts->where('kategori_id', 2)->count() ?? 0 }}</div>
                                    <div class="text-sm text-green-700">Event Populer</div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg">
                                    <div class="text-2xl font-bold text-purple-600">{{ $mostViewedPosts->max('views') ?? 0 }}</div>
                                    <div class="text-sm text-purple-700">Views Tertinggi</div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg">
                                    <div class="text-2xl font-bold text-orange-600">{{ number_format($mostViewedPosts->avg('views') ?? 0, 0) }}</div>
                                    <div class="text-sm text-orange-700">Rata-rata Views</div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content with Calendar -->
                        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
                            <!-- Left Content (2 columns) -->
                            <div class="xl:col-span-2 space-y-6">
                                <!-- Users & Visitors -->
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Recent Registered Users -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg card">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold text-gray-800">Pengguna Terdaftar Terbaru</h3>
                                    <span class="text-sm text-gray-500">Total pengguna: {{ number_format($totalUsers ?? 0) }}</span>
                                </div>
                                <div class="space-y-3">
                                    @forelse($recentUsers ?? [] as $u)
                                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                            @php $av = $u->avatar ? asset('images/avatars/'.$u->avatar) : null; @endphp
                                            <div class="w-10 h-10 rounded-full overflow-hidden bg-gradient-to-r from-blue-500 to-indigo-600 text-white flex items-center justify-center mr-3">
                                                @if($av)
                                                    <img src="{{ $av }}" class="w-full h-full object-cover" alt="avatar">
                                                @else
                                                    {{ strtoupper(substr($u->name,0,1)) }}
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="text-sm font-semibold text-gray-800 truncate">{{ $u->name }}</div>
                                                <div class="text-xs text-gray-500 truncate">{{ $u->email }}</div>
                                            </div>
                                            <span class="text-xs px-2 py-1 rounded-full {{ $u->role==='admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">{{ ucfirst($u->role ?? 'user') }}</span>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 text-center py-4">Belum ada pengguna terdaftar.</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Recent Visitors/Guests -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg card">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-bold text-gray-800">Kunjungan Terbaru (Guest)</h3>
                                    <span class="text-sm text-gray-500">7 hari: {{ number_format($lastWeekVisitors ?? 0) }}</span>
                                </div>
                                <div class="space-y-3 max-h-96 overflow-y-auto">
                                    @forelse($recentVisitors ?? [] as $v)
                                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                            <div class="min-w-0">
                                                <div class="text-sm font-medium text-gray-800 truncate">{{ $v->page_visited }}</div>
                                                <div class="text-xs text-gray-500 truncate">{{ $v->ip_address }} · {{ \Carbon\Carbon::parse($v->visit_date)->format('d M Y H:i') }}</div>
                                            </div>
                                            <span class="ml-3 text-xs text-gray-500 hidden md:inline truncate max-w-[180px]">{{ Str::limit($v->user_agent, 50) }}</span>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 text-center py-4">Belum ada data kunjungan.</p>
                                    @endforelse
                                </div>
                            </div>
                                </div>
                                
                                <!-- Analytics Section -->
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Most Visited Pages -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg card">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-xl font-bold text-gray-800">Halaman Terpopuler</h3>
                                </div>
                                <div class="space-y-4">
                                    @forelse($mostVisitedPages as $page)
                                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 rounded-lg 
                                                    @if(str_starts_with($page->page_visited, '/berita-detail/'))
                                                        bg-blue-100 text-blue-600
                                                    @elseif(str_starts_with($page->page_visited, '/event-detail/'))
                                                        bg-green-100 text-green-600
                                                    @else
                                                        bg-indigo-100 text-indigo-600
                                                    @endif
                                                ">
                                                    @if(str_starts_with($page->page_visited, '/berita-detail/'))
                                                        <i class="fas fa-newspaper"></i>
                                                    @elseif(str_starts_with($page->page_visited, '/event-detail/'))
                                                        <i class="fas fa-calendar-alt"></i>
                                                    @elseif($page->page_visited === '/')
                                                        <i class="fas fa-home"></i>
                                                    @elseif($page->page_visited === '/galeri')
                                                        <i class="fas fa-images"></i>
                                                    @elseif($page->page_visited === '/teachers')
                                                        <i class="fas fa-chalkboard-teacher"></i>
                                                    @else
                                                        <i class="fas fa-file-alt"></i>
                                                    @endif
                                                </div>
                                                <div>
                                                    <span class="text-sm font-medium text-gray-800">{{ $page->page_name }}</span>
                                                    @if(str_starts_with($page->page_visited, '/berita-detail/') || str_starts_with($page->page_visited, '/event-detail/'))
                                                        <div class="text-xs text-gray-500 mt-1">{{ $page->page_visited }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="bg-indigo-100 text-indigo-800 text-xs font-medium px-3 py-1 rounded-full">
                                                {{ $page->total }} kunjungan
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 text-center py-4">Belum ada data kunjungan halaman.</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Most Viewed Posts -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg card">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-xl font-bold text-gray-800">Artikel Terpopuler</h3>
                                    <a href="{{ route('admin.posts') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                        Lihat Semua
                                    </a>
                                </div>
                                <div class="space-y-4">
                                    @forelse($mostViewedPosts ?? [] as $post)
                                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 rounded-lg bg-orange-100 text-orange-600">
                                                    <i class="fas {{ $post->kategori_id == 1 ? 'fa-newspaper' : 'fa-calendar-alt' }}"></i>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <span class="text-sm font-medium text-gray-800 block truncate">{{ $post->judul }}</span>
                                                    <span class="text-xs text-gray-500">{{ $post->kategori_id == 1 ? 'Berita' : 'Event' }} • {{ $post->created_at->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="bg-orange-100 text-orange-800 text-xs font-medium px-3 py-1 rounded-full">
                                                {{ number_format($post->views) }} views
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 text-center py-4">Belum ada artikel dengan views.</p>
                                    @endforelse
                                </div>
                            </div>
                            </div>
                            
                            <!-- Right Sidebar - Calendar -->
                            <div class="xl:col-span-1">
                                <!-- Interactive Calendar Widget -->
                                <div class="glass-effect rounded-2xl p-6 shadow-lg card mb-6 widget-animate">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                            <div class="p-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-3">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            Kalender
                                        </h3>
                                    </div>
                                    
                                    <!-- Calendar Header -->
                                    <div class="flex items-center justify-between mb-4">
                                        <button id="prevMonth" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-chevron-left text-gray-600"></i>
                                        </button>
                                        <h4 id="currentMonth" class="text-lg font-semibold text-gray-800"></h4>
                                        <button id="nextMonth" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-chevron-right text-gray-600"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Calendar Grid -->
                                    <div class="grid grid-cols-7 gap-1 mb-2">
                                        <div class="text-center text-xs font-medium text-gray-500 py-2">Min</div>
                                        <div class="text-center text-xs font-medium text-gray-500 py-2">Sen</div>
                                        <div class="text-center text-xs font-medium text-gray-500 py-2">Sel</div>
                                        <div class="text-center text-xs font-medium text-gray-500 py-2">Rab</div>
                                        <div class="text-center text-xs font-medium text-gray-500 py-2">Kam</div>
                                        <div class="text-center text-xs font-medium text-gray-500 py-2">Jum</div>
                                        <div class="text-center text-xs font-medium text-gray-500 py-2">Sab</div>
                                    </div>
                                    <div id="calendarDays" class="grid grid-cols-7 gap-1">
                                        <!-- Calendar days will be populated by JavaScript -->
                                    </div>
                                    
                                    <!-- Today's Info -->
                                    <div class="mt-4 p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-100">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <div class="text-sm font-medium text-blue-800">Hari ini</div>
                                                <div id="todayDate" class="text-xs text-blue-600"></div>
                                            </div>
                                            <div class="text-right">
                                                <div id="currentTime" class="text-sm font-bold text-blue-800 clock-pulse"></div>
                                                <div class="text-xs text-blue-600">WIB</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Quick Stats Widget -->
                                <div class="glass-effect rounded-2xl p-6 shadow-lg card mb-6 widget-animate" style="animation-delay: 0.2s;">
                                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-500 to-emerald-500 text-white mr-3">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                        Ringkasan Hari Ini
                                    </h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-eye text-blue-600 mr-2"></i>
                                                <span class="text-sm text-gray-700">Kunjungan</span>
                                            </div>
                                            <span class="font-bold text-blue-600">{{ $todayVisitors ?? 0 }}</span>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-newspaper text-green-600 mr-2"></i>
                                                <span class="text-sm text-gray-700">Artikel Baru</span>
                                            </div>
                                            <span class="font-bold text-green-600">{{ $todayPosts ?? 0 }}</span>
                                        </div>
                                        <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-users text-purple-600 mr-2"></i>
                                                <span class="text-sm text-gray-700">User Baru</span>
                                            </div>
                                            <span class="font-bold text-purple-600">{{ $todayUsers ?? 0 }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Weather Widget (Optional) -->
                                <div class="glass-effect rounded-2xl p-6 shadow-lg card widget-animate" style="animation-delay: 0.4s;">
                                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-yellow-500 to-orange-500 text-white mr-3">
                                            <i class="fas fa-sun"></i>
                                        </div>
                                        Cuaca Bogor
                                    </h3>
                                    <div class="text-center">
                                        <div class="text-3xl mb-2">☀️</div>
                                        <div class="text-2xl font-bold text-gray-800">28°C</div>
                                        <div class="text-sm text-gray-600">Cerah Berawan</div>
                                        <div class="text-xs text-gray-500 mt-2">Kelembaban: 65%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Content -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Recent Posts -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg card">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-xl font-bold text-gray-800">Berita & Event Terbaru</h3>
                                    <a href="{{ route('admin.posts') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                        Lihat Semua
                                    </a>
                                </div>
                                <div class="space-y-4">
                                    @forelse($recentPosts as $post)
                                        <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                            <div class="flex-shrink-0 w-16 h-16 bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                                                @if($post->gambar)
                                                    <img src="{{ asset('images/posts/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                                        <i class="fas fa-image text-gray-300"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-sm font-medium text-gray-800 truncate">{{ $post->judul }}</h4>
                                                <div class="flex items-center justify-between mt-1">
                                                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                                    <div class="flex items-center space-x-1 text-xs text-gray-500">
                                                        <i class="fas fa-eye"></i>
                                                        <span>{{ number_format($post->views ?? 0) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 text-center py-4">Tidak ada berita atau event terbaru.</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Recent Galleries -->
                            <div class="glass-effect rounded-2xl p-6 shadow-lg card">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-xl font-bold text-gray-800">Galeri Terbaru</h3>
                                    <a href="{{ route('admin.galleries') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                        Lihat Semua
                                    </a>
                                </div>
                                <div class="grid grid-cols-3 gap-3 mt-4">
                                    @forelse($recentGalleries as $gallery)
                                        <div class="aspect-square rounded-lg overflow-hidden bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
                                            @if($gallery->fotos->count() > 0)
                                                <img src="{{ asset('images/gallery/' . $gallery->fotos->first()->file) }}" alt="{{ $gallery->judul }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-gray-50">
                                                    <i class="fas fa-images text-2xl text-gray-300"></i>
                                                </div>
                                            @endif
                                        </div>
                                    @empty
                                        <div class="col-span-3 text-center py-6">
                                            <i class="fas fa-images text-3xl text-gray-300 mb-2"></i>
                                            <p class="text-sm text-gray-500">Tidak ada galeri terbaru</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </main>
        </div>
    </div>
    
    @stack('scripts')
    
    <!-- Most Read Articles Chart -->
    @isset($mostViewedPosts)
    <script>
        // Most Read Articles Chart
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('mostReadChart');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');

            // Prepare data from PHP
            const mostReadData = @json($mostViewedPosts ?? []);
            const labels = mostReadData.map(item => {
                // Truncate long titles
                return item.judul.length > 20 ? item.judul.substring(0, 20) + '...' : item.judul;
            });
            const views = mostReadData.map(item => item.views || 0);
            const categories = mostReadData.map(item => item.kategori_id);

            // Generate colors based on category
            const backgroundColors = categories.map(cat => 
                cat === 1 ? 'rgba(59, 130, 246, 0.8)' : 'rgba(34, 197, 94, 0.8)'
            );
            const borderColors = categories.map(cat => 
                cat === 1 ? 'rgba(59, 130, 246, 1)' : 'rgba(34, 197, 94, 1)'
            );

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Views',
                        data: views,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.95)',
                            titleColor: '#1f2937',
                            bodyColor: '#4b5563',
                            borderColor: '#e5e7eb',
                            borderWidth: 1,
                            padding: 12,
                            boxPadding: 6,
                            usePointStyle: true,
                            callbacks: {
                                title: function(context) {
                                    const fullTitle = mostReadData[context[0].dataIndex].judul;
                                    return fullTitle.length > 40 ? fullTitle.substring(0, 40) + '...' : fullTitle;
                                },
                                label: function(context) {
                                    const category = categories[context.dataIndex] === 1 ? 'Berita' : 'Event';
                                    return `${category}: ${context.parsed.y.toLocaleString()} views`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                maxRotation: 45,
                                minRotation: 0
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeOutQuart'
                    }
                }
            });
        });
    </script>
    @endisset
    
    @isset($visitorChartData)
    <script>
        // Visitor Chart (render only when data and canvas exist)
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('visitorChart');
            if (!canvas) return; // No chart canvas on this page
            const ctx = canvas.getContext('2d');

            // Prepare data from PHP
            const visitorData = @json($visitorChartData);
            const labels = visitorData.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('id-ID', { weekday: 'short', day: 'numeric' });
            });
            const data = visitorData.map(item => item.count);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Pengunjung',
                        data: data,
                        backgroundColor: 'rgba(79, 70, 229, 0.2)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true,
                        pointBackgroundColor: 'rgba(79, 70, 229, 1)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.9)',
                            titleColor: '#1e3c72',
                            bodyColor: '#4b5563',
                            borderColor: '#e5e7eb',
                            borderWidth: 1,
                            padding: 12,
                            boxPadding: 6,
                            usePointStyle: true,
                            callbacks: {
                                label: function(context) {
                                    return `Pengunjung: ${context.parsed.y}`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endisset
    
    <script>
        // Interactive Calendar Functionality
        class AdminCalendar {
            constructor() {
                this.currentDate = new Date();
                this.today = new Date();
                this.monthNames = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];
                this.dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                this.init();
            }

            init() {
                this.bindEvents();
                this.renderCalendar();
                this.updateTodayInfo();
                this.startClock();
            }

            bindEvents() {
                const prevBtn = document.getElementById('prevMonth');
                const nextBtn = document.getElementById('nextMonth');
                
                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() - 1);
                        this.renderCalendar();
                    });
                }
                
                if (nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() + 1);
                        this.renderCalendar();
                    });
                }
            }

            renderCalendar() {
                const monthElement = document.getElementById('currentMonth');
                const daysElement = document.getElementById('calendarDays');
                
                if (!monthElement || !daysElement) return;

                // Update month/year display
                monthElement.textContent = `${this.monthNames[this.currentDate.getMonth()]} ${this.currentDate.getFullYear()}`;

                // Clear previous days
                daysElement.innerHTML = '';

                // Get first day of month and number of days
                const firstDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
                const lastDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
                const startDate = new Date(firstDay);
                startDate.setDate(startDate.getDate() - firstDay.getDay());

                // Generate calendar days
                for (let i = 0; i < 42; i++) {
                    const date = new Date(startDate);
                    date.setDate(startDate.getDate() + i);
                    
                    const dayElement = document.createElement('div');
                    dayElement.className = 'text-center py-2 text-sm cursor-pointer rounded-lg transition-all duration-200';
                    dayElement.textContent = date.getDate();

                    // Style different types of days
                    if (date.getMonth() !== this.currentDate.getMonth()) {
                        dayElement.className += ' text-gray-300 hover:bg-gray-100';
                    } else if (this.isSameDay(date, this.today)) {
                        dayElement.className += ' bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold shadow-lg transform scale-105';
                    } else if (date.getDay() === 0 || date.getDay() === 6) {
                        dayElement.className += ' text-red-600 hover:bg-red-50 font-medium';
                    } else {
                        dayElement.className += ' text-gray-700 hover:bg-blue-50 hover:text-blue-600';
                    }

                    // Add click event
                    dayElement.addEventListener('click', () => {
                        if (date.getMonth() === this.currentDate.getMonth()) {
                            this.selectDate(date);
                        }
                    });

                    daysElement.appendChild(dayElement);
                }
            }

            selectDate(date) {
                // Remove previous selection
                document.querySelectorAll('#calendarDays > div').forEach(day => {
                    day.classList.remove('ring-2', 'ring-blue-400', 'bg-blue-100');
                });

                // Add selection to clicked date (if not today)
                if (!this.isSameDay(date, this.today)) {
                    event.target.classList.add('ring-2', 'ring-blue-400', 'bg-blue-100');
                }
            }

            isSameDay(date1, date2) {
                return date1.getDate() === date2.getDate() &&
                       date1.getMonth() === date2.getMonth() &&
                       date1.getFullYear() === date2.getFullYear();
            }

            updateTodayInfo() {
                const todayElement = document.getElementById('todayDate');
                if (todayElement) {
                    const options = { 
                        weekday: 'long', 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric' 
                    };
                    todayElement.textContent = this.today.toLocaleDateString('id-ID', options);
                }
            }

            startClock() {
                const updateTime = () => {
                    const timeElement = document.getElementById('currentTime');
                    if (timeElement) {
                        const now = new Date();
                        const timeString = now.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit'
                        });
                        timeElement.textContent = timeString;
                    }
                };
                
                updateTime();
                setInterval(updateTime, 1000);
            }
        }

        // Initialize calendar when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize calendar
            new AdminCalendar();
            
            // Close dropdown on page navigation
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
