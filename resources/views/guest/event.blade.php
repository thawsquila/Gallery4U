<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery4U - Event</title>
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg">
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
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }
        .animate-slide-in-left { animation: slideInLeft 0.6s ease-out forwards; }
        .animate-scale-in { animation: scaleIn 0.6s ease-out forwards; }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }

        /* Enhanced Mobile Responsiveness for Event */
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
            
            .hero-subtitle {
                font-size: 1.125rem !important;
            }
            
            /* Search bar mobile */
            .search-form {
                flex-direction: column !important;
                gap: 0.5rem !important;
            }
            
            .search-form input {
                border-radius: 0.5rem !important;
            }
            
            .search-form button {
                border-radius: 0.5rem !important;
                width: 100% !important;
                justify-content: center !important;
            }
            
            /* Main content mobile */
            .max-w-7xl {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            
            /* Event grid mobile */
            .event-grid {
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }
            
            /* Event card mobile */
            .event-card {
                margin-bottom: 1rem !important;
            }
            
            .event-meta {
                flex-direction: column !important;
                gap: 0.5rem !important;
                align-items: flex-start !important;
            }
            
            .event-actions {
                flex-direction: column !important;
                gap: 0.75rem !important;
            }
            
            .event-actions > div:first-child {
                width: 100% !important;
                justify-content: space-between !important;
            }
            
            .event-calendar-btn {
                width: 100% !important;
            }
            
            /* Footer mobile */
            footer .grid {
                grid-template-columns: 1fr !important;
                gap: 2rem !important;
            }
            
            .footer-buttons {
                flex-wrap: wrap !important;
                gap: 0.5rem !important;
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
            
            /* Event card padding */
            .event-card .p-6 {
                padding: 1rem !important;
            }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        // Toggle deskripsi dengan animasi + tutup lainnya + icon rotasi
        document.addEventListener('DOMContentLoaded', function() {
            const titles = document.querySelectorAll('.toggle-desc');
            const allDescs = () => Array.from(document.querySelectorAll('.event-desc'));

            function slideOpen(el) {
                el.classList.add('open');
                el.style.maxHeight = el.scrollHeight + 'px';
            }

            function slideClose(el) {
                el.style.maxHeight = el.scrollHeight + 'px';
                // Force reflow
                void el.offsetHeight;
                el.classList.remove('open');
                el.style.maxHeight = '0px';
            }

            titles.forEach(function(titleEl) {
                titleEl.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const descEl = document.getElementById(targetId);
                    if (!descEl) return;

                    // Close others
                    allDescs().forEach(d => {
                        if (d !== descEl && d.classList.contains('open')) {
                            slideClose(d);
                            const icon = d.closest('article')?.querySelector('.toggle-desc .chev');
                            if (icon) icon.classList.remove('rotate-180');
                        }
                    });

                    // Toggle current
                    const icon = this.querySelector('.chev');
                    if (descEl.classList.contains('open')) {
                        slideClose(descEl);
                        if (icon) icon.classList.remove('rotate-180');
                    } else {
                        slideOpen(descEl);
                        if (icon) icon.classList.add('rotate-180');
                    }
                });
            });
        });
    </script>

    <style>
        /* Slide animation for event description */
        .event-desc { max-height: 0; overflow: hidden; transition: max-height .35s ease; }
        .event-desc.open { /* max-height set dynamically via JS */ }
        .chev { transition: transform .25s ease; display: inline-block; }
        * {
            font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Floating Navbar -->
    <nav class="fixed top-6 left-1/2 transform -translate-x-1/2 w-[95%] md:w-[90%] bg-white/90 shadow-2xl rounded-xl border border-gray-200 z-50 backdrop-blur-xl ring-1 ring-gray-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <img src="{{ asset('images/favicon.svg') }}" alt="SMKN 4 Logo" class="w-10 h-10 object-contain mr-3" />
                        <span class="font-bold text-xl text-gray-800">Gallery4U</span>
                    </div>
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
                    <a href="{{ route('guest.event') }}" class="px-4 py-2 rounded-full font-semibold bg-blue-50 text-blue-600">Event</a>
                    <a href="{{ route('guest.galeri') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Galeri</a>
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
                <a href="{{ route('guest.event') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-blue-50 text-blue-600">Event</a>
                <a href="{{ route('guest.galeri') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Galeri</a>
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

    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
        <!-- Background with gradient matching hero section -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
        <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
        
        <!-- Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center" style="margin-top: 120px;">
            <h1 class="hero-title text-5xl lg:text-7xl font-extrabold leading-tight mb-6 drop-shadow-2xl animate-fade-in-up">
                <span class="bg-gradient-to-r from-[#66B1F2] via-white to-[#4A90E2] bg-clip-text text-transparent">Event</span>
                <br>
                <span class="text-white">Terbaru</span>
            </h1>
            <!-- Line below title removed as requested -->
            <p class="hero-subtitle text-xl lg:text-2xl text-white/90 leading-relaxed mb-10 max-w-3xl mx-auto animate-fade-in-up delay-400 drop-shadow-lg font-medium">
                Ikuti kegiatan dan acara terbaru dari SMKN 4 Bogor
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.4s">
                <form action="{{ route('guest.event') }}" method="GET" class="search-form flex rounded-lg overflow-hidden shadow-lg">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari event..." 
                        value="{{ request('search') }}"
                        class="flex-1 px-6 py-4 focus:outline-none text-gray-800"
                    >
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-6 transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Animated Elements -->
        <div class="absolute top-1/4 -left-20 w-40 h-40 bg-primary/20 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-64 h-64 bg-primary/20 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </section>

    <!-- Events Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(request('search'))
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">Hasil pencarian untuk: "{{ request('search') }}"</h2>
                    <p class="text-gray-600 mt-2">Ditemukan {{ $events->total() }} hasil</p>
                </div>
            @endif
            
            @if($events->count() > 0)
                <div class="event-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events as $index => $event)
                        <article class="event-card bg-white rounded-xl shadow-lg overflow-hidden card-hover transition-all duration-500 animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s">
                            <!-- Event Image -->
                            <div class="h-48 overflow-hidden relative">
                                @if($event->gambar)
                                    <img 
                                        src="{{ asset('images/posts/' . $event->gambar) }}" 
                                        alt="{{ $event->judul }}" 
                                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                                    >
                                @elseif($event->galeries && $event->galeries->isNotEmpty() && $event->galeries->first()->fotos && $event->galeries->first()->fotos->isNotEmpty())
                                    <img 
                                        src="{{ asset('images/gallery/' . $event->galeries->first()->fotos->first()->file) }}" 
                                        alt="{{ $event->judul }}" 
                                        class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                                    >
                                @else
                                    <div class="w-full h-full bg-gradient-to-r from-blue-600 to-cyan-600 flex items-center justify-center">
                                        <i class="fas fa-calendar-alt text-white text-5xl opacity-30"></i>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-4">
                                    <div class="text-sm text-white/80 mb-1">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ ($event->tanggal ? \Carbon\Carbon::parse($event->tanggal) : $event->created_at)->translatedFormat('d F Y') }}
                                    </div>
                                    <h3 class="text-xl font-bold text-white cursor-pointer toggle-desc" data-target="desc-{{ $event->id }}">{{ $event->judul }}</h3>
                                </div>
                            </div>
                            
                            <!-- Event Content -->
                            <div class="p-6">
                                <div class="event-meta flex items-center text-sm text-gray-500 mb-4">
                                    <div class="flex items-center mr-4">
                                        <i class="far fa-clock mr-1"></i>
                                        <span>{{ $event->waktu_mulai ? \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') : '--:--' }} WIB</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        <span>{{ $event->lokasi ?? 'Online' }}</span>
                                    </div>
                                </div>
                                
                                <p id="desc-{{ $event->id }}" class="text-gray-600 mb-6 line-clamp-3">
                                    {{ Str::limit(strip_tags($event->isi), 150) }}
                                </p>
                                
                                <div class="event-actions flex flex-col gap-4">
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('guest.event.detail', $event->id) }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center group">
                                            Baca Selengkapnya
                                            <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                                        </a>
                                        @if($event->galeries && $event->galeries->isNotEmpty())
                                            <span class="text-sm text-gray-500 flex items-center">
                                                <i class="far fa-images mr-1"></i>
                                                {{ $event->galeries->first()->fotos->count() }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <!-- Add to Calendar Button -->
                                    <button 
                                        data-event-id="{{ $event->id }}"
                                        data-event-title="{{ htmlspecialchars($event->judul, ENT_QUOTES, 'UTF-8') }}"
                                        data-event-description="{{ htmlspecialchars(strip_tags($event->isi), ENT_QUOTES, 'UTF-8') }}"
                                        data-event-location="{{ htmlspecialchars($event->lokasi, ENT_QUOTES, 'UTF-8') }}"
                                        data-event-date="{{ \Carbon\Carbon::parse($event->tanggal)->format('Y-m-d') }}"
                                        data-event-time="{{ $event->waktu_mulai ? \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') : '09:00' }}"
                                        onclick="addEventToCalendarFromData(this)"
                                        class="event-calendar-btn w-full bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg font-medium hover:from-red-600 hover:to-red-700 transition-all flex items-center justify-center group"
                                    >
                                        <i class="fab fa-google mr-2"></i>
                                        Tambah ke Google Calendar
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                @if($events->hasPages())
                    <div class="mt-12">
                        {{ $events->appends(request()->query())->links('pagination::tailwind') }}
                    </div>
                @endif
            @else
                <div class="py-16 text-center">
                    <div class="mb-6 text-gray-400">
                        <i class="fas fa-calendar-times text-6xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Tidak ada event ditemukan</h3>
                    @if(request('search'))
                        <p class="text-gray-600 mb-8">Tidak ada event yang sesuai dengan pencarian "{{ request('search') }}"</p>
                        <a href="{{ route('guest.event') }}" class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua event
                        </a>
                    @else
                        <p class="text-gray-600">Belum ada event yang tersedia saat ini. Silakan periksa kembali nanti.</p>
                    @endif
                </div>
            @endif
        </div>
    </section>

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
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Jurusan</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('guest.jurusan') }}" class="text-gray-300 hover:text-primary transition-colors">Semua Jurusan</a></li>
                    </ul>
                    <!-- Floating style quick buttons -->
                    <div class="footer-buttons mt-4 flex flex-wrap gap-2">
                        <button type="button" onclick="openMajor('pplg')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">PPLG</button>
                        <button type="button" onclick="openMajor('tkj')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">TKJ</button>
                        <button type="button" onclick="openMajor('tpfl')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">TPFL</button>
                        <button type="button" onclick="openMajor('otomotif')" class="px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-gray-200 text-xs font-semibold shadow-md ring-1 ring-white/20 backdrop-blur transition">Otomotif</button>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Ikuti Kami</h3>
                    <p class="text-gray-300 mb-4">Dapatkan update terbaru dari SMKN 4 Bogor</p>
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
// Add to Google Calendar functionality using data attributes
function addEventToCalendarFromData(button) {
    const eventId = button.getAttribute('data-event-id');
    const title = button.getAttribute('data-event-title');
    const description = button.getAttribute('data-event-description');
    const location = button.getAttribute('data-event-location');
    const startDate = button.getAttribute('data-event-date');
    const startTime = button.getAttribute('data-event-time');
    
    addEventToCalendar(eventId, title, description, location, startDate, startTime);
}

// Add to Google Calendar functionality
function addEventToCalendar(eventId, title, description, location, startDate, startTime) {
    console.log('Adding event to calendar:', { eventId, title, description, location, startDate, startTime });
    
    // Validate inputs
    if (!eventId || !title || !startDate) {
        alert('Data event tidak lengkap. Silakan coba lagi.');
        return;
    }
    
    function formatDateForCalendar(date, time = '09:00') {
        const [year, month, day] = date.split('-');
        const [hour, minute] = time.split(':');
        return `${year}${month}${day}T${hour}${minute}00`;
    }
    
    try {
        // Ensure we have valid time
        const validTime = startTime || '09:00';
        const startDateTime = formatDateForCalendar(startDate, validTime);
        
        // Calculate end time (2 hours later)
        const startHour = parseInt(validTime.split(':')[0]);
        const startMinute = parseInt(validTime.split(':')[1]) || 0;
        const endHour = startHour + 2;
        const endTime = endHour.toString().padStart(2, '0') + ':' + startMinute.toString().padStart(2, '0');
        const endDateTime = formatDateForCalendar(startDate, endTime);
        
        // Build event URL
        const eventUrl = window.location.origin + '/event-detail/' + eventId;
        
        // Build Google Calendar URL
        const params = new URLSearchParams({
            action: 'TEMPLATE',
            text: title,
            dates: startDateTime + '/' + endDateTime,
            details: (description || 'Event dari SMKN 4 Bogor') + '\n\nInfo lebih lanjut: ' + eventUrl,
            location: location || 'SMKN 4 Bogor'
        });
        
        const googleUrl = 'https://calendar.google.com/calendar/render?' + params.toString();
        
        console.log('Opening Google Calendar with URL:', googleUrl);
        
        // Try to open in new tab
        const newWindow = window.open(googleUrl, '_blank');
        if (!newWindow) {
            // Fallback if popup blocked
            alert('Popup diblokir. Silakan izinkan popup atau salin link berikut:\n\n' + googleUrl);
        }
        
    } catch (error) {
        console.error('Error adding event to calendar:', error);
        alert('Terjadi kesalahan saat menambahkan event ke kalender: ' + error.message);
    }
}

// Test function to verify script is loaded
console.log('Calendar script loaded successfully');

// Mobile menu toggle functionality (debounced single pointer handler)
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.querySelector('.mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (!btn || !menu) return;
    if (btn.dataset.bound === '1') return; // avoid double-binding
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
        requestAnimationFrame(() => {
            setOpen(open);
            setTimeout(() => { toggling = false; }, 120);
        });
    }

    btn.addEventListener('pointerup', toggleMenu, { passive: true });
    btn.addEventListener('click', toggleMenu, { passive: true });

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
