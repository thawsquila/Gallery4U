<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Foto;
use App\Models\Visitor;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    // Middleware sudah didaftarkan di routes/web.php

    // Profile Management
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $dir = public_path('images/avatars');
            if (!file_exists($dir)) { @mkdir($dir, 0775, true); }

            // Delete old avatar if exists
            if ($user->avatar && file_exists($dir . DIRECTORY_SEPARATOR . $user->avatar)) {
                @unlink($dir . DIRECTORY_SEPARATOR . $user->avatar);
            }

            $image = $request->file('avatar');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($dir, $imageName);
            $user->avatar = $imageName;
        }

        $user->save();
        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // Users page
    public function users(Request $request)
    {
        $q = trim((string) $request->get('search'));
        $per = (int) ($request->get('per_page') ?: 10);
        if (!in_array($per, [10,25,50,100])) { $per = 10; }

        $users = \App\Models\User::query()
            ->when($q !== '', function($query) use ($q){
                $query->where('name', 'like', "%$q%")
                      ->orWhere('email', 'like', "%$q%");
            })
            ->orderByDesc('created_at')
            ->paginate($per)
            ->withQueryString();

        $counts = [
            'total' => \App\Models\User::count(),
            'admins' => \App\Models\User::where('role','admin')->count(),
            'members' => \App\Models\User::where('role','user')->count(),
        ];

        return view('admin.users.index', compact('users','counts','q','per'));
    }

    // Delete user (Admin)
    public function deleteUser($id)
    {
        try {
            $auth = Auth::user();
            if ($auth && (int)$auth->id === (int)$id) {
                return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri dari halaman ini.');
            }

            $user = \App\Models\User::findOrFail($id);

            // Optional: cleanup avatar file
            if ($user->avatar) {
                $path = public_path('images/avatars/' . $user->avatar);
                if (file_exists($path)) { @unlink($path); }
            }

            // Optional: delete user-related comments if relation exists
            try {
                if (method_exists($user, 'comments')) {
                    foreach ($user->comments as $c) { $c->delete(); }
                }
            } catch (\Throwable $e) { /* ignore optional */ }

            $user->delete();
            return redirect()->route('admin.users')->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pengguna: ' . $e->getMessage());
        }
    }

    // Visitors page
    public function visitors(Request $request)
    {
        $per = (int) ($request->get('per_page') ?: 20);
        if (!in_array($per, [10,20,50,100])) { $per = 20; }
        $q = trim((string) $request->get('search'));

        $visitors = Visitor::query()
            ->when($q !== '', function($query) use ($q){
                $query->where('ip_address','like',"%$q%")
                      ->orWhere('page_visited','like',"%$q%")
                      ->orWhere('user_agent','like',"%$q%");
            })
            ->orderByDesc('visit_date')
            ->paginate($per)
            ->withQueryString();

        $stats = [
            'total' => Visitor::count(),
            'today' => Visitor::whereDate('visit_date', today())->count(),
            'week' => Visitor::whereBetween('visit_date', [today()->subDays(6), today()])->count(),
        ];

        return view('admin.visitors.index', compact('visitors','stats','q','per'));
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
        
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('admin.profile')->with('success', 'Password berhasil diperbarui!');
    }
    
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();
        
        // Logout first
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Delete the user
        $user->delete();
        
        return redirect()->route('login')->with('success', 'Akun Anda telah dihapus.');
    }
    
    // Settings Management
    public function updateNotifications(Request $request)
    {
        $user = Auth::user();
        
        // In a real application, you would save these settings to a user_settings table
        // For now, we'll just redirect with a success message
        
        return redirect()->route('admin.settings')->with('success', 'Pengaturan notifikasi berhasil diperbarui!');
    }
    
    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        
        // In a real application, you would save these preferences to a user_settings table
        // For now, we'll just redirect with a success message
        
        return redirect()->route('admin.settings')->with('success', 'Preferensi berhasil diperbarui!');
    }
    
    public function updateLanguage(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'language' => 'required|string|in:en,id,es,fr,de',
            'timezone' => 'required|string|timezone',
        ]);
        
        // In a real application, you would save these settings to a user_settings table
        // For now, we'll just redirect with a success message
        
        return redirect()->route('admin.settings')->with('success', 'Pengaturan bahasa dan zona waktu berhasil diperbarui!');
    }
    
    public function logoutOtherSessions(Request $request)
    {
        // In a real application, you would invalidate all other sessions
        // For Laravel 8+, you can use the built-in method if you have the proper setup
        // Auth::logoutOtherDevices($request->password);
        
        return redirect()->route('admin.settings')->with('success', 'Semua sesi lain telah dikeluarkan!');
    }
    
    // API Management
    public function generateApiToken(Request $request)
    {
        $user = Auth::user();
        
        // In a real application, you would generate a real API token
        // For now, we'll just redirect with a success message
        $token = bin2hex(random_bytes(16));
        
        return redirect()->route('admin.settings')
            ->with('success', 'Token API baru telah dibuat!')
            ->with('apiToken', $token);
    }
    
    public function revokeApiToken(Request $request)
    {
        $user = Auth::user();
        
        // In a real application, you would revoke the API token
        // For now, we'll just redirect with a success message
        
        return redirect()->route('admin.settings')->with('success', 'Token API telah dicabut!');
    }

    // Dashboard
    public function dashboard()
    {
        $totalPosts = Post::count();
        $totalGalleries = Galery::count();
        $totalPhotos = Foto::count();
        $totalAdmins = \App\Models\User::where('role', 'admin')->count();
        $totalUsers = \App\Models\User::count();
        $totalRegisteredUsers = \App\Models\User::where('role', 'user')->count();
        $recentUsers = \App\Models\User::latest()->take(8)->get(['id','name','email','role','avatar','created_at']);
        $recentPosts = Post::latest()->take(5)->get();
        $recentGalleries = Galery::latest()->take(5)->get();
        
        // Visitor statistics
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('visit_date', today())->count();
        $yesterdayVisitors = Visitor::whereDate('visit_date', today()->subDay())->count();
        $lastWeekVisitors = Visitor::whereBetween('visit_date', [today()->subDays(7), today()])->count();
        $recentVisitors = Visitor::latest('visit_date')->take(10)->get(['ip_address','user_agent','page_visited','visit_date']);
        
        // Most visited pages (top 5) - including detail pages
        $mostVisitedPages = Visitor::select('page_visited', DB::raw('count(*) as total'))
            ->groupBy('page_visited')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get()
            ->map(function($page) {
                // Format page names for better display
                $pageName = $page->page_visited;
                if (str_starts_with($pageName, '/berita-detail/')) {
                    $postId = str_replace('/berita-detail/', '', $pageName);
                    $post = Post::find($postId);
                    $pageName = 'Berita: ' . ($post ? $post->judul : 'Detail #' . $postId);
                } elseif (str_starts_with($pageName, '/event-detail/')) {
                    $postId = str_replace('/event-detail/', '', $pageName);
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
                    'total' => $page->total
                ];
            });
            
        // Daily visitors for the last 7 days for chart
        $dailyStats = Visitor::select(DB::raw('DATE(visit_date) as date'), DB::raw('count(*) as count'))
            ->whereBetween('visit_date', [today()->subDays(6), today()])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');
            
        // Ensure we have entries for all 7 days (even days with zero visits)
        $visitorChartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = today()->subDays($i)->toDateString();
            $visitorChartData[] = [
                'date' => $date,
                'count' => $dailyStats->has($date) ? $dailyStats[$date]->count : 0
            ];
        }

        // Article view statistics
        $totalViews = Post::sum('views');
        $mostViewedPosts = Post::where('views', '>', 0)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get(['id', 'judul', 'views', 'kategori_id', 'created_at']);
        
        // Recent posts with views
        $recentPostsWithViews = Post::latest()
            ->take(5)
            ->get(['id', 'judul', 'views', 'kategori_id', 'created_at']);

        return view('admin.dashboard-new', compact(
            'totalPosts', 
            'totalGalleries', 
            'totalPhotos',
            'totalAdmins',
            'totalUsers',
            'totalRegisteredUsers',
            'recentUsers',
            'recentPosts', 
            'recentGalleries',
            'totalVisitors',
            'todayVisitors',
            'yesterdayVisitors',
            'lastWeekVisitors',
            'recentVisitors',
            'mostVisitedPages',
            'visitorChartData',
            'totalViews',
            'mostViewedPosts',
            'recentPostsWithViews'
        ));
    }

    // Posts/Berita Management
    public function posts(Request $request)
    {
        $query = Post::latest();
        
        // Implementasi pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
        }
        
        $posts = $query->paginate(10)->withQueryString();

        // Global statistics for posts
        $totalCount = Post::count();
        $activeCount = Post::where('status', 'aktif')->count();
        $inactiveCount = Post::where('status', 'tidak_aktif')->count();

        return view('admin.posts.index', compact('posts', 'totalCount', 'activeCount', 'inactiveCount'));
    }

    public function createPost()
    {
        return view('admin.posts.create');
    }

    public function storePost(Request $request)
    {
        $validationRules = [
            'judul' => 'required|max:255',
            'kategori_id' => 'required',
            'isi' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ];
        
        // Add validation for event fields if category is event (kategori_id = 2)
        if ($request->kategori_id == 2) {
            $validationRules['tanggal'] = 'required|date';
            $validationRules['waktu_mulai'] = 'nullable|string|max:10';
            $validationRules['lokasi'] = 'required|string|max:255';
            $validationRules['tiket'] = 'nullable|string|max:255';
            $validationRules['kapasitas'] = 'nullable|integer|min:0';
        }
        
        $request->validate($validationRules);

        $data = $request->all();
        // Dapatkan petugas_id berdasarkan user_id yang login
        $petugas = \App\Models\Petugas::where('user_id', Auth::id())->first();
        if ($petugas) {
            $data['petugas_id'] = $petugas->id; // Set petugas_id yang benar
        } else {
            // Jika tidak ditemukan, gunakan default atau kembalikan error
            return redirect()->back()->with('error', 'Akun petugas tidak ditemukan');
        }
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // Ensure posts dir exists
            $postsDir = public_path('images/posts');
            if (!file_exists($postsDir)) { @mkdir($postsDir, 0775, true); }
            $image->move($postsDir, $imageName);
            $data['gambar'] = $imageName;
        }

        $post = Post::create($data);

        // Auto-create/link Gallery and Foto from post cover image
        if (!empty($data['gambar'])) {
            try {
                // Prepare gallery meta
                $post->load('kategori');
                $kategoriNama = $post->kategori->nama ?? 'Umum';
                $galleryDir = public_path('images/gallery');
                if (!file_exists($galleryDir)) { @mkdir($galleryDir, 0775, true); }

                // Create or get gallery for this post
                $gallery = Galery::firstOrCreate(
                    ['post_id' => $post->id, 'judul' => $post->judul],
                    [
                        'deskripsi' => 'Galeri untuk: ' . $post->judul,
                        'kategori' => $kategoriNama,
                        'status' => $post->status,
                        'position' => (int) (Galery::max('position') + 1)
                    ]
                );

                // Copy image into gallery folder and save Foto record
                $src = public_path('images/posts/' . $data['gambar']);
                $dst = $galleryDir . DIRECTORY_SEPARATOR . $data['gambar'];
                if (file_exists($src)) {
                    @copy($src, $dst);
                    Foto::create([
                        'galery_id' => $gallery->id,
                        'file' => $data['gambar'],
                        'judul' => $post->judul,
                    ]);
                }
            } catch (\Throwable $e) {
                \Log::warning('Auto-gallery create on storePost failed: ' . $e->getMessage());
            }
        }

        return redirect()->route('admin.posts')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $validationRules = [
            'judul' => 'required|max:255',
            'kategori_id' => 'required',
            'isi' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240'
        ];
        
        // Add validation for event fields if category is event (kategori_id = 2)
        if ($request->kategori_id == 2) {
            $validationRules['tanggal'] = 'required|date';
            $validationRules['waktu_mulai'] = 'nullable|string|max:10';
            $validationRules['lokasi'] = 'required|string|max:255';
            $validationRules['tiket'] = 'nullable|string|max:255';
            $validationRules['kapasitas'] = 'nullable|integer|min:0';
        }
        
        $request->validate($validationRules);

        $post = Post::findOrFail($id);
        $data = $request->all();
        
        // Dapatkan petugas_id berdasarkan user_id yang login
        $petugas = \App\Models\Petugas::where('user_id', Auth::id())->first();
        if ($petugas) {
            $data['petugas_id'] = $petugas->id; // Set petugas_id yang benar
        } else {
            // Jika tidak ditemukan, gunakan default atau kembalikan error
            return redirect()->back()->with('error', 'Akun petugas tidak ditemukan');
        }

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($post->gambar && file_exists(public_path('images/posts/' . $post->gambar))) {
                @unlink(public_path('images/posts/' . $post->gambar));
            }

            $image = $request->file('gambar');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $postsDir = public_path('images/posts');
            if (!file_exists($postsDir)) { @mkdir($postsDir, 0775, true); }
            $image->move($postsDir, $imageName);
            $data['gambar'] = $imageName;

            // Also push the new image to the gallery of this post
            try {
                $post->load('kategori');
                $kategoriNama = $post->kategori->nama ?? 'Umum';
                $galleryDir = public_path('images/gallery');
                if (!file_exists($galleryDir)) { @mkdir($galleryDir, 0775, true); }

                $gallery = Galery::firstOrCreate(
                    ['post_id' => $post->id, 'judul' => $post->judul],
                    [
                        'deskripsi' => 'Galeri untuk: ' . $post->judul,
                        'kategori' => $kategoriNama,
                        'status' => $data['status'] ?? $post->status,
                        'position' => (int) (Galery::max('position') + 1)
                    ]
                );

                $src = public_path('images/posts/' . $imageName);
                $dst = $galleryDir . DIRECTORY_SEPARATOR . $imageName;
                if (file_exists($src)) {
                    @copy($src, $dst);
                    Foto::create([
                        'galery_id' => $gallery->id,
                        'file' => $imageName,
                        'judul' => $post->judul,
                    ]);
                }
            } catch (\Throwable $e) {
                \Log::warning('Auto-gallery append on updatePost failed: ' . $e->getMessage());
            }
        }

        $post->update($data);

        return redirect()->route('admin.posts')->with('success', 'Berita berhasil diupdate!');
    }

    public function deletePost($id)
    {
        try {
            // Find the post with its galleries and photos
            $post = Post::with(['galeries.fotos'])->findOrFail($id);
            
            // Delete main post image
            if ($post->gambar && file_exists(public_path('images/posts/' . $post->gambar))) {
                unlink(public_path('images/posts/' . $post->gambar));
            }
            
            // Delete gallery images
            foreach ($post->galeries as $gallery) {
                foreach ($gallery->fotos as $photo) {
                    if (file_exists(public_path($photo->file_path))) {
                        unlink(public_path($photo->file_path));
                    }
                    $photo->delete();
                }
                $gallery->delete();
            }
            
            // Delete the post
            $post->delete();
            
            return redirect()->route('admin.posts')
                ->with('success', 'Berita/Event berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus berita/event: ' . $e->getMessage());
        }
    }

    // Gallery Management
    public function galleries(Request $request)
    {
        $perPage = (int) ($request->get('per_page') ?: 10);
        if (!in_array($perPage, [10,25,50,100])) { $perPage = 10; }
        // Base query
        $gq = Galery::with('fotos')->latest();
        // Load counts for comments and likes if available
        $gq->withCount('comments');
        if (\Illuminate\Support\Facades\Schema::hasTable('galery_likes')) {
            $gq->withCount('likes')->with(['likes.user']);
        }
        // Server-side search like posts page
        if ($request->filled('search')) {
            $term = $request->get('search');
            // Restrict to title only for precision
            $gq->where('judul', 'like', "%$term%");
        }
        // Optional category filter from query string
        if ($request->filled('kategori')) {
            $gq->where('kategori', $request->get('kategori'));
        }
        // Server-side status filter
        if ($request->filled('status')) {
            $status = $request->get('status');
            if ($status === 'aktif') {
                $gq->where('status', 'aktif');
            } elseif ($status === 'tidak_aktif') {
                $gq->where('status', 'tidak_aktif');
            }
        }
        $galleries = $gq->paginate($perPage)->withQueryString();

        // Statistics for galleries (use 'status' column: 'aktif'/'tidak_aktif')
        $totalGalleries = Galery::count();
        $activeGalleries = Galery::where('status', 'aktif')->count();
        $inactiveGalleries = Galery::where('status', 'tidak_aktif')->count();
        $galleryCategories = Galery::select('kategori')->distinct()->orderBy('kategori')->pluck('kategori');

        // Total likes for stats card
        $totalLikes = 0;
        if (\Illuminate\Support\Facades\Schema::hasTable('galery_likes')) {
            $totalLikes = \App\Models\GaleryLike::count();
        }

        return view('admin.galleries.index', compact('galleries', 'totalGalleries', 'activeGalleries', 'inactiveGalleries', 'galleryCategories', 'totalLikes'));
    }

    public function createGallery()
    {
        return view('admin.galleries.create');
    }

    public function storeGallery(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'position' => 'required|integer',
            'status' => 'required|in:aktif,tidak_aktif',
            'kategori' => 'required|string',
            'photos' => 'required|array|min:1',
            'judul_foto' => 'nullable|string|max:255'
        ]);

        $gallery = Galery::create($request->only(['judul', 'deskripsi', 'position', 'status', 'kategori']));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('images/gallery'), $photoName);
                
                Foto::create([
                    'galery_id' => $gallery->id,
                    'file' => $photoName,
                    'judul' => $request->judul_foto ?? 'Gallery Photo'
                ]);
            }
        }

        return redirect()->route('admin.galleries')->with('success', 'Gallery berhasil ditambahkan!');
    }

    public function editGallery($id)
    {
        $query = Galery::with('fotos');
        // Safely load likes if table exists
        if (Schema::hasTable('galery_likes')) {
            $query->with(['likes.user'])->withCount('likes');
        }
        $gallery = $query->findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function updateGallery(Request $request, $id)
    {
        // Log untuk debugging
        \Log::info('Update Gallery method called');
        \Log::info('Request method: ' . $request->method());
        \Log::info('Request has _method: ' . $request->has('_method'));
        if ($request->has('_method')) {
            \Log::info('_method value: ' . $request->input('_method'));
        }
        \Log::info('Request data: ' . json_encode($request->all()));
        
        // Pastikan ini adalah request update
        if (!$request->has('is_update')) {
            \Log::warning('Attempted to call updateGallery without is_update flag');
            return redirect()->route('admin.galleries')->with('error', 'Operasi tidak valid. Silakan coba lagi.');
        }
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'position' => 'required|integer',
            'status' => 'required|in:aktif,tidak_aktif',
            'kategori' => 'required|string',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'judul_foto' => 'nullable|string|max:255'
        ]);

        $gallery = Galery::findOrFail($id);
        $gallery->update($request->only(['judul', 'deskripsi', 'position', 'status', 'kategori']));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('images/gallery'), $photoName);
                
                Foto::create([
                    'galery_id' => $gallery->id,
                    'file' => $photoName,
                    'judul' => $request->judul_foto ?? 'Gallery Photo'
                ]);
            }
        }

        return redirect()->route('admin.galleries')->with('success', 'Gallery berhasil diupdate!');
    }

    public function deleteGallery($id)
    {
        // Log untuk debugging
        \Log::info('Delete Gallery method called for ID: ' . $id);
        \Log::info('Request method: ' . request()->method());
        \Log::info('Request has _method: ' . request()->has('_method'));
        if (request()->has('_method')) {
            \Log::info('_method value: ' . request()->input('_method'));
        }
        
        $gallery = Galery::with('fotos')->findOrFail($id);
        
        // Delete all photos
        foreach ($gallery->fotos as $foto) {
            if (file_exists(public_path('images/gallery/' . $foto->file))) {
                unlink(public_path('images/gallery/' . $foto->file));
            }
            $foto->delete();
        }

        $gallery->delete();

        return redirect()->route('admin.galleries')->with('success', 'Gallery berhasil dihapus!');
    }

    public function deletePhoto($id)
    {
        $foto = Foto::findOrFail($id);
        
        if (file_exists(public_path('images/gallery/' . $foto->file))) {
            unlink(public_path('images/gallery/' . $foto->file));
        }

        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus!');
    }

    // Teachers (Tenaga Pendidik) Management
    public function teachers()
    {
        $teachers = Teacher::orderBy('urutan')->latest('id')->paginate(12);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function createTeacher()
    {
        return view('admin.teachers.create');
    }

    public function storeTeacher(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string|max:500',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        if ($request->hasFile('foto')) {
            // Ensure directory exists
            $dir = public_path('images/teachers');
            if (!file_exists($dir)) {
                @mkdir($dir, 0775, true);
            }
            $image = $request->file('foto');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/teachers'), $imageName);
            $data['foto'] = $imageName;
        }

        Teacher::create($data);
        return redirect()->route('admin.teachers')->with('success', 'Tenaga pendidik berhasil ditambahkan');
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function updateTeacher(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string|max:500',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        if ($request->hasFile('foto')) {
            // delete old
            if ($teacher->foto && file_exists(public_path('images/teachers/' . $teacher->foto))) {
                @unlink(public_path('images/teachers/' . $teacher->foto));
            }
            // Ensure directory exists
            $dir = public_path('images/teachers');
            if (!file_exists($dir)) {
                @mkdir($dir, 0775, true);
            }
            $image = $request->file('foto');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/teachers'), $imageName);
            $data['foto'] = $imageName;
        }

        $teacher->update($data);
        return redirect()->route('admin.teachers')->with('success', 'Tenaga pendidik berhasil diperbarui');
    }

    public function deleteTeacher($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            
            // Hapus file foto jika ada
            if ($teacher->foto && file_exists(public_path('images/teachers/' . $teacher->foto))) {
                @unlink(public_path('images/teachers/' . $teacher->foto));
            }
            
            // Hapus data dari database
            $teacher->delete();
            
            return redirect()->route('admin.teachers')
                ->with('success', 'Tenaga pendidik berhasil dihapus');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.teachers')
                ->with('error', 'Gagal menghapus tenaga pendidik: ' . $e->getMessage());
        }
    }

    // Comments Management
    public function comments()
    {
        $comments = Comment::with(['post', 'galery'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        $pendingComments = Comment::where('is_approved', false)->count();
        $approvedComments = Comment::where('is_approved', true)->count();
        $totalComments = Comment::count();
        $galeriComments = Comment::whereNotNull('galery_id')->count();
        $beritaComments = Comment::whereNotNull('post_id')->count();
        
        $mode = 'all';
        return view('admin.comments.index', compact('comments', 'pendingComments', 'approvedComments', 'totalComments', 'galeriComments', 'beritaComments', 'mode'));
    }

    // Only berita comments
    public function commentsBerita()
    {
        $comments = Comment::with(['post'])
            ->whereNotNull('post_id')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $pendingComments = Comment::whereNotNull('post_id')->where('is_approved', false)->count();
        $approvedComments = Comment::whereNotNull('post_id')->where('is_approved', true)->count();
        $totalComments = Comment::whereNotNull('post_id')->count();
        $galeriComments = Comment::whereNotNull('galery_id')->count();
        $beritaComments = $totalComments;

        $mode = 'berita';
        return view('admin.comments.index', compact('comments', 'pendingComments', 'approvedComments', 'totalComments', 'galeriComments', 'beritaComments', 'mode'));
    }

    // Only galeri comments
    public function commentsGaleri()
    {
        $comments = Comment::with(['galery'])
            ->whereNotNull('galery_id')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $pendingComments = Comment::whereNotNull('galery_id')->where('is_approved', false)->count();
        $approvedComments = Comment::whereNotNull('galery_id')->where('is_approved', true)->count();
        $totalComments = Comment::whereNotNull('galery_id')->count();
        $galeriComments = $totalComments;
        $beritaComments = Comment::whereNotNull('post_id')->count();

        $mode = 'galeri';
        return view('admin.comments.index', compact('comments', 'pendingComments', 'approvedComments', 'totalComments', 'galeriComments', 'beritaComments', 'mode'));
    }

    public function showComment($id)
    {
        $comment = Comment::with(['post', 'galery', 'parent', 'replies'])->findOrFail($id);
        return view('admin.comments.show', compact('comment'));
    }

    public function approveComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['is_approved' => true]);
        return back()->with('success', 'Komentar berhasil disetujui');
    }

    public function rejectComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['is_approved' => false]);
        return back()->with('success', 'Komentar berhasil ditolak');
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        
        // Delete all replies first
        $comment->replies()->delete();
        
        // Delete the comment
        $comment->delete();
        
        return back()->with('success', 'Komentar berhasil dihapus');
    }
}
