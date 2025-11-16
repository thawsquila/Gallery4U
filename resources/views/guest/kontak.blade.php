<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery4U - Kontak</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif; }
        @keyframes fadeInUp { from{opacity:0; transform:translateY(30px)} to{opacity:1; transform:translateY(0)} }
        .animate-fade-in-up { animation: fadeInUp .8s ease-out both; }
    </style>
</head>
<body class="bg-gray-50">
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
                        <a href="{{ route('guest.event') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Event</a>
                        <a href="{{ route('guest.galeri') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Galeri</a>
                        <a href="{{ route('guest.kontak') }}" class="px-4 py-2 rounded-full font-semibold bg-blue-50 text-blue-600">Kontak</a>
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
                <a href="{{ route('guest.galeri') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50">Galeri</a>
                <a href="{{ route('guest.kontak') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-blue-50 text-blue-600">Kontak</a>

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

    <!-- Hero -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
        <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 w-full" style="margin-top: 120px;">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
                    <span class="bg-gradient-to-r from-[#66B1F2] via-white to-[#4A90E2] bg-clip-text text-transparent">Hubungi</span>
                    <span class="text-white">Kami</span>
                </h1>
                <p class="text-white/90 text-lg lg:text-xl animate-fade-in-up" style="animation-delay:.15s">Kami siap mendengar saran, pertanyaan, dan kolaborasi dari Anda.</p>
            </div>
        </div>
    </section>

    <!-- Main -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if(session('success'))
            <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-xl">{{ session('success') }}</div>
        @endif
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Card: Info Sekolah -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center"><i class="fas fa-school text-[#66B1F2] mr-3"></i>Informasi Sekolah</h3>
                    <ul class="text-gray-700 space-y-3">
                        <li class="flex items-start gap-3"><i class="fas fa-map-marker-alt text-[#4A90E2] mt-1"></i><span>{{ $school->alamat ?? 'Jl. Raya Tajur, Kp. Buntar' }}</span></li>
                        <li class="flex items-start gap-3"><i class="fas fa-phone text-[#4A90E2] mt-1"></i><span>{{ $school->telepon ?? '(0251) 7520477' }}</span></li>
                        <li class="flex items-start gap-3"><i class="fas fa-envelope text-[#4A90E2] mt-1"></i><span>{{ $school->email ?? 'info@smkn4bogor.sch.id' }}</span></li>
                        <li class="flex items-start gap-3"><i class="fas fa-globe text-[#4A90E2] mt-1"></i><span>{{ $school->website ?? 'https://smkn4bogor.sch.id' }}</span></li>
                    </ul>
                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID" class="bg-blue-600 text-white py-2 rounded-lg text-center hover:bg-blue-700"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/smkn4kotabogor/" class="bg-pink-500 text-white py-2 rounded-lg text-center hover:bg-pink-600"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@smknegeri4bogor905" class="bg-red-600 text-white py-2 rounded-lg text-center hover:bg-red-700"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center"><i class="fas fa-clock text-[#66B1F2] mr-3"></i>Jam Operasional</h3>
                    <ul class="text-gray-700 space-y-2">
                        <li>Senin - Jumat: 07.00 - 15.00 WIB</li>
                        <li>Sabtu - Minggu: Tutup</li>
                    </ul>
                </div>
            </div>

            <!-- Card: Form Kontak -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center"><i class="fas fa-envelope-open-text text-[#66B1F2] mr-3"></i>Kirim Pesan</h3>
                    <form action="{{ route('guest.kontak.kirim') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @csrf
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Nama</label>
                            <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#66B1F2]/40 focus:border-[#66B1F2]" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#66B1F2]/40 focus:border-[#66B1F2]" placeholder="email@domain.com">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-600 mb-1">Subjek</label>
                            <input type="text" name="subject" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#66B1F2]/40 focus:border-[#66B1F2]" placeholder="Subjek pesan">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-600 mb-1">Pesan</label>
                            <textarea name="message" rows="6" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#66B1F2]/40 focus:border-[#66B1F2]" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <div class="md:col-span-2 flex items-center justify-between">
                            <a href="{{ route('guest.home') }}" class="text-sm text-gray-600 hover:text-primary inline-flex items-center"><i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda</a>
                            <button type="submit" class="bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] text-white px-6 py-3 rounded-lg font-semibold hover:opacity-95 shadow-md">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
                <!-- Map Placeholder / Embed -->
                <div class="mt-8 bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-72 w-full">
                        <iframe class="w-full h-full" src="https://www.google.com/maps?q=SMK%20Negeri%204%20Bogor&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer (same as homepage) -->
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
    <script>
        // Mobile menu toggle functionality (same as galeri/teachers)
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.querySelector('.mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            if (!btn || !menu) return;
            if (btn.dataset.bound === '1') return;
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
