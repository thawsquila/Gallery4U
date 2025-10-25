<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru & Tenaga Pendidik - SMK Negeri 4 Bogor</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * {
            font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
        @keyframes fadeInUp { from {opacity:0; transform: translateY(30px);} to {opacity:1; transform: translateY(0);} }
        .animate-fade-in-up{ animation: fadeInUp .8s ease-out both; }
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
                <a href="{{ route('guest.teachers') }}" class="px-4 py-2 rounded-full font-semibold bg-blue-50 text-blue-600">Tenaga Pendidik</a>
                <a href="{{ route('guest.berita') }}" class="px-4 py-2 rounded-full text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition">Berita</a>
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
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="ml-1 px-4 py-2 text-sm rounded-full ring-1 ring-gray-200 hover:bg-gray-100">Keluar</button>
                </form>
                @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
        <!-- Background layers -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
        <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
        <!-- Animated bubbles -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-[#66B1F2]/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-[#4A90E2]/10 rounded-full blur-2xl animate-bounce"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white/5 rounded-full blur-lg animate-fade-in-up"></div>
            <div class="absolute top-20 right-20 w-20 h-20 bg-[#B3D9FF]/15 rounded-full blur-md animate-fade-in-up"></div>
        </div>

        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-4xl mx-auto">
                <div class="relative animate-fade-in-up">
                    <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight mb-6 drop-shadow-2xl">
                        <span class="bg-gradient-to-r from-[#66B1F2] via-white to-[#4A90E2] bg-clip-text text-transparent">Guru</span>
                        <br>
                        <span class="text-white">& Staff TU</span>
                    </h1>
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#66B1F2]/30 to-[#4A90E2]/30 blur-xl opacity-40 rounded-xl"></div>
                </div>
                <p class="text-xl lg:text-2xl text-white/90 leading-relaxed mb-2 max-w-3xl mx-auto animate-fade-in-up delay-400 drop-shadow-lg font-medium">Kenali para pendidik profesional SMKN 4 Bogor</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ q: '' }">
        @if(session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">{{ session('error') }}</div>
        @endif

        @if($teachers->isEmpty())
            <div class="bg-white rounded-xl shadow p-10 text-center text-gray-600">
                Belum ada data tenaga pendidik.
            </div>
        @else
            <!-- Toolbar -->
            <div class="bg-white rounded-xl shadow p-4 mb-6 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3 w-full md:w-1/2">
                    <div class="relative flex-1">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input x-model="q" type="text" placeholder="Cari nama, jabatan, atau keahlian..." class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary/60 focus:border-primary">
                    </div>
                </div>
                <a href="{{ route('guest.home') }}#tenagapendidik" class="hidden md:inline-flex items-center text-sm text-gray-600 hover:text-primary"><i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($teachers as $t)
                    <article class="bg-white rounded-2xl shadow hover:shadow-2xl transition overflow-hidden animate-fade-in-up border border-gray-100" x-show="
                        (q === '') ||
                        ('{{ Str::lower($t->nama) }}'.includes(q.toLowerCase()) ||
                         '{{ Str::lower($t->jabatan ?? '') }}'.includes(q.toLowerCase()) ||
                         '{{ Str::lower($t->bidang ?? '') }}'.includes(q.toLowerCase()) ||
                         '{{ Str::lower($t->keahlian ?? '') }}'.includes(q.toLowerCase()))
                    " x-transition>
                        <div class="relative h-56 bg-gray-100">
                            @if($t->foto)
                                <img src="{{ asset('images/teachers/' . $t->foto) }}" alt="{{ $t->nama }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-600 to-cyan-700 flex items-center justify-center">
                                    <i class="fas fa-user text-white/40 text-5xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <h3 class="text-lg font-bold text-white drop-shadow">{{ $t->nama }}</h3>
                                <p class="text-white/90 text-xs">{{ $t->jabatan ?? ($t->bidang ?? 'Staff TU') }}</p>
                            </div>
                        </div>
                        <div class="p-4">
                            @php $tags = collect(explode(',', (string) $t->keahlian))->filter(fn($x) => trim($x) !== '')->take(3); @endphp
                            <div class="flex flex-wrap gap-2 mb-3">
                                @foreach($tags as $tag)
                                    <span class="px-3 py-1 bg-[#E6F0FA] text-[#1E88E5] text-xs font-semibold rounded-full">{{ trim($tag) }}</span>
                                @endforeach
                                @if($tags->isEmpty() && $t->bidang)
                                    <span class="px-3 py-1 bg-[#E6F0FA] text-[#1E88E5] text-xs font-semibold rounded-full">{{ $t->bidang }}</span>
                                @endif
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($t->bio ?? 'Staff TU SMKN 4 Bogor', 120) }}</p>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $teachers->links() }}
            </div>
        @endif
    </main>

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
</body>
</html>
