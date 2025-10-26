<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery4U - Laporan Website</title>
  <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/png">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; color: #111827; }
    .container { max-width: 960px; margin: 0 auto; padding: 24px; }
    .grid { display: grid; gap: 16px; }
    .grid-4 { grid-template-columns: repeat(4, minmax(0,1fr)); }
    .grid-2 { grid-template-columns: repeat(2, minmax(0,1fr)); }
    .card { border: 1px solid #e5e7eb; border-radius: 12px; padding: 16px; }
    .muted { color: #6b7280; font-size: 12px; }
    .table { width: 100%; border-collapse: collapse; font-size: 14px; }
    .table th, .table td { padding: 8px 10px; border-bottom: 1px solid #e5e7eb; text-align: left; }
    .badge { display: inline-block; padding: 4px 10px; border-radius: 9999px; font-size: 12px; }
    .badge-blue { background: #dbeafe; color: #1e40af; }
    .badge-orange { background: #ffedd5; color: #9a3412; }
    .header { text-align: center; margin-bottom: 24px; }
    .title { font-weight: 800; font-size: 22px; margin: 4px 0; }
    .subtitle { color: #374151; }
    .watermark { position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; pointer-events: none; opacity: .035; font-size: 120px; font-weight: 900; letter-spacing: 8px; }
    @media print { .no-print { display: none !important; } }
  </style>
</head>
<body>
  <div class="watermark">SMKN 4</div>
  <div class="container">
    <div class="header">
      <img src="{{ asset('images/favicon.svg') }}" alt="Logo" width="48" height="48">
      <div class="title">Laporan Performa Website</div>
      <div class="subtitle">SMK Negeri 4 Bogor</div>
      <div class="muted">Periode: {{ $fromDate }} — {{ $toDate }} | Dicetak: {{ now()->format('d M Y H:i') }}</div>
    </div>

    <!-- Content Statistics -->
    <div class="grid grid-4">
      <div class="card">
        <div class="muted">Total Berita</div>
        <div style="font-size:22px; font-weight:700; color:#2563eb">{{ number_format($totalBerita) }}</div>
      </div>
      <div class="card">
        <div class="muted">Total Event</div>
        <div style="font-size:22px; font-weight:700; color:#16a34a">{{ number_format($totalEvent) }}</div>
      </div>
      <div class="card">
        <div class="muted">Total Galeri</div>
        <div style="font-size:22px; font-weight:700; color:#9333ea">{{ number_format($totalGalleries) }}</div>
      </div>
      <div class="card">
        <div class="muted">Total Foto</div>
        <div style="font-size:22px; font-weight:700; color:#ea580c">{{ number_format($totalPhotos) }}</div>
      </div>
    </div>

    <!-- Views Statistics -->
    <div class="grid grid-4" style="margin-top:16px">
      <div class="card">
        <div class="muted">Views Berita</div>
        <div style="font-size:22px; font-weight:700; color:#2563eb">{{ number_format($totalBeritaViews) }}</div>
      </div>
      <div class="card">
        <div class="muted">Views Event</div>
        <div style="font-size:22px; font-weight:700; color:#16a34a">{{ number_format($totalEventViews) }}</div>
      </div>
      <div class="card">
        <div class="muted">Views Galeri</div>
        <div style="font-size:22px; font-weight:700; color:#9333ea">{{ number_format($totalGalleryViews) }}</div>
      </div>
      <div class="card">
        <div class="muted">Total Kunjungan (Periode)</div>
        <div style="font-size:22px; font-weight:700; color:#4f46e5">{{ number_format($totalVisitorsRange) }}</div>
      </div>
    </div>

    <!-- Engagement Statistics -->
    <div class="grid grid-4" style="margin-top:16px">
      <div class="card">
        <div class="muted">Total Suka</div>
        <div style="font-size:22px; font-weight:700; color:#dc2626">{{ number_format($totalGalleryLikes) }}</div>
      </div>
      <div class="card">
        <div class="muted">Total Komentar</div>
        <div style="font-size:22px; font-weight:700; color:#eab308">{{ number_format($totalComments) }}</div>
      </div>
      <div class="card">
        <div class="muted">Galeri Aktif</div>
        <div style="font-size:22px; font-weight:700; color:#16a34a">{{ number_format($activeGalleries) }}</div>
      </div>
      <div class="card">
        <div class="muted">Galeri Tidak Aktif</div>
        <div style="font-size:22px; font-weight:700; color:#6b7280">{{ number_format($inactiveGalleries) }}</div>
      </div>
    </div>

    <div style="height:16px"></div>

    <div class="grid grid-2">
      <div class="card">
        <div style="font-weight:700; margin-bottom:8px">Halaman Terpopuler (Top 5)</div>
        <table class="table">
          <thead>
            <tr><th>Halaman</th><th>Kunjungan</th></tr>
          </thead>
          <tbody>
            @forelse($mostVisitedPages as $p)
              <tr>
                <td>
                  <div style="font-weight:600">{{ $p->page_name }}</div>
                  <div class="muted">{{ $p->page_visited }}</div>
                </td>
                <td><span class="badge badge-blue">{{ $p->total }}</span></td>
              </tr>
            @empty
              <tr><td colspan="2" class="muted">Tidak ada data</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="card">
        <div style="font-weight:700; margin-bottom:8px">Konten Terpopuler (Top 5)</div>
        <table class="table">
          <thead>
            <tr><th>Judul</th><th>Views</th></tr>
          </thead>
          <tbody>
            @forelse($mostViewedPosts as $post)
              <tr>
                <td>
                  <div style="font-weight:600">{{ $post->judul }}</div>
                  <div class="muted">{{ $post->kategori_id == 1 ? 'Berita' : 'Event' }} • {{ $post->created_at->format('d M Y') }}</div>
                </td>
                <td><span class="badge badge-orange">{{ number_format($post->views) }}</span></td>
              </tr>
            @empty
              <tr><td colspan="2" class="muted">Tidak ada data</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div style="height:16px"></div>

    <div class="card">
      <div style="font-weight:700; margin-bottom:8px">Tren Kunjungan Harian</div>
      <table class="table">
        <thead>
          <tr><th>Tanggal</th><th>Kunjungan</th></tr>
        </thead>
        <tbody>
          @foreach($visitorChartData as $row)
            <tr>
              <td>{{ \Carbon\Carbon::parse($row['date'])->format('d M Y') }}</td>
              <td>{{ $row['count'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div style="height:16px"></div>

    <div class="muted">Dicetak otomatis dari sistem pada {{ now()->format('d M Y H:i') }}.</div>
    <button class="no-print" onclick="window.print()" style="margin-top:12px; padding:8px 12px; border-radius:8px; background:#2563eb; color:#fff; border:none;">Cetak</button>
  </div>
</body>
</html>
