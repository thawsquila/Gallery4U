@extends('admin.layout')

@section('title', 'Dashboard')

@push('styles')
<style>
  /* Khusus dashboard */
  .animate-fade-in-up { animation: fadeInUp 0.6s ease-out; }
  @keyframes fadeInUp { from { opacity:0; transform: translateY(40px);} to {opacity:1; transform:none;} }
  .card { transition: all .3s ease; border-radius: 1rem; overflow: hidden; }
  .card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,.1); }
</style>
@endpush

@section('content')
  <!-- Print Report Header (shown only in print) -->
  <section id="printHeader" class="hidden">
    <div class="px-6 pt-6">
      <div class="text-center mb-4">
        <h2 class="text-2xl font-bold">Laporan Performa Website</h2>
        <div class="text-sm text-gray-600">SMK Negeri 4 Bogor</div>
        <div class="text-sm text-gray-600">Tanggal Cetak: <span id="printDate"></span></div>
      </div>
      <hr>
    </div>
  </section>

  <!-- Logged-in User Widget -->
  <section class="mb-6">
    <div class="glass-effect rounded-2xl p-5 flex items-center justify-between">
      <div class="flex items-center gap-4">
        @php $av = Auth::user()->avatar ? asset('images/avatars/'.Auth::user()->avatar) : null; @endphp
        <div class="w-12 h-12 rounded-full overflow-hidden ring-2 ring-blue-100 bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-lg font-bold">
          @if($av)
            <img src="{{ $av }}" alt="Avatar" class="w-full h-full object-cover">
          @else
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
          @endif
        </div>
        <div>
          <div class="text-sm text-gray-500">Anda login sebagai</div>
          <div class="text-base font-semibold text-gray-900">{{ Auth::user()->name }}</div>
          <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
        </div>
      </div>
      <span class="inline-flex items-center px-3 py-1 text-xs rounded-full bg-blue-50 text-blue-700 font-medium">
        <i class="fas fa-user-shield mr-1"></i>{{ ucfirst(Auth::user()->role ?? 'admin') }}
      </span>
    </div>
  </section>

  <!-- Dashboard Content -->
  <div class="animate-fade-in-up">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <!-- Total Posts Card -->
      <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
        <div class="flex items-center">
          <div class="p-3 rounded-xl bg-blue-100 text-blue-600 mr-4">
            <i class="fas fa-newspaper text-xl"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-600">Total Berita & Event</p>
            <h3 class="text-2xl font-bold text-gray-900">{{ $totalPosts }}</h3>
          </div>
        </div>
      </div>

      <!-- Total Views Card -->
      <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
        <div class="flex items-center">
          <div class="p-3 rounded-xl bg-orange-100 text-orange-600 mr-4">
            <i class="fas fa-eye text-xl"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-600">Total Views</p>
            <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalViews ?? 0) }}</h3>
          </div>
        </div>
      </div>

      <!-- Total Galleries Card -->
      <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
        <div class="flex items-center">
          <div class="p-3 rounded-xl bg-green-100 text-green-600 mr-4">
            <i class="fas fa-images text-xl"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-600">Total Galeri</p>
            <h3 class="text-2xl font-bold text-gray-900">{{ $totalGalleries }}</h3>
          </div>
        </div>
      </div>

      <!-- Total Visitors Card -->
      <div class="glass-effect rounded-2xl p-6 shadow-lg transition-all duration-300 card">
        <div class="flex items-center">
          <div class="p-3 rounded-xl bg-purple-100 text-purple-600 mr-4">
            <i class="fas fa-chart-line text-xl"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-600">Total Pengunjung</p>
            <h3 class="text-2xl font-bold text-gray-900">{{ $totalVisitors }}</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Article Statistics Section -->
    <div class="glass-effect rounded-2xl p-6 shadow-lg card mb-8 relative z-0">
      <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-800 flex items-center">
          <div class="p-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white mr-3">
            <i class="fas fa-chart-bar"></i>
          </div>
          Statistik Berita Terbanyak Dibaca
        </h3>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Chart Section -->
        <div class="bg-white rounded-xl p-6 border border-gray-100">
          <h4 class="text-lg font-semibold text-gray-800 mb-4">Top 5 Berita Terpopuler</h4>
          <div class="relative h-80">
            <canvas id="mostReadChart"></canvas>
          </div>
        </div>

        <!-- Detailed List -->
        <div class="bg-white rounded-xl p-6 border border-gray-100">
          <h4 class="text-lg font-semibold text-gray-800 mb-4">Detail Berita Terpopuler</h4>
          <div class="space-y-3 max-h-80 overflow-y-auto">
            @forelse($mostViewedPosts ?? [] as $index => $post)
              <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="flex items-center space-x-3">
                  <div class="flex-shrink-0 w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-full flex items-center justify-center text-sm font-bold">
                    {{ $index + 1 }}
                  </div>
                  <div class="flex-1 min-w-0">
                    <h5 class="text-sm font-medium text-gray-800 truncate">{{ $post->judul }}</h5>
                    <div class="flex items-center space-x-2 mt-1">
                      <span class="text-xs px-2 py-1 rounded-full {{ $post->kategori_id == 1 ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                        {{ $post->kategori_id == 1 ? 'Berita' : 'Event' }}
                      </span>
                      <span class="text-xs text-gray-500">{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center space-x-2">
                  <div class="text-right">
                    <div class="text-lg font-bold text-blue-600">{{ number_format($post->views) }}</div>
                    <div class="text-xs text-gray-500">views</div>
                  </div>
                  <div class="w-12 bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full" style="width: {{ $mostViewedPosts->count() > 0 ? ($post->views / $mostViewedPosts->first()->views) * 100 : 0 }}%"></div>
                  </div>
                </div>
              </div>
            @empty
              <div class="text-center py-8">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="fas fa-chart-bar text-2xl text-gray-400"></i>
                </div>
                <p class="text-gray-500">Belum ada data statistik artikel</p>
              </div>
            @endforelse
          </div>
        </div>
      </div>

      <!-- Summary Stats -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6 pt-6 border-t border-gray-200">
        <div class="text-center p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg">
          <div class="text-2xl font-bold text-blue-600">{{ $mostViewedPosts->where('kategori_id', 1)->count() ?? 0 }}</div>
          <div class="text-sm text-blue-700">Berita Populer</div>
        </div>
        <div class="text-center p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-lg">
          <div class="text-2xl font-bold text-green-600">{{ $mostViewedPosts->where('kategori_id', 2)->count() ?? 0 }}</div>
          <div class="text-sm text-green-700">Event Populer</div>
        </div>
        <div class="text-center p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg">
          <div class="text-2xl font-bold text-purple-600">{{ $mostViewedPosts->max('views') ?? 0 }}</div>
          <div class="text-sm text-purple-700">Views Tertinggi</div>
        </div>
        <div class="text-center p-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg">
          <div class="text-2xl font-bold text-orange-600">{{ number_format($mostViewedPosts->avg('views') ?? 0, 0) }}</div>
          <div class="text-sm text-orange-700">Rata-rata Views</div>
        </div>
      </div>

      <!-- Users & Visitors -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 mt-8">
        <!-- Recent Registered Users -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg card">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-gray-800">Pengguna Terdaftar Terbaru</h3>
            <span class="text-sm text-gray-500">Total pengguna: {{ number_format($totalUsers ?? 0) }}</span>
          </div>
          <div class="space-y-3">
            @forelse($recentUsers ?? [] as $u)
              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                @php $av = $u->avatar ? asset('images/avatars/'.$u->avatar) : null; @endphp
                <div class="w-10 h-10 rounded-full overflow-hidden bg-gradient-to-r from-blue-500 to-indigo-600 text-white flex items-center justify-center mr-3">
                  @if($av)
                    <img src="{{ $av }}" class="w-full h-full object-cover" alt="avatar">
                  @else
                    {{ strtoupper(substr($u->name,0,1)) }}
                  @endif
                </div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-semibold text-gray-800 truncate">{{ $u->name }}</div>
                  <div class="text-xs text-gray-500 truncate">{{ $u->email }}</div>
                </div>
                <span class="text-xs px-2 py-1 rounded-full {{ $u->role==='admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">{{ ucfirst($u->role ?? 'user') }}</span>
              </div>
            @empty
              <p class="text-sm text-gray-500 text-center py-4">Belum ada pengguna terdaftar.</p>
            @endforelse
          </div>
        </div>

        <!-- Recent Visitors/Guests -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg card">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-gray-800">Kunjungan Terbaru (Guest)</h3>
            <span class="text-sm text-gray-500">7 hari: {{ number_format($lastWeekVisitors ?? 0) }}</span>
          </div>
          <div class="space-y-3 max-h-96 overflow-y-auto">
            @forelse($recentVisitors ?? [] as $v)
              <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <div class="min-w-0">
                  <div class="text-sm font-medium text-gray-800 truncate">{{ $v->page_visited }}</div>
                  <div class="text-xs text-gray-500 truncate">{{ $v->ip_address }} · {{ \Carbon\Carbon::parse($v->visit_date)->format('d M Y H:i') }}</div>
                </div>
                <span class="ml-3 text-xs text-gray-500 hidden md:inline truncate max-w-[180px]">{{ Str::limit($v->user_agent, 50) }}</span>
              </div>
            @empty
              <p class="text-sm text-gray-500 text-center py-4">Belum ada data kunjungan.</p>
            @endforelse
          </div>
        </div>
      </div>

      <!-- Analytics Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Most Visited Pages -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg card">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Halaman Terpopuler</h3>
          </div>
          <div class="space-y-4">
            @forelse($mostVisitedPages as $page)
              <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition-colors">
                <div class="flex items-center space-x-3">
                  <div class="p-2 rounded-lg 
                    @if(str_starts_with($page->page_visited, '/berita-detail/')) bg-blue-100 text-blue-600
                    @elseif(str_starts_with($page->page_visited, '/event-detail/')) bg-green-100 text-green-600
                    @else bg-indigo-100 text-indigo-600 @endif">
                    @if(str_starts_with($page->page_visited, '/berita-detail/'))
                      <i class="fas fa-newspaper"></i>
                    @elseif(str_starts_with($page->page_visited, '/event-detail/'))
                      <i class="fas fa-calendar-alt"></i>
                    @elseif($page->page_visited === '/')
                      <i class="fas fa-home"></i>
                    @elseif($page->page_visited === '/galeri')
                      <i class="fas fa-images"></i>
                    @elseif($page->page_visited === '/teachers')
                      <i class="fas fa-chalkboard-teacher"></i>
                    @else
                      <i class="fas fa-file-alt"></i>
                    @endif
                  </div>
                  <div>
                    <span class="text-sm font-medium text-gray-800">{{ $page->page_name }}</span>
                    @if(str_starts_with($page->page_visited, '/berita-detail/') || str_starts_with($page->page_visited, '/event-detail/'))
                      <div class="text-xs text-gray-500 mt-1">{{ $page->page_visited }}</div>
                    @endif
                  </div>
                </div>
                <div class="bg-indigo-100 text-indigo-800 text-xs font-medium px-3 py-1 rounded-full">
                  {{ $page->total }} kunjungan
                </div>
              </div>
            @empty
              <p class="text-sm text-gray-500 text-center py-4">Belum ada data kunjungan halaman.</p>
            @endforelse
          </div>
        </div>

        <!-- Most Viewed Posts -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg card">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Berita Terpopuler</h3>
            <a href="{{ route('admin.posts') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Lihat Semua</a>
          </div>
          <div class="space-y-4">
            @forelse($mostViewedPosts ?? [] as $post)
              <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition-colors">
                <div class="flex items-center space-x-3">
                  <div class="p-2 rounded-lg bg-orange-100 text-orange-600">
                    <i class="fas {{ $post->kategori_id == 1 ? 'fa-newspaper' : 'fa-calendar-alt' }}"></i>
                  </div>
                  <div class="flex-1 min-w-0">
                    <span class="text-sm font-medium text-gray-800 block truncate">{{ $post->judul }}</span>
                    <span class="text-xs text-gray-500">{{ $post->kategori_id == 1 ? 'Berita' : 'Event' }} • {{ $post->created_at->format('d M Y') }}</span>
                  </div>
                </div>
                <div class="bg-orange-100 text-orange-800 text-xs font-medium px-3 py-1 rounded-full">
                  {{ number_format($post->views) }} views
                </div>
              </div>
            @empty
              <p class="text-sm text-gray-500 text-center py-4">Belum ada artikel dengan views.</p>
            @endforelse
          </div>
        </div>
      </div>

      <!-- Recent Content -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Posts -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg card">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Berita & Event Terbaru</h3>
            <a href="{{ route('admin.posts') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Lihat Semua</a>
          </div>
          <div class="space-y-4">
            @forelse($recentPosts as $post)
              <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                <div class="flex-shrink-0 w-16 h-16 bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                  @if($post->gambar)
                    <img src="{{ asset('images/posts/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover">
                  @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                      <i class="fas fa-image text-gray-300"></i>
                    </div>
                  @endif
                </div>
                <div class="flex-1 min-w-0">
                  <h4 class="text-sm font-medium text-gray-800 truncate">{{ $post->judul }}</h4>
                  <div class="flex items-center justify-between mt-1">
                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    <div class="flex items-center space-x-1 text-xs text-gray-500">
                      <i class="fas fa-eye"></i>
                      <span>{{ number_format($post->views ?? 0) }}</span>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <p class="text-sm text-gray-500 text-center py-4">Tidak ada berita atau event terbaru.</p>
            @endforelse
          </div>
        </div>

        <!-- Recent Galleries -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg card">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Galeri Terbaru</h3>
            <a href="{{ route('admin.galleries') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Lihat Semua</a>
          </div>
          <div class="grid grid-cols-3 gap-3 mt-4">
            @forelse($recentGalleries as $gallery)
              <div class="aspect-square rounded-lg overflow-hidden bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
                @if($gallery->fotos->count() > 0)
                  <img src="{{ asset('images/gallery/' . $gallery->fotos->first()->file) }}" alt="{{ $gallery->judul }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                @else
                  <div class="w-full h-full flex items-center justify-center bg-gray-50">
                    <i class="fas fa-images text-2xl text-gray-300"></i>
                  </div>
                @endif
              </div>
            @empty
              <div class="col-span-3 text-center py-6">
                <i class="fas fa-images text-3xl text-gray-300 mb-2"></i>
                <p class="text-sm text-gray-500">Tidak ada galeri terbaru</p>
              </div>
            @endforelse
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('scripts')
@isset($mostViewedPosts)
<script>
// Most Read Articles Chart
document.addEventListener('DOMContentLoaded', function() {
  const canvas = document.getElementById('mostReadChart');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  const mostReadData = @json($mostViewedPosts ?? []);
  const labels = mostReadData.map(item => item.judul.length > 20 ? item.judul.substring(0, 20) + '...' : item.judul);
  const views = mostReadData.map(item => item.views || 0);
  const categories = mostReadData.map(item => item.kategori_id);

  const backgroundColors = categories.map(cat => cat === 1 ? 'rgba(59, 130, 246, 0.8)' : 'rgba(34, 197, 94, 0.8)');
  const borderColors = categories.map(cat => cat === 1 ? 'rgba(59, 130, 246, 1)' : 'rgba(34, 197, 94, 1)');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Views',
        data: views,
        backgroundColor: backgroundColors,
        borderColor: borderColors,
        borderWidth: 2,
        borderRadius: 8,
        borderSkipped: false,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: 'rgba(255, 255, 255, 0.95)',
          titleColor: '#1f2937',
          bodyColor: '#4b5563',
          borderColor: '#e5e7eb',
          borderWidth: 1,
          padding: 12,
          boxPadding: 6,
          usePointStyle: true,
          callbacks: {
            title: function(context) {
              const fullTitle = mostReadData[context[0].dataIndex].judul;
              return fullTitle.length > 40 ? fullTitle.substring(0, 40) + '...' : fullTitle;
            },
            label: function(context) {
              const category = categories[context.dataIndex] === 1 ? 'Berita' : 'Event';
              return `${category}: ${context.parsed.y.toLocaleString()} views`;
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { precision: 0, callback: function(value){ return value.toLocaleString(); } },
          grid: { color: 'rgba(0, 0, 0, 0.05)' }
        },
        x: {
          ticks: { maxRotation: 45, minRotation: 0 },
          grid: { display: false }
        }
      },
      animation: { duration: 1000, easing: 'easeOutQuart' }
    }
  });
});
</script>
@endisset

@isset($visitorChartData)
<script>
// Visitor Chart (render only when data and canvas exist)
document.addEventListener('DOMContentLoaded', function() {
  const canvas = document.getElementById('visitorChart');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  const visitorData = @json($visitorChartData);
  const labels = visitorData.map(item => { const date = new Date(item.date); return date.toLocaleDateString('id-ID', { weekday: 'short', day: 'numeric' }); });
  const data = visitorData.map(item => item.count);

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Jumlah Pengunjung',
        data: data,
        backgroundColor: 'rgba(79, 70, 229, 0.2)',
        borderColor: 'rgba(79, 70, 229, 1)',
        borderWidth: 2,
        tension: 0.3,
        fill: true,
        pointBackgroundColor: 'rgba(79, 70, 229, 1)',
        pointBorderColor: '#fff',
        pointBorderWidth: 2,
        pointRadius: 4,
        pointHoverRadius: 6
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: { beginAtZero: true, ticks: { precision: 0 } }
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: 'rgba(255, 255, 255, 0.9)',
          titleColor: '#1e3c72',
          bodyColor: '#4b5563',
          borderColor: '#e5e7eb',
          borderWidth: 1,
          padding: 12,
          boxPadding: 6,
          usePointStyle: true,
          callbacks: {
            label: function(context) { return `Pengunjung: ${context.parsed.y}`; }
          }
        }
      }
    }
  });
});
</script>
@endisset
@endpush
