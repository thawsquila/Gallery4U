<!-- Shared Navbar (from home.blade.php) -->
<nav class="fixed top-6 left-1/2 transform -translate-x-1/2 w-[95%] md:w-[90%] bg-white/90 shadow-2xl rounded-lg z-50 backdrop-blur-xl nav-glass" style="font-family:'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;">
  <div class="max-w-7xl mx-auto px-3 md:px-4">
    <div class="flex items-center h-16 gap-2 md:gap-4">
      <!-- Logo & Nama -->
      <div class="flex items-center space-x-1">
        <img src="{{ asset('images/favicon.svg') }}" alt="SMKN 4 Logo" class="w-10 h-10 md:w-11 md:h-11 object-contain" />
        <span class="text-lg md:text-xl font-bold text-gray-800 leading-none">Gallery4U</span>
      </div>

      <!-- Menu Desktop -->
      <div class="hidden md:flex items-center gap-2 ml-1">
        <div class="flex items-center gap-1 bg-white/90 rounded-xl px-3 py-1 shadow-lg ring-1 ring-gray-200/70 backdrop-blur relative">
          <a href="{{ route('guest.home') }}#home" class="px-4 py-2 rounded-xl font-semibold transition duration-300 scroll-smooth nav-link bg-blue-50 text-blue-600">Beranda</a>

          <!-- Informasi dropdown (click to open) -->
          <div class="relative">
            <button type="button" onclick="toggleMenu('infoMenu')" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300">Informasi ▾</button>
            <div id="infoMenu" class="absolute left-0 top-full mt-2 w-64 bg-white shadow-lg ring-1 ring-gray-200 rounded-xl py-2 hidden z-40">
              <a href="{{ route('guest.home') }}#profil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profil Sekolah</a>
              <a href="{{ route('guest.home') }}#jurusan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Lihat Jurusan</a>
              <a href="{{ route('guest.home') }}#tenagapendidik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Daftar Guru (Beranda)</a>
            </div>
          </div>

          <a href="{{ route('guest.home') }}#berita" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Berita</a>
          <a href="{{ route('guest.home') }}#event" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Event</a>
          <a href="{{ route('guest.home') }}#galeri" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Galeri</a>
          <a href="{{ route('guest.home') }}#kontak" class="px-4 py-2 rounded-xl text-gray-700 hover:text-blue-600 hover:bg-blue-50 font-semibold transition duration-300 scroll-smooth nav-link">Kontak</a>
        </div>
        @guest
        <a href="{{ route('user.login', ['redirect' => request()->getRequestUri()]) }}" class="px-5 py-2 rounded-xl text-gray-700 bg-white hover:bg-gray-100 ring-1 ring-gray-200 font-semibold transition">Login</a>
        <a href="{{ route('user.register', ['redirect' => request()->getRequestUri()]) }}" class="px-6 py-2 rounded-xl bg-gradient-to-br from-[#66B1F2] to-[#4A90E2] text-white font-bold shadow-[0_10px_25px_-10px_rgba(59,130,246,0.6)] hover:opacity-95 transition">Daftar</a>
        @endguest
        @auth
        <span class="text-sm text-gray-600">Hi, <span class="font-semibold">{{ auth()->user()->name }}</span></span>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="ml-1 px-4 py-2 text-base rounded-xl ring-1 ring-gray-200 hover:bg-gray-100 font-semibold text-gray-700 bg-white">Keluar</button>
        </form>
        @endauth
      </div>
    </div>
  </div>
</nav>
<script>
  // Navbar dropdown: Informasi
  function toggleMenu(id){
    const el = document.getElementById(id);
    if(!el) return;
    el.classList.toggle('hidden');
  }
  // close on outside click
  document.addEventListener('click', function(e){
    const isButton = e.target.closest('button[onclick^="toggleMenu"]');
    const isMenu = e.target.closest('#infoMenu');
    if(!isButton && !isMenu){
      const el = document.getElementById('infoMenu');
      if(el) el.classList.add('hidden');
    }
  });
</script>
