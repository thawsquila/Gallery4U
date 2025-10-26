<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;
use App\Models\Teacher;
use App\Models\Comment;
use App\Models\Visitor;
use App\Models\GaleryLike;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\SchoolSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    /**
     * Track page visit for popular pages statistics
     */
    private function trackPageVisit($page) {
        $userIP = request()->ip();
        $userAgent = request()->userAgent();
        
        // Create unique visitor identifier
        $visitorKey = md5($userIP . $userAgent . date('Y-m-d'));
        
        // Check if this visitor has already been recorded today for this page
        $existingVisit = Visitor::where('page_visited', $page)
            ->where('visitor_key', $visitorKey)
            ->whereDate('created_at', today())
            ->first();
            
        if (!$existingVisit) {
            Visitor::create([
                'ip_address' => $userIP,
                'user_agent' => $userAgent,
                'page_visited' => $page,
                'visitor_key' => $visitorKey,
                'visited_at' => now(),
                'visit_date' => now()
            ]);
        }
    }

    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:2000',
        ]);

        $comment = Comment::findOrFail($id);

        // Only the owner can edit
        if (!$comment->user_id || $comment->user_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak berhak mengedit komentar ini.');
        }

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Komentar berhasil diperbarui.');
    }

    public function deleteComment(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // Only the owner can delete
        if (!$comment->user_id || $comment->user_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak berhak menghapus komentar ini.');
        }

        // Optionally: delete children as well
        $comment->replies()->delete();
        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }

    public function incrementGaleriView($id)
    {
        try {
            $galeri = Galery::findOrFail($id);
            $galeri->increment('views');
            
            return response()->json([
                'success' => true,
                'views' => $galeri->views
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error incrementing views'
            ], 500);
        }
    }

    public function home() {
        try {
            // Track home page visit
            $this->trackPageVisit('/');
            
            // Get statistics
            $statistics = \App\Models\Statistics::getCurrent();
            
            $berita = Post::where('kategori_id', 1)
                ->where('status', 'aktif')
                ->with(['kategori', 'galeries.fotos'])
                ->latest()
                ->take(3)
                ->get();
                
            $event = Post::where('kategori_id', 2)
                ->where('status', 'aktif')
                ->with(['galeries.fotos'])
                ->latest()
                ->get();
                
            // Ambil galeri berdasarkan kategori
            $galeriByKategori = [
                'Kegiatan Sekolah' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Kegiatan Sekolah')
                    ->with(['fotos'])
                    ->latest()
                    ->take(4)
                    ->get(),
                'Ekstrakurikuler' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Ekstrakurikuler')
                    ->with(['fotos'])
                    ->latest()
                    ->take(4)
                    ->get(),
                'Prestasi' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Prestasi')
                    ->with(['fotos'])
                    ->latest()
                    ->take(4)
                    ->get(),
                'Fasilitas Sekolah' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Fasilitas Sekolah')
                    ->with(['fotos'])
                    ->latest()
                    ->take(4)
                    ->get(),
                'Acara Khusus' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Acara Khusus')
                    ->with(['fotos'])
                    ->latest()
                    ->take(4)
                    ->get(),
                'Dokumentasi Guru dan Siswa' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Dokumentasi Guru dan Siswa')
                    ->with(['fotos'])
                    ->latest()
                    ->take(4)
                    ->get(),
            ];
                
            $teachers = Teacher::where('status', 'aktif')
                ->orderBy('urutan')
                ->latest('id')
                ->take(3)
                ->get();

            $school = SchoolSetting::getCurrent();
            return view('guest.home', compact('berita', 'event', 'galeriByKategori', 'teachers', 'statistics', 'school'));
            
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memuat data: ' . $e->getMessage());
        }
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:150',
            'content' => 'required|string|max:2000',
            'parent_id' => 'nullable|integer'
        ]);

        $post = Post::where('kategori_id', 1)
            ->where('status', 'aktif')
            ->findOrFail($postId);

        $user = Auth::user();

        Comment::create([
            'post_id' => $post->id,
            'parent_id' => $request->input('parent_id'),
            'user_id' => $user?->id,
            'name' => $user?->name ?? $request->input('name'),
            'email' => $user?->email ?? $request->input('email'),
            'content' => $request->input('content'),
            'is_approved' => true,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('guest.berita.detail', $post->id) 
            ->with('success', 'Komentar berhasil dikirim.');
    }

    public function profil() {
        try {
            // Track profil page visit
            $this->trackPageVisit('/profil');
            
            $profil = Profile::firstOrFail();
            return view('guest.profil', compact('profil'));
        } catch (\Exception $e) {
            return back()->with('error', 'Profil tidak ditemukan');
        }
    }

    public function jurusan() {
        try {
            // Track jurusan page visit
            $this->trackPageVisit('/jurusan');
            
            $jurusan = Post::where('kategori_id', 3)
                ->where('status', 'aktif')
                ->with(['galeries.fotos'])
                ->get();
            return view('guest.jurusan', compact('jurusan'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memuat data jurusan');
        }
    }

    public function detailJurusan($id) {
        try {
            $jurusan = Post::where('kategori_id', 3)
                ->where('status', 'aktif')
                ->with(['galeries.fotos'])
                ->findOrFail($id);

            // related jurusan
            $related = Post::where('kategori_id', 3)
                ->where('status', 'aktif')
                ->where('id', '!=', $id)
                ->latest()
                ->take(6)
                ->get();

            return view('guest.jurusan-detail', compact('jurusan', 'related'));

        } catch (\Exception $e) {
            return back()->with('error', 'Jurusan tidak ditemukan atau tidak aktif');
        }
    }

    public function berita() {
        try {
            // Track berita page visit
            $this->trackPageVisit('/berita');
            
            $berita = Post::where('kategori_id', 1)
                ->where('status', 'aktif')
                ->with(['kategori', 'galeries.fotos'])
                ->paginate(9);
            return view('guest.berita', compact('berita'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memuat berita');
        }
    }

    public function event(Request $request) {
        try {
            // Track event page visit
            $this->trackPageVisit('/event');
            
            $query = Post::where('kategori_id', 2)
                ->where('status', 'aktif');
                
            // Jika ada parameter pencarian
            if ($request->has('search') && !empty($request->search)) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('judul', 'like', '%' . $searchTerm . '%')
                      ->orWhere('isi', 'like', '%' . $searchTerm . '%')
                      ->orWhere('lokasi', 'like', '%' . $searchTerm . '%');
                });
            }
            
            $events = $query->with(['galeries.fotos'])
                ->latest()
                ->paginate(9)
                ->withQueryString();
                
            return view('guest.event', compact('events'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memuat event: ' . $e->getMessage());
        }
    }

    public function galeri() {
        try {
            // Track galeri page visit
            $this->trackPageVisit('/galeri');
            
            // Ambil galeri berdasarkan kategori
            $galeriByKategori = [
                'Kegiatan Sekolah' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Kegiatan Sekolah')
                    ->with(['fotos'])
                    ->withCount('comments')
                    ->when(\Illuminate\Support\Facades\Schema::hasTable('galery_likes'), function($q){
                        $q->withCount('likes')->with('likes');
                    })
                    ->latest()
                    ->get(),
                'Ekstrakurikuler' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Ekstrakurikuler')
                    ->with(['fotos'])
                    ->withCount('comments')
                    ->when(\Illuminate\Support\Facades\Schema::hasTable('galery_likes'), function($q){
                        $q->withCount('likes')->with('likes');
                    })
                    ->latest()
                    ->get(),
                'Prestasi' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Prestasi')
                    ->with(['fotos'])
                    ->withCount('comments')
                    ->when(\Illuminate\Support\Facades\Schema::hasTable('galery_likes'), function($q){
                        $q->withCount('likes')->with('likes');
                    })
                    ->latest()
                    ->get(),
                'Fasilitas Sekolah' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Fasilitas Sekolah')
                    ->with(['fotos'])
                    ->withCount('comments')
                    ->when(\Illuminate\Support\Facades\Schema::hasTable('galery_likes'), function($q){
                        $q->withCount('likes')->with('likes');
                    })
                    ->latest()
                    ->get(),
                'Acara Khusus' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Acara Khusus')
                    ->with(['fotos'])
                    ->withCount('comments')
                    ->when(\Illuminate\Support\Facades\Schema::hasTable('galery_likes'), function($q){
                        $q->withCount('likes')->with('likes');
                    })
                    ->latest()
                    ->get(),
                'Dokumentasi Guru dan Siswa' => Galery::where('status', 'aktif')
                    ->where('kategori', 'Dokumentasi Guru dan Siswa')
                    ->with(['fotos'])
                    ->withCount('comments')
                    ->when(\Illuminate\Support\Facades\Schema::hasTable('galery_likes'), function($q){
                        $q->withCount('likes')->with('likes');
                    })
                    ->latest()
                    ->get(),
            ];
            
            return view('guest.galeri', compact('galeriByKategori'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memuat galeri: ' . $e->getMessage());
        }
    }

    public function detailGaleri($id) {
        try {
            $query = Galery::where('status', 'aktif')
                ->with(['fotos' => function($query) {
                    $query->orderBy('created_at', 'desc');
                }, 'comments' => function($query) {
                    $query->whereNull('parent_id')
                          ->with('replies.user', 'user')
                          ->latest();
                }]);

            // Only count likes if the table exists (prevents 500 before migration)
            if (Schema::hasTable('galery_likes')) {
                $query->withCount('likes');
            }

            $galeri = $query->findOrFail($id);

            // Increment views
            $galeri->increment('views');

            $liked = (Schema::hasTable('galery_likes') && auth()->check())
                ? $galeri->isLikedBy(auth()->id())
                : false;

            // Get related galleries from same category
            $relatedGaleri = Galery::where('status', 'aktif')
                ->where('kategori', $galeri->kategori)
                ->where('id', '!=', $id)
                ->with(['fotos' => function($query) {
                    $query->limit(1);
                }])
                ->latest()
                ->limit(6)
                ->get();
                
            return view('guest.detail-galeri', compact('galeri', 'relatedGaleri', 'liked'));
        } catch (\Exception $e) {
            return back()->with('error', 'Galeri tidak ditemukan atau tidak aktif');
        }
    }

    public function toggleGaleriLike(Request $request, $id)
    {
        $galeri = Galery::findOrFail($id);
        $userId = auth()->id();

        $existing = GaleryLike::where('galery_id', $galeri->id)
            ->where('user_id', $userId)
            ->first();

        if ($existing) {
            $existing->delete();
            $status = 'unliked';
        } else {
            GaleryLike::create([
                'galery_id' => $galeri->id,
                'user_id' => $userId,
            ]);
            $status = 'liked';
        }

        if ($request->wantsJson()) {
            return response()->json([
                'status' => $status,
                'likes' => $galeri->likes()->count(),
            ]);
        }

        return back();
    }

    public function downloadGaleri($id)
    {
        $galeri = Galery::with('fotos')->findOrFail($id);
        if (!$galeri->fotos || $galeri->fotos->isEmpty()) {
            return back()->with('error', 'Galeri ini belum memiliki foto.');
        }

        $zip = new \ZipArchive();
        $zipFileName = 'galeri-' . ($galeri->judul ? str_replace([' ', '/','\\'], '-', strtolower($galeri->judul)) : $galeri->id) . '.zip';
        $tempPath = storage_path('app/tmp');
        if (!is_dir($tempPath)) @mkdir($tempPath, 0775, true);
        $zipFullPath = $tempPath . DIRECTORY_SEPARATOR . $zipFileName;

        if ($zip->open($zipFullPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            return back()->with('error', 'Tidak dapat membuat file ZIP.');
        }

        foreach ($galeri->fotos as $idx => $foto) {
            $absolute = public_path('images/gallery/' . $foto->file);
            if (file_exists($absolute)) {
                $entryName = sprintf('%02d-%s', $idx + 1, basename($absolute));
                $zip->addFile($absolute, $entryName);
            }
        }
        $zip->close();

        return response()->download($zipFullPath, $zipFileName, [
            'Content-Type' => 'application/zip'
        ])->deleteFileAfterSend(true);
    }

    public function storeGaleriComment(Request $request, $galeriId)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:150',
            'content' => 'required|string|max:2000',
            'parent_id' => 'nullable|integer'
        ]);

        $galeri = Galery::where('status', 'aktif')
            ->findOrFail($galeriId);

        $user = Auth::user();

        Comment::create([
            'galery_id' => $galeri->id,
            'parent_id' => $request->input('parent_id'),
            'user_id' => $user?->id,
            'name' => $user?->name ?? $request->input('name'),
            'email' => $user?->email ?? $request->input('email'),
            'content' => $request->input('content'),
            'is_approved' => true,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('guest.detail-galeri', $galeri->id) 
            ->with('success', 'Komentar berhasil dikirim.');
    }

    public function detailBerita($id) {
        try {
            $berita = Post::where('kategori_id', 1)
                ->where('status', 'aktif')
                ->with([
                    'galeries.fotos',
                    // Load top-level approved comments
                    'comments' => function($q) {
                        $q->whereNull('parent_id')
                          ->where('is_approved', true)
                          // Load level 1 replies (approved only)
                          ->with(['replies' => function($r){
                              $r->where('is_approved', true)
                                // Load level 2 replies (approved only)
                                ->with(['replies' => function($r2){
                                    $r2->where('is_approved', true)
                                       // Load level 3 replies (approved only)
                                       ->with(['replies' => function($r3){
                                           $r3->where('is_approved', true);
                                       }]);
                                }]);
                          }]);
                    }
                ])
                ->findOrFail($id);

            // Increment view count based on IP and user agent (more accurate tracking)
            $userIP = request()->ip();
            $userAgent = request()->userAgent();
            $viewKey = 'post_' . $id . '_' . md5($userIP . $userAgent);
            
            // Temporarily disable cache for testing - increment every view
            $berita->increment('views');
            \Log::info('View incremented for post ' . $id . ' from IP: ' . $userIP);
            
            // Track page visit for popular pages statistics
            $this->trackPageVisit('/berita-detail/' . $id);
            
            // Original cache logic (commented out for testing):
            // $lastViewed = cache()->get($viewKey);
            // if (!$lastViewed || now()->diffInMinutes($lastViewed) >= 60) {
            //     $berita->increment('views');
            //     cache()->put($viewKey, now(), now()->addHours(1));
            // }

            // Get related news (same category, exclude current)
            $related = Post::where('kategori_id', 1)
                ->where('status', 'aktif')
                ->where('id', '!=', $id)
                ->latest()
                ->take(3)
                ->get();

            return view('guest.berita-detail', compact('berita', 'related'));

        } catch (\Exception $e) {
            return back()->with('error', 'Berita tidak ditemukan atau tidak aktif');
        }
    }

    public function detailEvent($id) {
        try {
            $event = Post::where('kategori_id', 2)
                ->where('status', 'aktif')
                ->with(['galeries.fotos'])
                ->findOrFail($id);

            // Increment view count based on IP and user agent (more accurate tracking)
            $userIP = request()->ip();
            $userAgent = request()->userAgent();
            $viewKey = 'event_' . $id . '_' . md5($userIP . $userAgent);
            
            // Temporarily disable cache for testing - increment every view
            $event->increment('views');
            \Log::info('View incremented for event ' . $id . ' from IP: ' . $userIP);
            
            // Track page visit for popular pages statistics
            $this->trackPageVisit('/event-detail/' . $id);
            
            // Original cache logic (commented out for testing):
            // $lastViewed = cache()->get($viewKey);
            // if (!$lastViewed || now()->diffInMinutes($lastViewed) >= 60) {
            //     $event->increment('views');
            //     cache()->put($viewKey, now(), now()->addHours(1));
            // }

            // Get related events (same category, exclude current)
            $related = Post::where('kategori_id', 2)
                ->where('status', 'aktif')
                ->where('id', '!=', $id)
                ->latest()
                ->take(3)
                ->get();

            return view('guest.event-detail', compact('event', 'related'));
            
        } catch (\Exception $e) {
            return back()->with('error', 'Event tidak ditemukan atau tidak aktif');
        }
    }

    public function teachers() {
        try {
            $this->trackPageVisit('/teachers');
            
            $teachers = Teacher::where('status', 'aktif')
                ->orderBy('urutan')
                ->paginate(12);
            return view('guest.teachers', compact('teachers'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memuat data guru');
        }
    }

    public function peta() {
        return view('guest.peta');
    }

    public function sosialMedia() {
        return view('guest.sosial-media');
    }

    // Contact Page
    public function kontak() {
        try {
            $this->trackPageVisit('/kontak');
            $school = SchoolSetting::getCurrent();
            return view('guest.kontak', compact('school'));
        } catch (\Throwable $e) {
            return view('guest.kontak');
        }
    }

    public function kirimKontak(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        // Try send email if mail configured, otherwise log it
        try {
            // Save to database first
            ContactMessage::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'message' => $data['message'],
                'is_read' => false,
            ]);

            $to = config('mail.from.address');
            if ($to) {
                Mail::raw(
                    "Pesan dari: {$data['name']} <{$data['email']}>:: {$data['subject']}\n\n{$data['message']}",
                    function($m) use ($to, $data) {
                        $m->to($to)->subject('[Kontak Website] ' . $data['subject']);
                    }
                );
            }
            Log::info('Kontak terkirim', $data);
            return back()->with('success', 'Terima kasih! Pesan Anda sudah kami terima.');
        } catch (\Throwable $e) {
            Log::warning('Gagal kirim email kontak: ' . $e->getMessage());
            return back()->with('success', 'Terima kasih! Pesan Anda sudah kami terima.');
        }
    }
}

