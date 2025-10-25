<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $galeri->judul ?? 'Detail Galeri' }} - SMK Negeri 4 Bogor</title>
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
          from { opacity: 0; transform: translateY(40px); }
          to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-700 { animation-delay: 0.7s; }
        
        @keyframes float {
          0%, 100% { transform: translateY(0px); }
          50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        
        @keyframes bounce {
          0%, 20%, 53%, 80%, 100% { transform: translate3d(0,0,0); }
          40%, 43% { transform: translate3d(0, -8px, 0); }
          70% { transform: translate3d(0, -4px, 0); }
          90% { transform: translate3d(0, -2px, 0); }
        }
        .animate-bounce-custom { animation: bounce 2s infinite; }
        
        .gallery-lightbox {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            justify-content: center;
            align-items: center;
        }
        .gallery-lightbox.active { display: flex; }
        .lightbox-image { max-width: 90%; max-height: 90vh; object-fit: contain; }
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            z-index: 1001;
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
        .lightbox-prev { left: 20px; }
        .lightbox-next { right: 20px; }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
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
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="ml-1 px-4 py-2 text-sm rounded-full ring-1 ring-gray-200 hover:bg-gray-100">Keluar</button>
                  </form>
                  @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-[45vh] flex items-center justify-center overflow-hidden">
        <!-- Background with gradient matching galeri page -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-[#254C6B]/60 to-black/80"></div>
        <div class="absolute inset-0 bg-[#66B1F2]/20"></div>
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-[#66B1F2]/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-[#4A90E2]/10 rounded-full blur-2xl animate-bounce-custom"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white/5 rounded-full blur-lg animate-float"></div>
            <div class="absolute top-20 right-20 w-20 h-20 bg-[#B3D9FF]/15 rounded-full blur-md animate-float delay-200"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 w-full py-16">
            <div class="max-w-4xl mx-auto">
                <div class="inline-block bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] px-4 py-2 rounded-full text-sm font-semibold mb-6 shadow-lg">
                    <i class="fas fa-bookmark mr-2"></i>{{ $galeri->kategori }}
                </div>
                <div class="relative animate-fade-in-up">
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-white leading-tight mb-4 drop-shadow-2xl">
                        {{ $galeri->judul ?? 'Detail Galeri' }}
                    </h1>
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#66B1F2]/30 to-[#4A90E2]/30 blur-xl opacity-40 rounded-xl"></div>
                </div>
                <div class="flex flex-wrap justify-center items-center gap-4 text-white/90 animate-fade-in-up delay-200 text-base lg:text-lg drop-shadow-lg">
                    <span><i class="far fa-calendar-alt mr-2"></i>{{ $galeri->created_at->format('d M Y') }}</span>
                    <span>•</span>
                    <span><i class="far fa-images mr-2"></i>{{ $galeri->fotos->count() }} Foto</span>
                    <span>•</span>
                    <span><i class="far fa-comment mr-2"></i>{{ $galeri->comments->count() }} Komentar</span>
                    <span>•</span>
                    <span><i class="far fa-heart mr-2"></i><span id="hero-like-count">{{ number_format($galeri->likes_count ?? 0) }}</span> Suka</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Gallery Content -->
            <div class="lg:col-span-2">
                <!-- Description -->
                @if($galeri->deskripsi)
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 animate-fade-in-up">
                    <div class="prose max-w-none text-gray-700">
                        {!! $galeri->deskripsi !!}
                    </div>
                </div>
                @endif

                <!-- Pinterest Style Masonry Gallery -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 animate-fade-in-up delay-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <span class="w-2 h-6 bg-[#66B1F2] rounded-full mr-3"></span>
                        Koleksi Foto
                    </h2>
                    
                    @if($galeri->fotos && $galeri->fotos->isNotEmpty())
                        <!-- Masonry Grid -->
                        <div class="columns-2 md:columns-3 gap-4 space-y-4">
                            @foreach($galeri->fotos as $index => $foto)
                                <div class="break-inside-avoid mb-4 group">
                                    <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                                        <img src="{{ asset('images/gallery/' . $foto->file) }}" 
                                             alt="Foto {{ $index + 1 }}" 
                                             class="w-full object-cover transition-transform duration-500 group-hover:scale-110 cursor-pointer" onclick="openLightbox({{ $index }})">
                                        <!-- Overlay actions -->
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-start justify-end p-2">
                                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">
                                                <a href="{{ asset('images/gallery/' . $foto->file) }}" download class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-white/90 text-gray-700 hover:text-[#66B1F2] shadow" title="Unduh foto">
                                                    <i class="fas fa-download text-sm"></i>
                                                </a>
                                                <button type="button" class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-white/90 text-gray-700 hover:text-[#66B1F2] shadow" title="Lihat lebih besar" onclick="openLightbox({{ $index }})">
                                                    <i class="fas fa-search-plus text-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 text-gray-500">
                            <i class="fas fa-images text-5xl mb-4 text-gray-300"></i>
                            <p>Belum ada foto dalam galeri ini</p>
                        </div>
                    @endif
                </div>

                <!-- Like Section: redesigned -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="text-gray-800 font-semibold flex items-center gap-2">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-pink-50 text-pink-500">
                                <i class="fas fa-heart"></i>
                            </span>
                            Suka galeri ini?
                        </span>
                        <span class="inline-flex items-center gap-2 text-sm text-gray-600 bg-gray-50 px-3 py-1 rounded-full ring-1 ring-gray-200">
                            <i class="far fa-user"></i>
                            <span id="card-like-count">{{ number_format($galeri->likes_count ?? 0) }}</span>
                            menyukai
                        </span>
                    </div>
                    <div>
                        @auth
                        <form id="like-form" method="POST" action="{{ route('guest.galeri.like', $galeri->id) }}" class="inline">
                            @csrf
                            <button
                                id="like-btn"
                                type="submit"
                                data-liked="{{ $liked ? '1' : '0' }}"
                                class="group relative overflow-hidden inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold transition-all shadow hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 {{ ($liked ?? false) ? 'bg-red-500 text-white ring-red-300' : 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white ring-blue-300' }}">
                                <span class="relative z-10 flex items-center gap-2">
                                    <i id="like-icon" class="{{ ($liked ?? false) ? 'fas' : 'far' }} fa-heart"></i>
                                    <span id="like-text">{{ ($liked ?? false) ? 'Batalkan Suka' : 'Suka' }}</span>
                                </span>
                                <span class="absolute inset-0 opacity-0 group-active:opacity-20 bg-white transition-opacity"></span>
                            </button>
                        </form>
                        @endauth
                        @guest
                        <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold transition-all shadow hover:shadow-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white ring-1 ring-blue-300">
                            <i class="far fa-heart"></i>
                            Suka
                        </a>
                        @endguest
                    </div>
                </div>

                <!-- Share Buttons -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const likeBtn = document.getElementById('like-btn');
                        const likeForm = document.getElementById('like-form');
                        if (!likeBtn || !likeForm) return;
                        
                        const likeIcon = document.getElementById('like-icon');
                        const likeText = document.getElementById('like-text');
                        const cardLikeCount = document.getElementById('card-like-count');
                        const heroLikeCount = document.getElementById('hero-like-count');
                        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                        if (!tokenMeta) { console.error('CSRF token not found'); return; }
                        const token = tokenMeta.getAttribute('content');
                        
                        likeForm.addEventListener('submit', async function(e) {
                            e.preventDefault();
                            if (likeBtn.disabled) return;
                            likeBtn.disabled = true;
                            
                            try {
                                const url = likeForm.getAttribute('action');
                                const res = await fetch(url, {
                                    method: 'POST',
                                    headers: { 
                                        'X-CSRF-TOKEN': token, 
                                        'Accept': 'application/json', 
                                        'X-Requested-With': 'XMLHttpRequest'
                                    },
                                    credentials: 'same-origin',
                                });
                                
                                if (!res.ok) {
                                    if (res.status === 419 || res.status === 401 || res.status === 403) {
                                        window.location.href = '{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}';
                                        return;
                                    }
                                    throw new Error(`HTTP ${res.status}`);
                                }
                                
                                const contentType = res.headers.get('Content-Type') || '';
                                if (!contentType.includes('application/json')) {
                                    likeForm.submit();
                                    return;
                                }
                                
                                const data = await res.json();
                                if (data && (data.status === 'liked' || data.status === 'unliked')) {
                                    const nowLiked = data.status === 'liked';
                                    const likesFormatted = new Intl.NumberFormat().format(data.likes || 0);
                                    if (cardLikeCount) cardLikeCount.textContent = likesFormatted;
                                    if (heroLikeCount) heroLikeCount.textContent = likesFormatted;
                                    likeBtn.setAttribute('data-liked', nowLiked ? '1' : '0');
                                    if (likeIcon) likeIcon.className = (nowLiked ? 'fas' : 'far') + ' fa-heart';
                                    if (likeText) likeText.textContent = nowLiked ? 'Batalkan Suka' : 'Suka';
                                    if (nowLiked) {
                                        likeBtn.className = 'group relative overflow-hidden inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold transition-all shadow hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 bg-red-500 text-white ring-red-300';
                                    } else {
                                        likeBtn.className = 'group relative overflow-hidden inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold transition-all shadow hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white ring-blue-300';
                                    }
                                } else {
                                    likeForm.submit();
                                }
                            } catch (e) {
                                console.error('Like error:', e);
                                likeForm.submit();
                            } finally {
                                likeBtn.disabled = false;
                            }
                        });
                    });
                </script>
                <div class="border-t pt-6 mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Bagikan Galeri</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f mr-2"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($galeri->judul ?? 'Galeri SMKN 4') }}" target="_blank" rel="noopener" class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode(($galeri->judul ?? 'Galeri SMKN 4') . ' ' . request()->fullUrl()) }}" target="_blank" rel="noopener" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Comments Section -->
                <section id="komentar" class="mt-8">
                    @if(session('success'))
                        <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-xl">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Comment List -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="far fa-comments text-[#66B1F2] mr-3"></i>
                            Komentar ({{ $galeri->comments->count() }})
                        </h3>
                        @forelse($galeri->comments as $comment)
                            @include('guest.partials.comment-item', ['comment' => $comment, 'berita' => $galeri, 'level' => 0])
                        @empty
                            <p class="text-gray-500 text-center py-8">Belum ada komentar. Jadilah yang pertama!</p>
                        @endforelse
                    </div>

                    @guest
                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 text-center">
                        <i class="fas fa-sign-in-alt text-3xl text-[#66B1F2] mb-3"></i>
                        <p class="text-gray-700 mb-4">Silakan <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="text-[#66B1F2] font-semibold hover:underline">login</a> untuk memberikan komentar</p>
                    </div>
                    @endguest

                    <!-- Comment Form -->
                    @auth
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="far fa-edit text-[#66B1F2] mr-3"></i>
                            Tinggalkan Komentar
                        </h3>
                        <form action="{{ route('guest.galeri.comment', $galeri->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Komentar</label>
                                <textarea name="content" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#66B1F2]/50 focus:border-[#66B1F2] transition" placeholder="Tulis komentar Anda..." required></textarea>
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-[#66B1F2] to-[#4A90E2] hover:from-[#4A90E2] hover:to-[#66B1F2] text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Komentar
                            </button>
                        </form>
                    </div>
                    @endauth
                </section>
            </div>

            <!-- Sidebar: Related Galleries -->
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-images text-[#66B1F2] mr-3"></i>
                            Galeri Lainnya
                        </h3>
                        @if($relatedGaleri && $relatedGaleri->isNotEmpty())
                            <div class="space-y-4">
                                @foreach($relatedGaleri as $related)
                                    <a href="{{ route('guest.detail-galeri', $related->id) }}" class="block group">
                                        <div class="flex gap-3 p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                                            <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden">
                                                @if($related->fotos && $related->fotos->isNotEmpty())
                                                    <img src="{{ asset('images/gallery/' . $related->fotos->first()->file) }}" 
                                                         alt="{{ $related->judul }}"
                                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                                @else
                                                    <div class="w-full h-full bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] flex items-center justify-center">
                                                        <i class="fas fa-images text-white text-xl"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-semibold text-gray-800 text-sm line-clamp-2 group-hover:text-[#66B1F2] transition-colors mb-1">
                                                    {{ $related->judul }}
                                                </h4>
                                                <div class="flex items-center gap-3 text-xs text-gray-500">
                                                    <span><i class="far fa-images mr-1"></i>{{ $related->fotos->count() }}</span>
                                                    <span>{{ $related->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <a href="{{ route('guest.galeri') }}" class="block mt-6 text-center text-[#66B1F2] font-semibold hover:text-[#4A90E2] transition-colors">
                                Lihat Semua Galeri <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        @else
                            <p class="text-gray-500 text-sm">Belum ada galeri lainnya</p>
                        @endif
                    </div>

                    <a href="{{ route('guest.galeri') }}" class="block bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-800 px-6 py-3 rounded-xl font-semibold transition-all duration-300 text-center shadow-md">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Lightbox -->
    <div id="gallery-lightbox" class="gallery-lightbox">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <div class="relative">
            <img id="lightbox-image" class="lightbox-image" src="" alt="Lightbox Image">
            <div class="text-white text-center mt-4" id="lightbox-counter">1 / 1</div>
            <a id="lightbox-download" href="#" download class="absolute top-0 right-0 mt-2 mr-2 bg-white/90 text-gray-800 px-3 py-1.5 rounded-lg shadow hover:bg-white" title="Unduh foto ini">
                <i class="fas fa-download"></i>
            </a>
        </div>
        <div class="lightbox-nav lightbox-prev" onclick="changeImage(-1)"><i class="fas fa-chevron-left"></i></div>
        <div class="lightbox-nav lightbox-next" onclick="changeImage(1)"><i class="fas fa-chevron-right"></i></div>
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

    <!-- ScrollReveal.js -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        // Lightbox
        let currentIndex = 0;
        const photos = @json($galeri->fotos->pluck('file'));
        
        function openLightbox(index) {
            currentIndex = index;
            const lightbox = document.getElementById('gallery-lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const counter = document.getElementById('lightbox-counter');
            const dl = document.getElementById('lightbox-download');
            const src = `{{ asset('images/gallery/') }}/${photos[index]}`;
            lightboxImage.src = src;
            counter.textContent = `${index + 1} / ${photos.length}`;
            if (dl) dl.href = src;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeLightbox() {
            document.getElementById('gallery-lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        function changeImage(step) {
            currentIndex = (currentIndex + step + photos.length) % photos.length;
            const src = `{{ asset('images/gallery/') }}/${photos[currentIndex]}`;
            document.getElementById('lightbox-image').src = src;
            document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${photos.length}`;
            const dl = document.getElementById('lightbox-download');
            if (dl) dl.href = src;
        }
        
        document.getElementById('gallery-lightbox').addEventListener('click', function(e) {
            if (e.target === this) closeLightbox();
        });
        
        document.addEventListener('keydown', function(e) {
            if (!document.getElementById('gallery-lightbox').classList.contains('active')) return;
            if (e.key === 'Escape') closeLightbox();
            else if (e.key === 'ArrowLeft') changeImage(-1);
            else if (e.key === 'ArrowRight') changeImage(1);
        });

        // Comment toggle functions
        function toggleReplyForm(commentId) {
            const form = document.getElementById('reply-form-' + commentId);
            form.classList.toggle('hidden');
        }

        function toggleReplies(commentId) {
            const repliesDiv = document.getElementById('replies-hidden-' + commentId);
            const btn = document.getElementById('toggle-replies-btn-' + commentId);
            const isHidden = repliesDiv.classList.contains('hidden');
            repliesDiv.classList.toggle('hidden');
            const count = btn.getAttribute('data-count');
            btn.textContent = isHidden ? `Sembunyikan balasan (${count})` : `Lihat semua balasan (${count})`;
        }

        // ScrollReveal init
        if (window.ScrollReveal) {
            const sr = ScrollReveal({
                distance: '30px',
                duration: 800,
                easing: 'ease-out',
                reset: false
            });
            sr.reveal('.animate-fade-in-up', { origin: 'bottom', interval: 100 });
        }

        // Note: Like functionality is handled by the main implementation above (lines 273-344)
    </script>
</body>
</html>
