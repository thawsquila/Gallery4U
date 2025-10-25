<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $galeri->judul ?? 'Detail Galeri' }} - SMK Negeri 4 Bogor</title>
    <link rel="icon" href="{{ asset('images/faviconn.png') }}" type="image/png">
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
        
        .gallery-lightbox {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }
        
        .gallery-lightbox.active {
            display: flex;
        }
        
        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }
        
        .lightbox-image {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }
        
        .lightbox-close {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }
        
        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 30px;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .lightbox-prev {
            left: 20px;
        }
        
        .lightbox-next {
            right: 20px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('guest.home') }}" class="flex-shrink-0 flex items-center">
                        <img class="h-10 w-auto" src="{{ asset('images/faviconn.png') }}" alt="SMKN 4 Logo">
                        <span class="ml-2 text-xl font-bold text-gray-800">SMKN 4 BOGOR</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center gap-4">
                    <div class="flex items-center gap-1 bg-white/80 rounded-full px-2 py-1 ring-1 ring-gray-200/70">
                        <a href="/" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Beranda</a>
                        <a href="{{ route('guest.jurusan') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Jurusan</a>
                        <a href="{{ route('guest.teachers') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Tenaga Pendidik</a>
                        <a href="{{ route('guest.berita') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Berita</a>
                        <a href="{{ route('guest.event') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Event</a>
                        <a href="{{ route('guest.galeri') }}" class="px-4 py-2 rounded-full font-semibold bg-blue-50 text-blue-600">Galeri</a>
                    </div>
                    @guest
                    <a href="{{ route('login', ['redirect' => request()->getRequestUri()]) }}" class="px-5 py-2 rounded-full text-gray-700 bg-white hover:bg-gray-100 ring-1 ring-gray-200 font-semibold transition">Login</a>
                    <a href="{{ route('register', ['redirect' => request()->getRequestUri()]) }}" class="px-6 py-2 rounded-full bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] text-white font-bold shadow-[0_10px_25px_-10px_rgba(59,130,246,0.6)] hover:opacity-95 transition">Daftar</a>
                    @endguest
                    @auth
                    <span class="text-sm text-gray-600">Hi, <span class="font-semibold">{{ auth()->user()->name }}</span></span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="ml-1 px-4 py-2 text-sm rounded-full ring-1 ring-gray-200 hover:bg-gray-100">Keluar</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero (match style with Berita) -->
    <section class="relative min-h-[45vh] flex items-center justify-center overflow-hidden">
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
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-5xl mx-auto">
                <div class="relative animate-fade-in-up">
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-white leading-tight mb-4 drop-shadow-2xl">{{ $galeri->judul ?? 'Detail Galeri' }}</h1>
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#66B1F2]/30 to-[#4A90E2]/30 blur-xl opacity-40 rounded-xl"></div>
                </div>
                <div class="mt-4 flex flex-wrap justify-center items-center gap-3 animate-fade-in-up delay-200">
                    <span class="text-white/95 bg-[#2E5A63] px-3 py-1 rounded-full text-sm"><i class="fas fa-tag mr-1"></i>{{ $galeri->kategori }}</span>
                    <span class="text-white/95"><i class="far fa-calendar-alt mr-2"></i>{{ $galeri->created_at->format('d M Y') }}</span>
                    <span class="text-white/95"><i class="far fa-images mr-2"></i>{{ $galeri->fotos->count() }} Foto</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Description Card -->
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden p-6 mb-8 animate-fade-in-up delay-300">
            @if($galeri->deskripsi)
                <div class="prose max-w-none mb-6">
                    {!! $galeri->deskripsi !!}
                </div>
            @endif

            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <span class="w-2 h-6 bg-[#2E5A63] rounded-full mr-3"></span>
                    Koleksi Foto
                </h2>
                <div class="text-sm text-gray-500">Klik foto untuk memperbesar</div>
            </div>
            
            @if($galeri->fotos && $galeri->fotos->isNotEmpty())
                <!-- Thumbnails Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($galeri->fotos as $index => $foto)
                        <div class="gallery-item group aspect-square overflow-hidden rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 cursor-pointer" 
                             onclick="openLightbox({{ $index }})">
                            <img src="{{ asset('images/gallery/' . $foto->file) }}" 
                                 alt="Foto {{ $index + 1 }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
                        </div>
                    @endforeach
                </div>
                <!-- Thumbnails strip -->
                <div class="mt-6 overflow-x-auto">
                    <div class="flex gap-3">
                        @foreach($galeri->fotos as $index => $foto)
                            <button class="h-16 w-16 flex-shrink-0 rounded-lg overflow-hidden border hover:scale-105 transition" onclick="openLightbox({{ $index }})" aria-label="Buka foto {{ $index + 1 }}">
                                <img src="{{ asset('images/gallery/' . $foto->file) }}" alt="Thumb {{ $index + 1 }}" class="h-full w-full object-cover" />
                            </button>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-images text-5xl mb-4"></i>
                    <p>Belum ada foto dalam galeri ini</p>
                </div>
            @endif
        </div>

        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('guest.galeri') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg transition-colors duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri
            </a>
        </div>
    </main>

    <!-- Lightbox -->
    <div id="gallery-lightbox" class="gallery-lightbox">
        <div class="lightbox-content">
            <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
            <img id="lightbox-image" class="lightbox-image" src="" alt="Lightbox Image">
            <div class="text-white text-sm mt-2 text-center" id="lightbox-counter">1 / 1</div>
            <div class="lightbox-nav lightbox-prev" onclick="changeImage(-1)" title="Sebelumnya (←)"><i class="fas fa-chevron-left"></i></div>
            <div class="lightbox-nav lightbox-next" onclick="changeImage(1)" title="Berikutnya (→)"><i class="fas fa-chevron-right"></i></div>
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
                        <li><a href="{{ route('guest.home') }}#tenagapendidik" class="text-gray-300 hover:text-primary transition-colors">Tenaga Pendidik</a></li>
                        <li><a href="{{ route('guest.home') }}#berita" class="text-gray-300 hover:text-primary transition-colors">Berita</a></li>
                        <li><a href="{{ route('guest.home') }}#event" class="text-gray-300 hover:text-primary transition-colors">Event</a></li>
                        <li><a href="{{ route('guest.home') }}#galeri" class="text-gray-300 hover:text-primary transition-colors">Galeri</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-bold mb-6">Jurusan</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('guest.jurusan.rpl') }}" class="text-gray-300 hover:text-primary transition-colors">Rekayasa Perangkat Lunak</a></li>
                        <li><a href="{{ route('guest.jurusan.tkj') }}" class="text-gray-300 hover:text-primary transition-colors">Teknik Jaringan Komputer Dan Telekomunikasi</a></li>
                        <li><a href="{{ route('guest.jurusan.tpfl') }}" class="text-gray-300 hover:text-primary transition-colors">Teknik Pengelasan Dan Fabrikasi Logam</a></li>
                        <li><a href="{{ route('guest.jurusan.otomotif') }}" class="text-gray-300 hover:text-primary transition-colors">Teknik Otomotif</a></li>
                        <li><a href="{{ route('guest.jurusan') }}" class="text-gray-300 hover:text-primary transition-colors">Semua Jurusan</a></li>
                    </ul>
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
                <p class="text-gray-400">&copy; 2025 SMK Negeri 4. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        let currentIndex = 0;
        const photos = @json($galeri->fotos->pluck('file'));
        
        function openLightbox(index) {
            currentIndex = index;
            const lightbox = document.getElementById('gallery-lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const counter = document.getElementById('lightbox-counter');
            
            lightboxImage.src = `{{ asset('images/gallery/') }}/${photos[index]}`;
            counter.textContent = `${index + 1} / ${photos.length}`;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeLightbox() {
            const lightbox = document.getElementById('gallery-lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        function changeImage(step) {
            currentIndex = (currentIndex + step + photos.length) % photos.length;
            const lightboxImage = document.getElementById('lightbox-image');
            const counter = document.getElementById('lightbox-counter');
            lightboxImage.src = `{{ asset('images/gallery/') }}/${photos[currentIndex]}`;
            counter.textContent = `${currentIndex + 1} / ${photos.length}`;
        }
        
        // Close lightbox when clicking outside the image
        document.getElementById('gallery-lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!document.getElementById('gallery-lightbox').classList.contains('active')) return;
            
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                changeImage(-1);
            } else if (e.key === 'ArrowRight') {
                changeImage(1);
            }
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
  </script>
</body>
</html>
