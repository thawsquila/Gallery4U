<div>
    <section class="w-full lg:max-w-4xl max-w-[335px] mb-8">
        <h2 class="text-2xl font-bold mb-6 text-[#1b1b18] dark:text-[#EDEDEC]">Galeri Terbaru</h2>
        @foreach($galeriByKategori as $kategori => $galeris)
            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4 text-[#1b1b18] dark:text-[#EDEDEC]">{{ $kategori }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($galeris as $galeri)
                        <div class="bg-white dark:bg-[#161615] rounded-lg shadow-md overflow-hidden border border-[#19140035] dark:border-[#3E3E3A]">
                            @if($galeri->fotos && $galeri->fotos->isNotEmpty())
                                <img src="{{ asset('images/gallery/' . $galeri->fotos->first()->file) }}" 
                                     alt="{{ $galeri->judul }}" 
                                     class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <h4 class="font-semibold text-lg mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">{{ $galeri->judul }}</h4>
                                <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">{{ Str::limit($galeri->deskripsi, 100) }}</p>
                                <a href="{{ route('guest.detail-galeri', $galeri->slug) }}" 
                                   class="mt-4 inline-block text-[#f53003] dark:text-[#FF4433] hover:underline">Lihat Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
</div>