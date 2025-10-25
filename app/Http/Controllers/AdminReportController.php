<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;
use App\Models\Visitor;
use App\Models\Comment;

class AdminReportController extends Controller
{
    private function collectData(Request $request): array
    {
        $from = $request->query('from');
        $to = $request->query('to');

        // Default range 30 days
        $fromDate = $from ? date('Y-m-d', strtotime($from)) : now()->subDays(29)->toDateString();
        $toDate = $to ? date('Y-m-d', strtotime($to)) : now()->toDateString();

        // Basic totals
        $totalPosts = Post::count();
        $totalGalleries = Galery::count();
        $totalPhotos = Foto::count();
        $totalComments = Comment::count();

        // Visitors range
        $totalVisitorsRange = Visitor::whereBetween('visit_date', [$fromDate, $toDate])->count();

        // Most visited pages in range
        $mostVisitedPages = Visitor::select('page_visited', DB::raw('count(*) as total'))
            ->whereBetween('visit_date', [$fromDate, $toDate])
            ->groupBy('page_visited')
            ->orderByDesc('total')
            ->take(5)
            ->get()
            ->map(function($page) {
                $pageName = $page->page_visited;
                if (str_starts_with($pageName, '/berita-detail/')) {
                    $postId = (int) str_replace('/berita-detail/', '', $pageName);
                    $post = Post::find($postId);
                    $pageName = 'Berita: ' . ($post ? $post->judul : 'Detail #' . $postId);
                } elseif (str_starts_with($pageName, '/event-detail/')) {
                    $postId = (int) str_replace('/event-detail/', '', $pageName);
                    $post = Post::find($postId);
                    $pageName = 'Event: ' . ($post ? $post->judul : 'Detail #' . $postId);
                } elseif ($pageName === '/') {
                    $pageName = 'Beranda';
                } elseif ($pageName === '/berita') {
                    $pageName = 'Halaman Berita';
                } elseif ($pageName === '/event') {
                    $pageName = 'Halaman Event';
                } elseif ($pageName === '/galeri') {
                    $pageName = 'Galeri';
                } elseif ($pageName === '/teachers') {
                    $pageName = 'Guru & Staff';
                } elseif ($pageName === '/profil') {
                    $pageName = 'Profil Sekolah';
                } elseif ($pageName === '/jurusan') {
                    $pageName = 'Jurusan';
                }
                return (object) [
                    'page_visited' => $page->page_visited,
                    'page_name' => $pageName,
                    'total' => $page->total,
                ];
            });

        // Most viewed posts (global)
        $mostViewedPosts = Post::where('views', '>', 0)
            ->orderByDesc('views')
            ->take(5)
            ->get(['id','judul','views','kategori_id','created_at']);

        // Daily visitors series
        $dailyStats = Visitor::select(DB::raw('DATE(visit_date) as date'), DB::raw('count(*) as count'))
            ->whereBetween('visit_date', [$fromDate, $toDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $period = \Carbon\CarbonPeriod::create($fromDate, $toDate);
        $visitorChartData = [];
        foreach ($period as $date) {
            $d = $date->toDateString();
            $visitorChartData[] = [
                'date' => $d,
                'count' => $dailyStats->has($d) ? $dailyStats[$d]->count : 0,
            ];
        }

        // Paginate visitor trend (per-page)
        $perPage = (int) ($request->query('per_page') ?: 30);
        if (!in_array($perPage, [15, 30, 60, 100])) { $perPage = 30; }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = collect($visitorChartData);
        $items = $collection->forPage($currentPage, $perPage)->values();
        $visitorChart = new LengthAwarePaginator(
            $items,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return compact(
            'fromDate','toDate',
            'totalPosts','totalGalleries','totalPhotos','totalComments','totalVisitorsRange',
            'mostVisitedPages','mostViewedPosts','visitorChart','visitorChartData','perPage'
        );
    }

    public function index(Request $request)
    {
        $data = $this->collectData($request);
        return view('admin.reports.index', $data);
        
    }

    public function print(Request $request)
    {
        $data = $this->collectData($request);
        return view('admin.reports.print', $data);
    }

    public function pdf(Request $request)
    {
        // If dompdf is not installed, redirect with notice
        if (!class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            return redirect()->route('admin.reports.index')
                ->with('error', 'Paket PDF belum terpasang. Silakan install: composer require barryvdh/laravel-dompdf');
        }

        $data = $this->collectData($request);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.reports.print', $data)->setPaper('a4', 'portrait');
        $filename = 'laporan-website-' . now()->format('Ymd-His') . '.pdf';
        return $pdf->download($filename);
    }
}
