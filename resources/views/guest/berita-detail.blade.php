<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery4U - {{ $berita->judul }}</title>
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
<body class="bg-gray-50 scroll-smooth">
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
                    <a href="{{ route('guest.berita') }}" class="px-4 py-2 rounded-full font-semibold bg-blue-50 text-blue-600">Berita</a>
                    <a href="{{ route('guest.event') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Event</a>
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
            <!-- Article Content -->
            <div class="lg:col-span-2">
                <article class="bg-white rounded-xl shadow-lg overflow-hidden scroll-reveal-left">
                    <!-- Featured Image -->
                    <div class="h-64 md:h-80 relative overflow-hidden">
                        @if($berita->gambar)
                            <img src="{{ asset('images/posts/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="h-full bg-gradient-to-r from-primary to-primary-dark flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-8xl opacity-30"></i>
                            </div>
                        @endif
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-primary-light/20 text-white px-3 py-1 rounded-full text-sm font-semibold">{{ $berita->kategori->nama ?? 'Berita' }}</span>
                        </div>
                    </div>
                    
                    <!-- Article Header -->
                    <div class="p-8">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ $berita->created_at->format('d F Y') }}</span>
                            <span class="mx-3">•</span>
                            <i class="fas fa-user mr-2"></i>
                            <span>{{ $berita->petugas?->name ?? 'Admin' }}</span>
                            <span class="mx-3">•</span>
                            <i class="fas fa-eye mr-2"></i>
                            <span>{{ number_format($berita->views ?? 0) }} views</span>
                        </div>
                        
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">{{ $berita->judul }}</h1>
                        
                        <!-- Article Content -->
                        <div class="prose prose-lg max-w-none">
                            {!! $berita->isi !!}
                        </div>
                        <!-- Share Buttons -->
                        <div class="border-t pt-6 mt-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Bagikan Artikel</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-facebook-f mr-2"></i>Facebook
                                </a>
                                <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors">
                                    <i class="fab fa-twitter mr-2"></i>Twitter
                                </a>
                                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                                </a>
                            </div>
                        </div>

                        @if($berita->galeries && $berita->galeries->count())
                        <!-- Related Galleries Section -->
                        <div class="mt-10 scroll-reveal">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <span class="w-2 h-6 bg-[#2E5A63] rounded-full mr-3"></span>
                                Galeri Foto Terkait
                            </h2>
                            @foreach($berita->galeries as $gallery)
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
                    </div>
                </article>

                <!-- Comments Section -->
                <section id="komentar" class="mt-8">
                    @if(session('success'))
                        <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                            <ul class="list-disc pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- List Comments -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8 scroll-reveal-right">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Komentar</h3>
                        @forelse($berita->comments as $comment)
                            @include('guest.partials.comment-item', ['comment' => $comment, 'berita' => $berita, 'level' => 0])
                        @empty
                            <p class="text-gray-500">Belum ada komentar. Jadilah yang pertama memberikan komentar.</p>
                        @endforelse
                    </div>

                    @guest
                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 mb-8 text-center">
                        <i class="fas fa-sign-in-alt text-3xl text-[#66B1F2] mb-3"></i>
                        <p class="text-gray-700">Silakan <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="text-[#66B1F2] font-semibold hover:underline">login</a> untuk memberikan komentar</p>
                    </div>
                    @endguest

                    <!-- Comment Form -->
                    @auth
                    <div class="bg-white rounded-xl shadow-lg p-6 scroll-reveal-left">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Tinggalkan Komentar</h3>
                        <form action="{{ route('guest.berita.comment', $berita->id) }}" method="POST" class="grid grid-cols-1 gap-4">
                            @csrf
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Komentar</label>
                                <textarea name="content" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary/50 focus:border-primary" required>{{ old('content') }}</textarea>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-xs text-gray-500">Anda masuk sebagai <span class="font-semibold">{{ auth()->user()->name }}</span>.</p>
                                <div class="flex items-center gap-3">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-xs text-gray-500 hover:text-gray-700 underline">Keluar</button>
                                    </form>
                                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-lg font-semibold transition-colors">Kirim Komentar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endauth
                </section>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Related Articles -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8 scroll-reveal-right">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Berita Terkait</h3>
                    <div class="space-y-4">
                        @forelse($related as $relatedPost)
                            <article class="flex space-x-4">
                                <div class="w-20 h-20 overflow-hidden rounded-lg flex-shrink-0">
                                    @if($relatedPost->gambar)
                                        <img src="{{ asset('images/posts/' . $relatedPost->gambar) }}" alt="{{ $relatedPost->judul }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-r from-primary-dark to-primary flex items-center justify-center">
                                            <i class="fas fa-newspaper text-white text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <a href="{{ route('guest.berita.detail', $relatedPost->id) }}" class="font-semibold text-gray-800 text-sm mb-1 hover:text-primary">{{ $relatedPost->judul }}</a>
                                    <p class="text-gray-500 text-xs">{{ $relatedPost->created_at->format('d M Y') }}</p>
                                </div>
                            </article>
                        @empty
                            <p class="text-gray-500 text-sm">Tidak ada berita terkait.</p>
                        @endforelse
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="bg-white rounded-xl shadow-lg p-6 scroll-reveal-left">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Menu Cepat</h3>
                    <div class="space-y-3">
                        <a href="/#profil" class="flex items-center text-gray-600 hover:text-primary transition-colors">
                            <i class="fas fa-school mr-3"></i>
                            <span>Profil Sekolah</span>
                        </a>
                        <a href="/#jurusan" class="flex items-center text-gray-600 hover:text-primary transition-colors">
                            <i class="fas fa-graduation-cap mr-3"></i>
                            <span>Program Keahlian</span>
                        </a>
                        <a href="/#event" class="flex items-center text-gray-600 hover:text-primary transition-colors">
                            <i class="fas fa-calendar-alt mr-3"></i>
                            <span>Event Sekolah</span>
                        </a>
                        <a href="/#galeri" class="flex items-center text-gray-600 hover:text-primary transition-colors">
                            <i class="fas fa-images mr-3"></i>
                            <span>Galeri Foto</span>
                        </a>
                        <a href="/#kontak" class="flex items-center text-gray-600 hover:text-primary transition-colors">
                            <i class="fas fa-phone mr-3"></i>
                            <span>Kontak Kami</span>
                        </a>
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

            // Toggle reply forms
            window.toggleReplyForm = function(id) {
                const form = document.getElementById('reply-form-' + id);
                if (!form) return;
                form.classList.toggle('hidden');
            }

            // Toggle nested replies (lihat lebih banyak / tutup)
            window.toggleReplies = function(id) {
                const hidden = document.getElementById('replies-hidden-' + id);
                const btn = document.getElementById('toggle-replies-btn-' + id);
                if (!hidden || !btn) return;

                const expanded = btn.getAttribute('aria-expanded') === 'true';
                const count = btn.getAttribute('data-count') || '';

                if (expanded) {
                    // Collapse
                    hidden.classList.add('hidden');
                    btn.setAttribute('aria-expanded', 'false');
                    btn.textContent = count ? `Lihat semua balasan (${count})` : 'Lihat semua balasan';
                } else {
                    // Expand
                    hidden.classList.remove('hidden');
                    btn.setAttribute('aria-expanded', 'true');
                    btn.textContent = 'Tutup balasan';
                }
            }
        });
    </script>
</body>
</html>
