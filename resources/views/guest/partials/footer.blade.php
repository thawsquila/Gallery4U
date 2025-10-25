<!-- Shared Footer (from home.blade.php) -->
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
          <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/smkn4kotabogor/" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors"><i class="fab fa-instagram"></i></a>
          <a href="https://www.youtube.com/@smknegeri4bogor905" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors"><i class="fab fa-youtube"></i></a>
          <a href="https://www.tiktok.com/@smkn4kotabogor" class="bg-primary hover:bg-primary-dark text-white p-3 rounded-lg transition-colors"><i class="fab fa-tiktok"></i></a>
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
          <a href="https://www.facebook.com/p/SMK-NEGERI-4-KOTA-BOGOR-100054636630766/?locale=id_ID" class="flex items-center text-gray-300 hover:text-primary transition-colors"><i class="fab fa-facebook-f mr-3"></i><span>Facebook</span></a>
          <a href="https://www.instagram.com/smkn4kotabogor/" class="flex items-center text-gray-300 hover:text-primary transition-colors"><i class="fab fa-instagram mr-3"></i><span>Instagram</span></a>
          <a href="https://www.youtube.com/@smknegeri4bogor905" class="flex items-center text-gray-300 hover:text-primary transition-colors"><i class="fab fa-youtube mr-3"></i><span>YouTube</span></a>
          <a href="https://www.tiktok.com/@smkn4kotabogor" class="flex items-center text-gray-300 hover:text-primary transition-colors"><i class="fab fa-tiktok mr-3"></i><span>TikTok</span></a>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-700 mt-12 pt-8 text-center">
    <p class="text-gray-400">&copy; 2025 <span class="font-semibold text-white">Gallery4U</span> by 
    <span class="text-blue-400 font-semibold">Cero Tech</span>. All rights reserved.</p><p class="text-gray-400">&copy; 2025 SMK Negeri 4. All rights reserved.</p>
    </div>
  </div>
</footer>
