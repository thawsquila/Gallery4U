<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gallery4U - Galeri</title>
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#66B1F2',
                        'primary-dark': '#4A90E2',
                        'primary-light': '#B3D9FF'
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
          animation: fadeInUp 1s ease-out forwards;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

        /* Professional Lightbox Styles */
        .gallery-lightbox {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .gallery-lightbox.active { 
            display: flex; 
            opacity: 1;
        }
        .lightbox-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: lightboxZoomIn 0.4s ease-out;
        }
        .lightbox-image { 
            max-width: 100%; 
            max-height: 80vh; 
            object-fit: contain;
            border-radius: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        }
        .lightbox-info {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-top: 1rem;
            text-align: center;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            z-index: 10001;
            background: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .lightbox-close:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
        }
        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 24px;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.6);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10001;
        }
        .lightbox-nav:hover {
            background: rgba(0, 0, 0, 0.8);
            transform: translateY(-50%) scale(1.1);
        }
        .lightbox-prev { left: 30px; }
        .lightbox-next { right: 30px; }
        .lightbox-thumbnails {
            display: flex;
            gap: 8px;
            margin-top: 1rem;
            max-width: 90vw;
            overflow-x: auto;
            padding: 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }
        .lightbox-thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            opacity: 0.6;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .lightbox-thumbnail.active {
            opacity: 1;
            border-color: #66B1F2;
            transform: scale(1.1);
        }
        .lightbox-thumbnail:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }
        @keyframes lightboxZoomIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .lightbox-close {
                top: 10px;
                right: 15px;
                width: 40px;
                height: 40px;
                font-size: 24px;
            }
            .lightbox-nav {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
            .lightbox-prev { left: 15px; }
            .lightbox-next { right: 15px; }
            .lightbox-thumbnails {
                max-width: 95vw;
                gap: 6px;
            }
            .lightbox-thumbnail {
                width: 50px;
                height: 50px;
            }
            .lightbox-info {
                margin-top: 0.5rem;
                padding: 0.75rem 1rem;
            }
        }

        /* Enhanced Mobile Responsiveness */
        @media (max-width: 640px) {
            /* Navbar mobile fixes */
            nav {
                width: 98% !important;
                top: 4px !important;
            }
            
            /* Hero section mobile */
            .hero-title {
                font-size: 2.5rem !important;
                line-height: 1.2 !important;
            }
            
            /* Main content mobile */
            .max-w-7xl {
                padding-left: 0.875rem !important;
                padding-right: 0.875rem !important;
            }
            
            /* Gallery cards mobile */
            .gallery-section > div {
                grid-template-columns: 1fr !important;
                gap: 1rem !important;
            }
            
            /* Filter buttons mobile: make chips horizontally scrollable */
            .filter-buttons {
                display: flex !important;
                flex-wrap: nowrap !important;
                overflow-x: auto !important;
                gap: 0.5rem !important;
                padding-bottom: 0.25rem !important;
                -ms-overflow-style: none; /* IE/Edge */
                scrollbar-width: none; /* Firefox */
            }
            .filter-buttons::-webkit-scrollbar { display: none; }
            .filter-buttons button {
                font-size: 0.875rem !important;
                padding: 0.5rem 0.9rem !important;
                white-space: nowrap !important;
                flex: 0 0 auto !important;
            }
            
            /* View switcher mobile */
            .view-switcher {
                flex-direction: column !important;
                gap: 0.75rem !important;
                align-items: center !important;
            }
            .view-switcher > div:first-child {
                text-align: center !important;
                width: 100% !important;
            }
            .view-switcher .inline-flex {
                width: 100% !important;
                max-width: 340px !important;
                justify-content: space-between !important;
            }
            .view-switcher .inline-flex > button {
                flex: 1 1 0 !important;
                min-width: 0 !important;
                text-align: center !important;
            }
            
            /* Gallery item mobile */
            article {
                margin-bottom: 1rem !important;
            }
            
            /* Meta info mobile */
            .meta-info {
                flex-direction: column !important;
                gap: 0.5rem !important;
                align-items: flex-start !important;
            }
            
            .meta-actions {
                flex-wrap: wrap !important;
                gap: 0.75rem !important;
            }
            
            /* Search bar mobile */
            .search-container {
                flex-direction: column !important;
                gap: 0.75rem !important;
            }
            
            .search-container input {
                width: 100% !important;
            }
            
            /* Footer mobile */
            footer .grid {
                grid-template-columns: 1fr !important;
                gap: 2rem !important;
            }
            
            /* Mobile menu button improvements */
            .mobile-menu-btn {
                min-width: 44px !important;
                min-height: 44px !important;
                padding: 8px !important;
                touch-action: manipulation !important;
                -webkit-tap-highlight-color: transparent !important;
            }
            
            .mobile-menu {
                animation: slideDown 0.3s ease-out !important;
            }
            
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        }

        @media (max-width: 480px) {
            /* Extra small screens */
            .hero-title {
                font-size: 2rem !important;
            }
            
            .hero-subtitle {
                font-size: 1rem !important;
            }
            
            /* Padding adjustments */
            .px-4 {
                padding-left: 0.75rem !important;
                padding-right: 0.75rem !important;
            }
            
            /* Button sizes */
            .btn-mobile {
                padding: 0.5rem 1rem !important;
                font-size: 0.875rem !important;
            }
        }
        
        /* Loading animation for images */
        .lightbox-image {
            transition: opacity 0.3s ease;
        }
        .lightbox-image.loading {
            opacity: 0.5;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * {
            font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-white font-sans">
    <!-- Floating Navbar -->
    <nav class="fixed top-6 left-1/2 transform -translate-x-1/2 w-[95%] md:w-[90%] bg-white/90 shadow-2xl rounded-xl border border-gray-200 z-50 backdrop-blur-xl ring-1 ring-gray-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('guest.home') }}" class="flex-shrink-0 flex items-center">
                        <img class="h-10 w-auto" src="{{ asset('images/favicon.svg') }}" alt="SMKN 4 Logo">
                        <span class="ml-2 text-xl font-bold text-gray-800">Gallery4U</span>
                    </a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" class="mobile-menu-btn inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="hidden md:flex items-center gap-4">
                    <div class="flex items-center gap-1 bg-white/80 rounded-full px-2 py-1 ring-1 ring-gray-200/70">
                        <a href="/" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Beranda</a>
                        <a href="{{ route('guest.teachers') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Tenaga Pendidik</a>
                        <a href="{{ route('guest.berita') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Berita</a>
                        <a href="{{ route('guest.event') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Event</a>
                        <a href="{{ route('guest.galeri') }}" class="px-4 py-2 rounded-full font-semibold bg-blue-50 text-blue-600">Galeri</a>
                        <a href="{{ route('guest.kontak') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Kontak</a>
                    </div>
                    @guest
                    <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="px-5 py-2 rounded-full text-gray-700 bg-white hover:bg-gray-100 ring-1 ring-gray-200 font-semibold transition">Login</a>
                    <a href="{{ route('user.register', ['redirect' => request()->getRequestUri()]) }}" class="px-6 py-2 rounded-full bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] text-white font-bold shadow-[0_10px_25px_-10px_rgba(59,130,246,0.6)] hover:opacity-95 transition">Daftar</a>
                    @endguest
                    @auth
                    <a href="{{ route('user.profile') }}" title="Profil Saya" class="mr-2 inline-flex items-center justify-center w-9 h-9 rounded-full ring-1 ring-gray-200 overflow-hidden bg-white">
                      @php $av = auth()->user()->avatar ? asset('images/avatars/'.auth()->user()->avatar) : null; @endphp
                      @if($av)
                        <img src="{{ $av }}" alt="Avatar" class="w-full h-full object-cover">
                      @else
                        <i class="fas fa-user text-gray-600"></i>
                      @endif
                    </a>
                    <span class="text-sm text-gray-600">Hi, <span class="font-semibold">{{ auth()->user()->name }}</span></span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="ml-1 px-4 py-2 text-sm rounded-full ring-1 ring-gray-200 hover:bg-gray-100">Keluar</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state -->
        <div class="mobile-menu hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white/95 backdrop-blur-xl rounded-b-xl border-t border-gray-200">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Beranda</a>
                <a href="{{ route('guest.teachers') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Tenaga Pendidik</a>
                <a href="{{ route('guest.berita') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Berita</a>
                <a href="{{ route('guest.event') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Event</a>
                <a href="{{ route('guest.galeri') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-blue-50 text-blue-600">Galeri</a>
                <a href="{{ route('guest.kontak') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Kontak</a>
                
                <div class="border-t border-gray-200 pt-3 mt-3">
                    @guest
                    <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Login</a>
                    <a href="{{ route('user.register', ['redirect' => request()->getRequestUri()]) }}" class="block px-3 py-2 rounded-md text-base font-medium bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] text-white text-center mt-2">Daftar</a>
                    @endguest
                    @auth
                    <div class="flex items-center px-3 py-2">
                        <div class="flex-shrink-0">
                            @php $av = auth()->user()->avatar ? asset('images/avatars/'.auth()->user()->avatar) : null; @endphp
                            @if($av)
                                <img class="h-8 w-8 rounded-full" src="{{ $av }}" alt="Avatar">
                            @else
                                <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600"></i>
                                </div>
                            @endif
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">{{ auth()->user()->name }}</div>
                        </div>
                    </div>
                    <a href="{{ route('user.profile') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Profil</a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-1">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Keluar</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Header (match Berita hero style) -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
        <!-- Background with gradient matching hero section -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
        <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-[#66B1F2]/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-[#4A90E2]/10 rounded-full blur-2xl animate-bounce-custom"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white/5 rounded-full blur-lg animate-float"></div>
            <div class="absolute top-20 right-20 w-20 h-20 bg-[#B3D9FF]/15 rounded-full blur-md animate-float delay-200"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8" style="margin-top: 80px;">
            <div class="max-w-4xl mx-auto">
                <div class="relative animate-fade-in-up">
                    <h1 class="hero-title text-5xl lg:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-2xl">
                        <span class="bg-gradient-to-r from-[#66B1F2] via-white to-[#4A90E2] bg-clip-text text-transparent">Galeri</span>
                        <br>
                        <span class="text-white">Foto</span>
                    </h1>
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#66B1F2]/30 to-[#4A90E2]/30 blur-xl opacity-40 rounded-xl"></div>
                </div>
                <p class="hero-subtitle text-xl lg:text-2xl text-white/90 leading-relaxed mb-2 max-w-3xl mx-auto animate-fade-in-up delay-400 drop-shadow-lg font-medium">
                    Koleksi momen berharga dan kegiatan terbaik di SMKN 4 Bogor
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white relative" x-data="{ active: 'Semua', view: 'grid' }">
        <div class="relative z-10">
        @php 
            $hasGaleri = false; 
            $availableCategories = collect($galeriByKategori)
                ->filter(fn($items) => $items && $items->isNotEmpty())
                ->keys();

            // Kumpulkan tahun unik
            $years = collect();
            foreach ($galeriByKategori as $__k => $__items) {
                if ($__items) {
                    foreach ($__items as $__it) { $years->push($__it->created_at?->format('Y')); }
                }
            }
            $years = $years->filter()->unique()->sortDesc();

            // Keyword sederhana untuk deteksi ekstrakurikuler dan jurusan dari judul/deskripsi
            $ekskulOptions = ['','Paskibra','Pramuka','PMR','Rohis','Futsal','Basket','Paduan Suara','Tari','KIR'];
            $jurusanOptions = ['','PPLG','TKJ','TPFL','Otomotif'];
        @endphp

        <!-- Pencarian -->
        <div class="mb-6">
            <div class="search-container bg-white rounded-xl shadow p-4 flex items-center justify-between gap-4">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input id="gallerySearch" type="text" placeholder="Cari nama kegiatan... (contoh: Lomba Paskibra 2023)" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary/60 focus:border-primary" />
                </div>
                <a href="{{ route('guest.home') }}#galeri" class="inline-flex items-center text-sm text-gray-600 hover:text-primary">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- Filter Bar (Kategori) -->
        <div class="filter-buttons mb-6 flex flex-wrap items-center gap-3">
            <button @click="active='Semua'"
                    :class="active==='Semua' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                    class="px-4 py-2 rounded-full border border-gray-300 shadow-sm transition-colors">Semua</button>
            @foreach($availableCategories as $cat)
                <button @click="active='{{ $cat }}'"
                        :class="active==='{{ $cat }}' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-4 py-2 rounded-full border border-gray-300 shadow-sm transition-colors">{{ $cat }}</button>
            @endforeach
        </div>
        
        <!-- Segmented Control: View Switcher (Grid / Masonry / List) -->
        <div class="view-switcher mb-10 flex items-center justify-between gap-4 flex-wrap">
            <div class="text-sm text-gray-600">Tampilan: <span class="font-semibold" x-text="view.toUpperCase()"></span></div>
            <div class="inline-flex rounded-full ring-1 ring-gray-300 bg-white overflow-hidden shadow-sm">
                <button @click="view='grid'" :class="view==='grid' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100'" class="px-4 py-2 text-sm font-semibold flex items-center gap-2">
                    <i class="fas fa-grip"></i><span class="hidden sm:inline">Grid</span>
                </button>
                <button @click="view='masonry'" :class="view==='masonry' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100'" class="px-4 py-2 text-sm font-semibold flex items-center gap-2">
                    <i class="fas fa-border-all"></i><span class="hidden sm:inline">Masonry</span>
                </button>
                <button @click="view='list'" :class="view==='list' ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100'" class="px-4 py-2 text-sm font-semibold flex items-center gap-2">
                    <i class="fas fa-list"></i><span class="hidden sm:inline">List</span>
                </button>
            </div>
        </div>
        @foreach($galeriByKategori as $kategori => $galeriItems)
            @if($galeriItems && $galeriItems->isNotEmpty())
                @php $hasGaleri = true; @endphp
                <section class="mb-16 animate-fade-in-up delay-300 gallery-section" data-category="{{ strtolower($kategori) }}" x-show="active==='Semua' || active==='{{ $kategori }}'" x-transition.opacity>
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center">
                            <span class="w-2 h-6 bg-[#2E5A63] rounded-full mr-3"></span>
                            {{ $kategori }}
                        </h2>
                    </div>
                    <div 
                        :class="{
                            'grid md:grid-cols-2 lg:grid-cols-3 gap-8': view==='grid',
                            'columns-1 md:columns-2 lg:columns-3 gap-6 [column-fill:_balance]': view==='masonry',
                            'space-y-4': view==='list'
                        }">
                        @foreach($galeriItems as $index => $item)
                            @php
                                $year = $item->created_at?->format('Y');
                                $hay = strtolower(($item->judul ?? '') . ' ' . strip_tags($item->deskripsi ?? ''));
                                $detEks = '';
                                foreach ($ekskulOptions as $__e) { if ($__e && str_contains($hay, strtolower($__e))) { $detEks = $__e; break; } }
                                $detJur = '';
                                foreach ($jurusanOptions as $__j) { if ($__j && str_contains($hay, strtolower($__j))) { $detJur = $__j; break; } }
                            @endphp
                            <article 
                                :class="{
                                    'bg-white rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-500 border border-gray-200': true,
                                    'break-inside-avoid mb-6': view==='masonry',
                                    'flex gap-4 p-3': view==='list'
                                }"
                                data-year="{{ $year }}"
                                data-title="{{ strtolower($item->judul ?? '') }}"
                                data-category="{{ strtolower($kategori) }}"
                                data-ekskul="{{ strtolower($detEks) }}"
                                data-jurusan="{{ strtolower($detJur) }}"
                                style="animation: scaleIn 0.8s ease-out forwards; animation-delay: {{ $index * 0.08 }}s">
                                <!-- Image -->
                                <div 
                                    :class="{
                                        'h-48 overflow-hidden relative group': view!=='list',
                                        'w-44 h-32 sm:w-48 sm:h-36 overflow-hidden relative group rounded-lg flex-none': view==='list'
                                    }">
                                    @if($item->fotos && $item->fotos->isNotEmpty())
                                        <img src="{{ asset('images/gallery/' . $item->fotos->first()->file) }}" alt="{{ $item->judul ?? 'Galeri' }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        <!-- Lightbox Preview Button -->
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <button 
                                                onclick="openGalleryLightbox({{ $item->id }}, '{{ $item->judul ?? 'Galeri' }}', {{ json_encode($item->fotos->pluck('file')) }})"
                                                class="bg-white/90 hover:bg-white text-gray-800 px-4 py-2 rounded-full font-semibold shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                                                <i class="fas fa-search-plus"></i>
                                                <span class="hidden sm:inline">Preview</span>
                                            </button>
                                        </div>
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-primary-light to-primary flex items-center justify-center animate-gradient">
                                            <i class="fas fa-images text-white text-4xl animate-float"></i>
                                        </div>
                                    @endif
                                    <!-- Overlay badge: total photos -->
                                    <div class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <i class="fas fa-image mr-1"></i>{{ $item->fotos ? $item->fotos->count() : 0 }} foto
                                    </div>
                                </div>

                                <!-- Content -->
                                <div :class="view==='list' ? 'py-3 pr-3 flex-1' : 'p-6'">
                                    <!-- Meta: Date/Category + Interactions (Like, Comment, Share) -->
                                    @php
                                        $likesCount = isset($item->likes_count) ? $item->likes_count : ($item->likes->count() ?? 0);
                                        $commentsCount = isset($item->comments_count) ? $item->comments_count : ($item->comments->count() ?? 0);
                                        $shareUrl = route('guest.detail-galeri', $item->id);
                                        $shareTitle = $item->judul ?? 'Galeri SMKN 4';
                                    @endphp
                                    <div class="meta-info flex items-center justify-between gap-3 mb-3 text-sm text-gray-600">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="inline-flex items-center"><i class="fas fa-calendar mr-2 text-primary"></i>{{ $item->created_at->format('d M Y') }}</span>
                                            <span class="mx-1 hidden sm:inline">•</span>
                                            <span class="bg-gradient-to-r from-primary-light to-primary text-white px-3 py-1 rounded-full text-xs font-medium inline-flex items-center">
                                                <i class="fas fa-images mr-1"></i>{{ $kategori }}
                                            </span>
                                        </div>
                                        <div class="meta-actions flex items-center gap-4 shrink-0 relative">
                                            @auth
                                            @php
                                                $userLiked = $item->likes->where('user_id', auth()->id())->isNotEmpty();
                                            @endphp
                                            <button 
                                                class="inline-flex items-center hover:text-red-600 transition-colors like-btn" 
                                                title="{{ $userLiked ? 'Batalkan suka' : 'Suka' }}"
                                                data-gallery-id="{{ $item->id }}"
                                                data-liked="{{ $userLiked ? '1' : '0' }}">
                                                <i class="{{ $userLiked ? 'fas' : 'far' }} fa-heart mr-1 text-red-500"></i>
                                                <span class="like-count">{{ number_format($likesCount) }}</span>
                                            </button>
                                            @else
                                            <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="inline-flex items-center hover:text-red-600 transition-colors" title="Login untuk menyukai">
                                                <i class="far fa-heart mr-1 text-red-500"></i>{{ number_format($likesCount) }}
                                            </a>
                                            @endauth
                                            <span class="inline-flex items-center" title="Komentar">
                                                <i class="far fa-comment mr-1 text-gray-500"></i>{{ number_format($commentsCount) }}
                                            </span>
                                            <span class="inline-flex items-center" title="Views">
                                                <i class="fas fa-eye mr-1 text-blue-500"></i>{{ number_format($item->views ?? 0) }}
                                            </span>
                                            <!-- Share popover -->
                                            <div class="relative">
                                                <button type="button" class="inline-flex items-center text-gray-700 hover:text-primary transition" title="Bagikan" onclick="toggleShareMenu('share-menu-{{ $item->id }}')">
                                                    <i class="fas fa-share-alt"></i>
                                                </button>
                                                <div id="share-menu-{{ $item->id }}" class="hidden absolute right-0 mt-2 w-44 bg-white border rounded-lg shadow z-20 p-2">
                                                    <a href="https://wa.me/?text={{ urlencode(($shareTitle) . ' ' . $shareUrl) }}" target="_blank" class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-50 text-sm">
                                                        <i class="fab fa-whatsapp text-blue-500"></i> WhatsApp
                                                    </a>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank" class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-50 text-sm">
                                                        <i class="fab fa-facebook text-blue-600"></i> Facebook
                                                    </a>
                                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode($shareTitle) }}" target="_blank" class="flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-50 text-sm">
                                                        <i class="fab fa-twitter text-sky-500"></i> Twitter
                                                    </a>
                                                    <button type="button" class="w-full flex items-center gap-2 px-2 py-1.5 rounded hover:bg-gray-50 text-sm" onclick="shareGallery('{{ $shareUrl }}', '{{ addslashes($shareTitle) }}')">
                                                        <i class="fas fa-mobile-alt text-gray-500"></i> Share via device
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Download gallery -->
                                            <a href="{{ route('guest.galeri.download', $item->id) }}" class="inline-flex items-center text-gray-700 hover:text-primary transition" title="Unduh Galeri">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <h3 :class="view==='list' ? 'text-lg font-bold text-gray-800 mb-1 line-clamp-1 hover:text-primary transition-colors' : 'text-xl font-bold text-gray-800 mb-3 line-clamp-2 hover:text-primary transition-colors'">
                                        <a href="{{ route('guest.detail-galeri', $item->id) }}" class="gallery-link" data-gallery-id="{{ $item->id }}">{{ $item->judul ?? 'Galeri' }}</a>
                                    </h3>

                                    <!-- Excerpt -->
                                    @if($item->deskripsi)
                                        <p :class="view==='list' ? 'text-gray-600 mb-3 line-clamp-2' : 'text-gray-600 mb-4 line-clamp-3'">{{ Str::limit(strip_tags($item->deskripsi), 120) }}</p>
                                    @else
                                        <p :class="view==='list' ? 'text-gray-600 mb-3 line-clamp-2' : 'text-gray-600 mb-4 line-clamp-3'">Lihat dokumentasi lengkap dari {{ $kategori }}.</p>
                                    @endif

                                    <!-- Button -->
                                    <a href="{{ route('guest.detail-galeri', $item->id) }}" class="gallery-link" data-gallery-id="{{ $item->id }}" :class="view==='list' ? 'group inline-flex items-center bg-gradient-to-r from-primary to-primary-dark text-white px-4 py-2 rounded-full text-sm font-semibold hover:from-primary-dark hover:to-primary hover-glow transition-all duration-300' : 'group inline-flex items-center bg-gradient-to-r from-primary to-primary-dark text-white px-6 py-3 rounded-full font-semibold hover:from-primary-dark hover:to-primary hover-glow transition-all duration-300 transform hover:scale-105'">
                                        <span>Lihat Detail</span>
                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        @endforeach

        @if(!$hasGaleri)
            <div class="text-center py-16">
                <div class="text-2xl text-gray-800">Belum ada galeri yang tersedia</div>
            </div>
        @endif
        </div>
    </main>

    <!-- Professional Gallery Lightbox -->
    <div id="gallery-lightbox" class="gallery-lightbox">
        <span class="lightbox-close" onclick="closeGalleryLightbox()">&times;</span>
        <div class="lightbox-content">
            <img id="lightbox-main-image" class="lightbox-image" src="" alt="Gallery Image">
            <div class="lightbox-info">
                <h3 id="lightbox-title" class="text-lg font-bold text-gray-800 mb-1">Gallery Title</h3>
                <p id="lightbox-counter" class="text-sm text-gray-600">1 / 1</p>
            </div>
            <div id="lightbox-thumbnails" class="lightbox-thumbnails">
                <!-- Thumbnails will be populated by JavaScript -->
            </div>
        </div>
        <div class="lightbox-nav lightbox-prev" onclick="navigateGalleryLightbox(-1)">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="lightbox-nav lightbox-next" onclick="navigateGalleryLightbox(1)">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>

    <!-- Social Media & Footer -->
    <footer id="kontak" class="bg-[#2D343B] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-6">
                    <img src="/images/favicon.svg" alt="Logo Gallery4U" class="w-10 h-10 mr-3">
                    <span class="font-bold text-xl">Gallery4U</span>
                    </div>
                    <p class="text-gray-300 mb-6">Berkarya Menuju Masa Depan Gemilang. Menjadi SMK unggul yang menghasilkan lulusan berkarakter dan kompeten.</p>
                    
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/smkn4kotabogor/" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@smknegeri4bogor905" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://www.tiktok.com/@smkn4kotabogor" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Menu Utama</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('guest.home') }}#home" class="text-gray-300 hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="{{ route('guest.home') }}#profil" class="text-gray-300 hover:text-primary transition-colors">Profil Sekolah</a></li>
                        <li><a href="{{ route('guest.home') }}#jurusan" class="text-gray-300 hover:text-primary transition-colors">Jurusan</a></li>
                        <li><a href="{{ route('guest.teachers') }}" class="text-gray-300 hover:text-primary transition-colors">Tenaga Pendidik</a></li>
                        <li><a href="{{ route('guest.berita') }}" class="text-gray-300 hover:text-primary transition-colors">Berita</a></li>
                        <li><a href="{{ route('guest.event') }}" class="text-gray-300 hover:text-primary transition-colors">Event</a></li>
                        <li><a href="{{ route('guest.galeri') }}" class="text-gray-300 hover:text-primary transition-colors">Galeri</a></li>
                        <li><a href="{{ route('guest.kontak') }}" class="text-gray-300 hover:text-primary transition-colors">Kontak</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Jurusan</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('guest.jurusan') }}" class="text-gray-300 hover:text-primary transition-colors">Semua Jurusan</a></li>
                    </ul>
                    <!-- Floating style quick buttons -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        <button type="button" onclick="openMajor('pplg')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">PPLG</button>
                        <button type="button" onclick="openMajor('tkj')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">TKJ</button>
                        <button type="button" onclick="openMajor('tpfl')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">TPFL</button>
                        <button type="button" onclick="openMajor('otomotif')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">Otomotif</button>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Ikuti Kami</h3>
                    <p class="text-gray-300 mb-4">Dapatkan update terbaru dari SMK Negeri 4</p>
                    <div class="space-y-3">
                        <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-facebook-f mr-3"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="https://www.instagram.com/smkn4kotabogor/" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-instagram mr-3"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="https://www.youtube.com/@smknegeri4bogor905" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-youtube mr-3"></i>
                            <span>YouTube</span>
                        </a>
                        <a href="https://www.tiktok.com/@smkn4kotabogor" class="flex items-center text-gray-300 hover:text-primary transition-colors">
                            <i class="fab fa-tiktok mr-3"></i>
                            <span>TikTok</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
            <p class="text-gray-400">&copy; 2025 <span class="font-semibold text-white">Gallery4U</span> by 
            <span class="text-blue-400 font-semibold">Cero Tech</span>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Jurusan Detail Modal -->
    <div id="majorModal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/60" onclick="closeMajor()"></div>
        <div class="relative z-[101] max-w-3xl mx-auto mt-16 bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-[#66B1F2] via-[#4A90E2] to-[#254C6B] p-6 text-white flex items-center gap-4">
                <img id="majorImage" src="{{ asset('images/LOGO PPLG.png') }}" alt="Logo Jurusan" class="w-16 h-16 object-contain rounded-xl bg-white/10 p-2">
                <div class="flex-1">
                    <h3 id="majorTitle" class="text-2xl font-bold">Judul Jurusan</h3>
                    <p class="text-blue-100 text-sm">Kode: <span id="majorCode">-</span></p>
                </div>
                <button type="button" onclick="closeMajor()" class="text-white/90 hover:text-white"><i class="fas fa-times text-2xl"></i></button>
            </div>
            <div class="p-6">
                <p id="majorDesc" class="text-gray-700 mb-4">Deskripsi jurusan...</p>
                <ul id="majorBullets" class="space-y-2 text-gray-700"></ul>
            </div>
        </div>
    </div>

    <script>
        // Professional Gallery Lightbox Functionality
        let currentGalleryData = {
            id: null,
            title: '',
            photos: [],
            currentIndex: 0
        };

        function openGalleryLightbox(galleryId, title, photos) {
            if (!photos || photos.length === 0) return;
            
            currentGalleryData = {
                id: galleryId,
                title: title,
                photos: photos,
                currentIndex: 0
            };
            
            updateLightboxContent();
            document.getElementById('gallery-lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeGalleryLightbox() {
            document.getElementById('gallery-lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function navigateGalleryLightbox(direction) {
            const totalPhotos = currentGalleryData.photos.length;
            currentGalleryData.currentIndex = (currentGalleryData.currentIndex + direction + totalPhotos) % totalPhotos;
            updateLightboxContent();
        }

        function goToLightboxImage(index) {
            currentGalleryData.currentIndex = index;
            updateLightboxContent();
        }

        function updateLightboxContent() {
            const { photos, currentIndex, title } = currentGalleryData;
            const currentPhoto = photos[currentIndex];
            const basePath = '{{ asset("images/gallery/") }}';
            
            // Update main image with loading effect
            const mainImage = document.getElementById('lightbox-main-image');
            mainImage.classList.add('loading');
            
            // Preload image for smooth transition
            const newImage = new Image();
            newImage.onload = function() {
                mainImage.src = this.src;
                mainImage.alt = `${title} - Foto ${currentIndex + 1}`;
                mainImage.classList.remove('loading');
            };
            newImage.src = `${basePath}/${currentPhoto}`;
            
            // Update title and counter
            document.getElementById('lightbox-title').textContent = title;
            document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${photos.length}`;
            
            // Update thumbnails
            const thumbnailsContainer = document.getElementById('lightbox-thumbnails');
            thumbnailsContainer.innerHTML = '';
            
            if (photos.length > 1) {
                photos.forEach((photo, index) => {
                    const thumbnail = document.createElement('img');
                    thumbnail.src = `${basePath}/${photo}`;
                    thumbnail.alt = `Thumbnail ${index + 1}`;
                    thumbnail.className = `lightbox-thumbnail ${index === currentIndex ? 'active' : ''}`;
                    thumbnail.onclick = () => goToLightboxImage(index);
                    thumbnailsContainer.appendChild(thumbnail);
                });
            }
            
            // Show/hide navigation arrows
            const prevBtn = document.querySelector('.lightbox-prev');
            const nextBtn = document.querySelector('.lightbox-next');
            if (photos.length <= 1) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'flex';
                nextBtn.style.display = 'flex';
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('gallery-lightbox');
            if (!lightbox.classList.contains('active')) return;
            
            switch(e.key) {
                case 'Escape':
                    closeGalleryLightbox();
                    break;
                case 'ArrowLeft':
                    navigateGalleryLightbox(-1);
                    break;
                case 'ArrowRight':
                    navigateGalleryLightbox(1);
                    break;
            }
        });

        // Close lightbox when clicking outside the content
        document.getElementById('gallery-lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                closeGalleryLightbox();
            }
        });

        // Touch/Swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;
        
        document.getElementById('lightbox-main-image').addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        document.getElementById('lightbox-main-image').addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next image
                    navigateGalleryLightbox(1);
                } else {
                    // Swipe right - previous image
                    navigateGalleryLightbox(-1);
                }
            }
        }

        // Data jurusan dan handler untuk tombol footer
        const majorData = {
            pplg: {
                title: 'PPLG (Pengembangan Perangkat Lunak dan Gim)',
                code: 'PPLG',
                image: '{{ asset('images/LOGO PPLG.png') }}',
                desc: 'Fokus pada pengembangan aplikasi, website, dan game dengan fondasi logika pemrograman yang kuat.',
                bullets: ['Pemrograman Web & Mobile', 'Basis Data', 'UI/UX dasar']
            },
            tkj: {
                title: 'Teknik Jaringan Komputer',
                code: 'TKJ',
                image: '{{ asset('images/LOGO TJKJ.png') }}',
                desc: 'Jaringan komputer, administrasi server, dan keamanan jaringan untuk kebutuhan industri.',
                bullets: ['Administrasi Jaringan', 'Server & Virtualisasi', 'Keamanan Jaringan']
            },
            tpfl: {
                title: 'Teknik Pengelasan',
                code: 'TPFL',
                image: '{{ asset('images/LOGO JURUSAN.png') }}',
                desc: 'Keterampilan pengelasan dan fabrikasi logam untuk manufaktur dan konstruksi.',
                bullets: ['SMAW/GMAW/TIG', 'Fabrikasi & Assembly', 'K3 & Gambar Teknik']
            },
            otomotif: {
                title: 'Teknik Otomotif',
                code: 'TO',
                image: '{{ asset('images/Logo TO.png') }}',
                desc: 'Perawatan, perbaikan, dan diagnosa kendaraan bermotor sesuai standar industri.',
                bullets: ['Sistem Mesin', 'Kelistrikan Otomotif', 'Diagnosis & Perawatan']
            }
        };

        function openMajor(key) {
            const d = majorData[key];
            if (!d) return;
            const img = document.getElementById('majorImage');
            const title = document.getElementById('majorTitle');
            const code = document.getElementById('majorCode');
            const desc = document.getElementById('majorDesc');
            const list = document.getElementById('majorBullets');

            img.src = d.image;
            title.textContent = d.title;
            code.textContent = d.code;
            desc.textContent = d.desc;
            list.innerHTML = '';
            d.bullets.forEach(b => {
                const li = document.createElement('li');
                li.className = 'flex items-start gap-2';
                li.innerHTML = '<span class="mt-1 w-2.5 h-2.5 rounded-full bg-[#254C6B]"></span><span>' + b + '</span>';
                list.appendChild(li);
            });

            document.getElementById('majorModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeMajor() {
            document.getElementById('majorModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    </script>
    
    <script>
        // Client-side search only
        document.addEventListener('DOMContentLoaded', function(){
          const q = document.getElementById('gallerySearch');
          const cards = Array.from(document.querySelectorAll('article[data-title]'));
          const sections = Array.from(document.querySelectorAll('.gallery-section'));
          const norm = (s) => (s||'').toString().toLowerCase().trim();
          function apply(){
            const v = norm(q?.value);
            cards.forEach(card => {
              const t = card.getAttribute('data-title') || '';
              const c = card.getAttribute('data-category') || '';
              const e = card.getAttribute('data-ekskul') || '';
              const j = card.getAttribute('data-jurusan') || '';
              const ok = !v || t.includes(v) || c.includes(v) || e.includes(v) || j.includes(v);
              card.classList.toggle('hidden', !ok);
            });
            // Hide section if all its cards are hidden
            sections.forEach(sec => {
              const childCards = Array.from(sec.querySelectorAll('article[data-title]'));
              const anyVisible = childCards.some(cd => !cd.classList.contains('hidden'));
              sec.classList.toggle('hidden', !anyVisible);
            });
          }
          if (q) { q.addEventListener('input', apply); }
          // Initial apply to normalize state on load
          apply();
        });
      </script>
    
      <!-- ScrollReveal.js -->
      <script src="https://unpkg.com/scrollreveal"></script>
      <script>
        (function(){
          if (!window.ScrollReveal) return;
          const sr = ScrollReveal({
            distance: '30px',
            duration: 800,
            easing: 'ease-out',
            reset: false,
            viewFactor: 0.15
          });
          // Generic hook + presets
          sr.reveal('.scroll-reveal', { interval: 100, origin: 'bottom' });
          sr.reveal('.sr-left', { origin: 'left', interval: 100 });
          sr.reveal('.sr-right', { origin: 'right', interval: 100 });
          sr.reveal('.sr-fade', { opacity: 0, origin: 'bottom', interval: 100 });
          sr.reveal('.sr-scale', { scale: 0.95, interval: 100 });
        })();
    
        // Share helper for each gallery card
        async function shareGallery(url, title) {
          try {
            if (navigator.share) {
              await navigator.share({ title, url });
            } else if (navigator.clipboard) {
              await navigator.clipboard.writeText(`${title} ${url}`);
              alert('Link galeri disalin ke clipboard');
            } else {
              // Fallback prompt
              window.prompt('Salin link galeri:', url);
            }
          } catch (e) {
            console.error('Share gagal:', e);
          }
        }

        // Share helper for each gallery card
        async function shareGallery(url, title) {
          try {
            if (navigator.share) {
              await navigator.share({ title, url });
            } else if (navigator.clipboard) {
              await navigator.clipboard.writeText(`${title} ${url}`);
              alert('Link galeri disalin ke clipboard');
            } else {
              // Fallback prompt
              window.prompt('Salin link galeri:', url);
            }
          } catch (e) {
            console.error('Share gagal:', e);
          }
        }

    // Toggle share popover; close others and close on outside click
    function toggleShareMenu(id) {
      // Close other open menus
      document.querySelectorAll('[id^="share-menu-"]').forEach(el => {
        if (el.id !== id) el.classList.add('hidden');
      });
      const el = document.getElementById(id);
      if (!el) return;
      el.classList.toggle('hidden');
    }

    // Click outside to close share menus
    document.addEventListener('click', function(e){
      const isShareBtn = e.target.closest('button[onclick^="toggleShareMenu" ]');
      const isMenu = e.target.closest('[id^="share-menu-"]');
      if (!isShareBtn && !isMenu) {
        document.querySelectorAll('[id^="share-menu-"]').forEach(el => el.classList.add('hidden'));
      }
    });

    // Like functionality for gallery cards
    document.addEventListener('DOMContentLoaded', function() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (!csrfToken) {
            console.error('CSRF token not found');
            return;
        }

        document.addEventListener('click', async function(e) {
            const likeBtn = e.target.closest('.like-btn');
            if (!likeBtn) return;

            e.preventDefault();
            if (likeBtn.disabled) return;

            const galleryId = likeBtn.getAttribute('data-gallery-id');
            const isLiked = likeBtn.getAttribute('data-liked') === '1';
            
            likeBtn.disabled = true;

            try {
                const response = await fetch(`/galeri-detail/${galleryId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    if (response.status === 419 || response.status === 401 || response.status === 403) {
                        window.location.href = '{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}';
                        return;
                    }
                    throw new Error(`HTTP ${response.status}`);
                }

                const data = await response.json();
                
                if (data && (data.status === 'liked' || data.status === 'unliked')) {
                    const nowLiked = data.status === 'liked';
                    const icon = likeBtn.querySelector('i');
                    const countSpan = likeBtn.querySelector('.like-count');
                    
                    // Update icon
                    if (icon) {
                        icon.className = (nowLiked ? 'fas' : 'far') + ' fa-heart mr-1 text-red-500';
                    }
                    
                    // Update count
                    if (countSpan) {
                        countSpan.textContent = new Intl.NumberFormat().format(data.likes || 0);
                    }
                    
                    // Update button state
                    likeBtn.setAttribute('data-liked', nowLiked ? '1' : '0');
                    likeBtn.setAttribute('title', nowLiked ? 'Batalkan suka' : 'Suka');
                }
            } catch (error) {
                console.error('Like error:', error);
                alert('Terjadi kesalahan saat menyimpan suka. Silakan coba lagi.');
            } finally {
                likeBtn.disabled = false;
            }
        });
    });

    // (Removed) client-side AJAX view increment to avoid double counting

    // Mobile menu toggle functionality (debounced single pointer handler)
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.querySelector('.mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (!btn || !menu) return;
        if (btn.dataset.bound === '1') return; // guard against double-binding
        btn.dataset.bound = '1';

        const icons = btn.querySelectorAll('svg');
        let toggling = false;

        function setOpen(open) {
            if (open) {
                menu.classList.remove('hidden');
                btn.setAttribute('aria-expanded', 'true');
                if (icons[0]) icons[0].classList.add('hidden');
                if (icons[1]) icons[1].classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
                if (icons[0]) icons[0].classList.remove('hidden');
                if (icons[1]) icons[1].classList.add('hidden');
            }
        }

        function toggleMenu() {
            if (toggling) return;
            toggling = true;
            const open = menu.classList.contains('hidden');
            // Use rAF to batch DOM changes and avoid lag
            requestAnimationFrame(() => {
                setOpen(open);
                // small debounce window
                setTimeout(() => { toggling = false; }, 120);
            });
        }

        // Prefer pointerup, but add click fallback for older browsers
        btn.addEventListener('pointerup', toggleMenu, { passive: true });
        btn.addEventListener('click', toggleMenu, { passive: true });

        // Close when clicking outside
        document.addEventListener('pointerdown', function(ev) {
            if (!menu.classList.contains('hidden')) {
                if (!btn.contains(ev.target) && !menu.contains(ev.target)) {
                    setOpen(false);
                }
            }
        }, { passive: true });
    });
  </script>
</body>
</html>
