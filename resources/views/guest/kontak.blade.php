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

    @include('guest.partials.footer')
</body>
</html>
