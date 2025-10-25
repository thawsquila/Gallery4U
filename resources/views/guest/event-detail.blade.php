<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->judul }} - SMK Negeri 1</title>
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
      @keyframes fadeInUp { from {opacity:0; transform: translateY(30px);} to {opacity:1; transform: translateY(0);} }
      .animate-fade-in-up{ animation: fadeInUp .8s ease-out both; }
      .card-hover:hover{ transform: translateY(-4px); box-shadow: 0 18px 40px rgba(0,0,0,.12); }
      .glass { backdrop-filter: blur(10px); background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.2); }
      
      /* Scroll Reveal Animations */
      .scroll-reveal {
          opacity: 0;
          transform: translateY(20px);
          transition: opacity 0.6s ease-out, transform 0.6s ease-out;
      }
      
      .scroll-reveal.visible {
          opacity: 1;
          transform: translateY(0);
      }
      
      /* Animasi dari kanan ke tengah */
      .scroll-reveal-right {
          opacity: 0;
          transform: translateX(50px);
          transition: opacity 0.8s ease-out, transform 0.8s ease-out;
      }
      
      .scroll-reveal-right.visible {
          opacity: 1;
          transform: translateX(0);
      }
      
      /* Animasi dari kiri ke tengah */
      .scroll-reveal-left {
          opacity: 0;
          transform: translateX(-50px);
          transition: opacity 0.8s ease-out, transform 0.8s ease-out;
      }
      
      .scroll-reveal-left.visible {
          opacity: 1;
          transform: translateX(0);
      }
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
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="ml-1 px-4 py-2 text-sm rounded-full ring-1 ring-gray-200 hover:bg-gray-100">Keluar</button>
                  </form>
                  @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" style="margin-top: 100px;">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Event Content -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden scroll-reveal-left">
                    <!-- Featured Image -->
                    <div class="h-64 md:h-80 relative overflow-hidden">
                        @if($event->gambar)
                            <img src="{{ asset('images/posts/' . $event->gambar) }}" alt="{{ $event->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="h-full bg-gradient-to-r from-primary to-primary-dark flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-white text-8xl opacity-30"></i>
                            </div>
                        @endif
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-primary-light/20 text-white px-3 py-1 rounded-full text-sm font-semibold">Event</span>
                        </div>
                    </div>
                    
                    <!-- Event Header -->
                    <div class="p-8">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}</span>
                            <span class="mx-3">•</span>
                            <i class="fas fa-clock mr-2"></i>
                            <span>{{ $event->waktu_mulai ? \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') : '--:--' }} WIB</span>
                            <span class="mx-3">•</span>
                            <i class="fas fa-eye mr-2"></i>
                            <span>{{ number_format($event->views ?? 0) }} views</span>
                        </div>
                        
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">{{ $event->judul }}</h1>
                        
                        <!-- Event Quick Info -->
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                                    <span class="text-gray-700">{{ $event->lokasi }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-users text-primary mr-2"></i>
                                    <span class="text-gray-700">{{ $event->kapasitas ? number_format($event->kapasitas) . ' Peserta' : 'Kapasitas tidak ditentukan' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-ticket-alt text-primary mr-2"></i>
                                    <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">{{ $event->tiket ?? 'Gratis' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Event Details -->
                    <div class="px-8 pb-8">
                        <div class="mb-8 scroll-reveal">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <span class="w-2 h-6 bg-[#2E5A63] rounded-full mr-3"></span>
                                Tentang Event
                            </h2>
                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                {!! $event->isi !!}
                            </div>
                        </div>

                        @if($event->galeries && $event->galeries->count())
                        <!-- Related Galleries Section -->
                        <div class="mb-8 scroll-reveal">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <span class="w-2 h-6 bg-[#2E5A63] rounded-full mr-3"></span>
                                Galeri Foto
                            </h2>
                            @foreach($event->galeries as $gallery)
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $gallery->judul }}</h3>
                                    @if($gallery->deskripsi)
                                        <p class="text-gray-600 mb-3">{!! Str::limit(strip_tags($gallery->deskripsi), 180) !!}</p>
                                    @endif
                                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                        @forelse($gallery->fotos as $foto)
                                            <div class="overflow-hidden rounded-xl shadow hover:shadow-lg transition">
                                                <img src="{{ asset('images/gallery/' . $foto->file) }}" alt="{{ $foto->judul }}" class="w-full h-40 object-cover hover:scale-110 transition-transform">
                                            </div>
                                        @empty
                                            <p class="text-sm text-gray-500">Belum ada foto.</p>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif

                        <!-- Add to Calendar & Share -->
                        <div class="bg-primary-light/10 p-6 rounded-lg scroll-reveal card-hover transition-all mb-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-calendar-plus mr-3 text-primary"></i> Tambah ke Kalender
                            </h2>
                            <p class="text-gray-600 mb-6">Jangan sampai terlewat! Tambahkan event ini ke kalender Anda.</p>
                            <div class="flex flex-wrap gap-4 mb-6">
                                <button id="btn-google-calendar" class="bg-red-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-red-700 transition-colors">
                                    <i class="fab fa-google mr-2"></i>Google Calendar
                                </button>
                                <button id="btn-outlook-calendar" class="bg-blue-800 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-900 transition-colors">
                                    <i class="fas fa-calendar mr-2"></i>Outlook
                                </button>
                                <button id="btn-download-ics" class="bg-purple-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-purple-700 transition-colors">
                                    <i class="fas fa-download mr-2"></i>Download .ics
                                </button>
                            </div>
                        </div>

                        <!-- Share Buttons -->
                        <div class="bg-primary-light/10 p-6 rounded-lg scroll-reveal card-hover transition-all">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-share-alt mr-3 text-primary"></i> Bagikan Event
                            </h2>
                            <p class="text-gray-600 mb-6">Bagikan event ini dengan teman dan keluarga Anda!</p>
                            <div class="flex flex-wrap gap-4">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-facebook-f mr-2"></i>Facebook
                                </a>
                                <a target="_blank" href="https://api.whatsapp.com/send?text={{ urlencode($event->judul.' - '.request()->fullUrl()) }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                                </a>
                                <button id="btn-copy" class="bg-gray-800 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-black transition-colors">
                                    <i class="fas fa-link mr-2"></i>Salin Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Event Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8 scroll-reveal-right">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Informasi Event</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-calendar-alt text-primary mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 text-sm">Tanggal</h4>
                                <p class="text-gray-600 text-sm">{{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-clock text-primary mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 text-sm">Waktu</h4>
                                <p class="text-gray-600 text-sm">{{ $event->waktu_mulai ? \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') . ' WIB' : '--:-- WIB' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-primary mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 text-sm">Lokasi</h4>
                                <p class="text-gray-600 text-sm">{{ $event->lokasi }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-ticket-alt text-primary mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 text-sm">Tiket</h4>
                                <p class="text-gray-600 text-sm">{{ $event->tiket ?? 'Gratis (Wajib Registrasi)' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-users text-primary mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 text-sm">Kapasitas</h4>
                                <p class="text-gray-600 text-sm">{{ $event->kapasitas ? number_format($event->kapasitas) . ' Peserta' : '—' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Add to Calendar -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <button id="btn-quick-calendar" class="w-full bg-gradient-to-r from-primary to-primary-dark text-white px-4 py-3 rounded-lg font-semibold hover:opacity-90 transition-all flex items-center justify-center">
                            <i class="fas fa-calendar-plus mr-2"></i>
                            Tambah ke Google Calendar
                        </button>
                    </div>
                </div>
                
                <!-- Other Events -->
                <div class="bg-white rounded-xl shadow-lg p-6 scroll-reveal-left">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Event Lainnya</h3>
                    <div class="space-y-4">
                        @forelse($related as $relatedEvent)
                            <div class="flex items-start space-x-4 group">
                                <div class="bg-primary text-white rounded-lg p-2 text-center min-w-[50px]">
                                    <div class="text-lg font-bold">{{ \Carbon\Carbon::parse($relatedEvent->tanggal)->format('d') }}</div>
                                    <div class="text-xs">{{ \Carbon\Carbon::parse($relatedEvent->tanggal)->format('M') }}</div>
                                </div>
                                <div>
                                    <a href="{{ route('guest.event.detail', $relatedEvent->id) }}">
                                        <h4 class="font-semibold text-gray-800 text-sm mb-1 group-hover:text-primary cursor-pointer transition-colors">{{ $relatedEvent->judul }}</h4>
                                    </a>
                                    <p class="text-gray-500 text-xs">{{ Str::limit(strip_tags($relatedEvent->isi), 50) }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Tidak ada event terkait.</p>
                        @endforelse
                    </div>
                </div>
            </div>
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
  // Copy link functionality
  const copyBtn = document.getElementById('btn-copy');
  if (copyBtn) {
    copyBtn.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(window.location.href);
        copyBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Tersalin!';
        setTimeout(()=>{ copyBtn.innerHTML = '<i class="fas fa-link mr-2"></i>Salin Link'; }, 1500);
      } catch (e) {
        alert('Gagal menyalin link');
      }
    });
  }

  // Calendar functionality
  const eventData = {
    title: {!! json_encode($event->judul, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) !!},
    description: {!! json_encode(strip_tags($event->isi), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) !!},
    location: {!! json_encode($event->lokasi, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) !!},
    startDate: '{{ \Carbon\Carbon::parse($event->tanggal)->format('Y-m-d') }}',
    startTime: '{{ $event->waktu_mulai ? \Carbon\Carbon::parse($event->waktu_mulai)->format('H:i') : '09:00' }}',
    url: window.location.href
  };

  function formatDateForCalendar(date, time = '09:00') {
    const [year, month, day] = date.split('-');
    const [hour, minute] = time.split(':');
    return `${year}${month}${day}T${hour}${minute}00`;
  }

  function addToGoogleCalendar() {
    const startDateTime = formatDateForCalendar(eventData.startDate, eventData.startTime);
    // Add 2 hours to end time
    const startHour = parseInt(eventData.startTime.split(':')[0]);
    const startMinute = parseInt(eventData.startTime.split(':')[1]);
    const endHour = startHour + 2;
    const endTime = endHour.toString().padStart(2, '0') + ':' + startMinute.toString().padStart(2, '0');
    const endDateTime = formatDateForCalendar(eventData.startDate, endTime);
    
    const googleUrl = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(eventData.title)}&dates=${startDateTime}/${endDateTime}&details=${encodeURIComponent(eventData.description + '\n\nInfo lebih lanjut: ' + eventData.url)}&location=${encodeURIComponent(eventData.location)}`;
    
    window.open(googleUrl, '_blank');
  }

  function addToOutlook() {
    const startDateTime = formatDateForCalendar(eventData.startDate, eventData.startTime);
    const startHour = parseInt(eventData.startTime.split(':')[0]);
    const startMinute = parseInt(eventData.startTime.split(':')[1]);
    const endHour = startHour + 2;
    const endTime = endHour.toString().padStart(2, '0') + ':' + startMinute.toString().padStart(2, '0');
    const endDateTime = formatDateForCalendar(eventData.startDate, endTime);
    
    const outlookUrl = `https://outlook.live.com/calendar/0/deeplink/compose?subject=${encodeURIComponent(eventData.title)}&startdt=${startDateTime}&enddt=${endDateTime}&body=${encodeURIComponent(eventData.description + '\n\nInfo lebih lanjut: ' + eventData.url)}&location=${encodeURIComponent(eventData.location)}`;
    
    window.open(outlookUrl, '_blank');
  }

  function downloadICS() {
    const startDateTime = eventData.startDate.replace(/-/g, '') + 'T' + eventData.startTime.replace(':', '') + '00';
    const startHour = parseInt(eventData.startTime.split(':')[0]);
    const startMinute = parseInt(eventData.startTime.split(':')[1]);
    const endHour = startHour + 2;
    const endTime = endHour.toString().padStart(2, '0') + startMinute.toString().padStart(2, '0');
    const endDateTime = eventData.startDate.replace(/-/g, '') + 'T' + endTime + '00';
    
    const icsContent = `BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//SMK Negeri 4 Bogor//Event Calendar//EN
BEGIN:VEVENT
UID:${Date.now()}@smkn4bogor.sch.id
DTSTAMP:${new Date().toISOString().replace(/[-:]/g, '').split('.')[0]}Z
DTSTART:${startDateTime}
DTEND:${endDateTime}
SUMMARY:${eventData.title}
DESCRIPTION:${eventData.description}\n\nInfo lebih lanjut: ${eventData.url}
LOCATION:${eventData.location}
END:VEVENT
END:VCALENDAR`;
    
    const blob = new Blob([icsContent], { type: 'text/calendar' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${eventData.title.replace(/[^a-z0-9]/gi, '_').toLowerCase()}.ics`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
  }

  // Event listeners with debugging
  document.addEventListener('DOMContentLoaded', function() {
    console.log('Event data:', eventData);
    
    const googleBtn = document.getElementById('btn-google-calendar');
    const quickBtn = document.getElementById('btn-quick-calendar');
    const outlookBtn = document.getElementById('btn-outlook-calendar');
    const icsBtn = document.getElementById('btn-download-ics');
    
    if (googleBtn) {
      googleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Google Calendar button clicked');
        addToGoogleCalendar();
      });
    }
    
    if (quickBtn) {
      quickBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Quick Calendar button clicked');
        addToGoogleCalendar();
      });
    }
    
    if (outlookBtn) {
      outlookBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Outlook button clicked');
        addToOutlook();
      });
    }
    
    if (icsBtn) {
      icsBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('ICS button clicked');
        downloadICS();
      });
    }
  });
</script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * {
            font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
    </style>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                offset: 100
            });
            
            // Custom scroll reveal for elements with scroll-reveal class
            const scrollRevealElements = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right');
            
            const revealOnScroll = () => {
                scrollRevealElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('visible');
                    }
                });
            };
            
            // Initial check
            revealOnScroll();
            
            // Check on scroll
            window.addEventListener('scroll', revealOnScroll);
        });
    </script>
</body>
</html>

