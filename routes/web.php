<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', [GuestController::class, 'home'])->name('guest.home');
Route::get('/berita', [GuestController::class, 'berita'])->name('guest.berita');
Route::get('/event', [GuestController::class, 'event'])->name('guest.event');
Route::get('/galeri', [GuestController::class, 'galeri'])->name('guest.galeri');
Route::get('/jurusan', [GuestController::class, 'jurusan'])->name('guest.jurusan');
Route::get('/jurusan-detail/{id}', [GuestController::class, 'detailJurusan'])->name('guest.jurusan.detail');
// Static jurusan pages (no database)
Route::view('/jurusan/rpl', 'guest.jurusan-rpl')->name('guest.jurusan.rpl');
Route::view('/jurusan/tkj', 'guest.jurusan-tkj')->name('guest.jurusan.tkj');
Route::view('/jurusan/tpfl', 'guest.jurusan-tpfl')->name('guest.jurusan.tpfl');
Route::view('/jurusan/otomotif', 'guest.jurusan-otomotif')->name('guest.jurusan.otomotif');
Route::get('/teachers', [GuestController::class, 'teachers'])->name('guest.teachers');
Route::get('/kontak', [GuestController::class, 'kontak'])->name('guest.kontak');
Route::post('/kontak', [GuestController::class, 'kirimKontak'])->name('guest.kontak.kirim');
Route::get('/berita-detail/{id}', [GuestController::class, 'detailBerita'])->name('guest.berita.detail');
Route::post('/berita-detail/{id}/comment', [GuestController::class, 'storeComment'])
    ->middleware('auth')
    ->name('guest.berita.comment');
Route::post('/comments/{id}/update', [GuestController::class, 'updateComment'])
    ->middleware('auth')
    ->name('guest.comment.update');
Route::post('/comments/{id}/delete', [GuestController::class, 'deleteComment'])
    ->middleware('auth')
    ->name('guest.comment.delete');
Route::get('/event-detail/{id}', [GuestController::class, 'detailEvent'])->name('guest.event.detail');
Route::get('/galeri-detail/{id}', [GuestController::class, 'detailGaleri'])->name('guest.detail-galeri');
Route::get('/galeri-detail/{id}/download', [GuestController::class, 'downloadGaleri'])->name('guest.galeri.download');
Route::post('/galeri-detail/{id}/comment', [GuestController::class, 'storeGaleriComment'])
    ->middleware('auth')
    ->name('guest.galeri.comment');
Route::post('/galeri-detail/{id}/like', [GuestController::class, 'toggleGaleriLike'])
    ->middleware('auth')
    ->name('guest.galeri.like');

// Authentication Routes (Admin)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// User Authentication Routes
Route::get('/user/login', [AuthController::class, 'showUserLoginForm'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'userLogin']);
Route::get('/user/register', [AuthController::class, 'showUserRegisterForm'])->name('user.register');
Route::post('/user/register', [AuthController::class, 'userRegister']);

// OTP Verification Routes
Route::get('/verify-otp', [AuthController::class, 'showVerifyOtpForm'])->name('verify.otp.form');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend.otp');

// Password Reset Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
// OTP verification for password reset
Route::get('/forgot-password/code', [AuthController::class, 'showForgotPasswordCodeForm'])->name('password.code.form');
Route::post('/forgot-password/code', [AuthController::class, 'verifyForgotPasswordCode'])->name('password.code.verify');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Profile Routes
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    // User Profile page (pass $user)
    Route::get('/profile', function() {
        return view('user.profile', ['user' => auth()->user()]);
    })->name('profile');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('account.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // Users & Visitors pages
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::get('/visitors', [AdminController::class, 'visitors'])->name('visitors');
    // Profile and Settings
    Route::view('/profile', 'admin.profile')->name('profile');
    Route::view('/settings', 'admin.settings')->name('settings');
    Route::put('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password/update', [AdminController::class, 'updatePassword'])->name('password.update');
    Route::delete('/account/delete', [AdminController::class, 'deleteAccount'])->name('account.delete');
    
    // Settings Management
    Route::put('/settings/notifications', [AdminController::class, 'updateNotifications'])->name('settings.notifications');
    Route::put('/settings/preferences', [AdminController::class, 'updatePreferences'])->name('settings.preferences');
    Route::put('/settings/language', [AdminController::class, 'updateLanguage'])->name('settings.language');
    Route::post('/sessions/logout-others', [AdminController::class, 'logoutOtherSessions'])->name('sessions.logout-others');
    
    // API Management
    Route::post('/api/generate-token', [AdminController::class, 'generateApiToken'])->name('api.generate-token');
    Route::delete('/api/revoke-token', [AdminController::class, 'revokeApiToken'])->name('api.revoke-token');
    
    // Statistics Management
    Route::get('/statistics', [\App\Http\Controllers\StatisticsController::class, 'edit'])->name('statistics.edit');
    Route::put('/statistics', [\App\Http\Controllers\StatisticsController::class, 'update'])->name('statistics.update');
    
    // Posts/Berita Management
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/posts/create', [AdminController::class, 'createPost'])->name('posts.create');
    Route::post('/posts', [AdminController::class, 'storePost'])->name('posts.store');
    Route::get('/posts/{id}/edit', [AdminController::class, 'editPost'])->name('posts.edit');
    Route::put('/posts/{id}', [AdminController::class, 'updatePost'])->name('posts.update');
    Route::delete('/posts/{id}', [AdminController::class, 'deletePost'])->name('posts.delete');
    
    // Gallery Management
    Route::get('/galleries', [AdminController::class, 'galleries'])->name('galleries');
    Route::get('/galleries/create', [AdminController::class, 'createGallery'])->name('galleries.create');
    Route::post('/galleries', [AdminController::class, 'storeGallery'])->name('galleries.store');
    Route::get('/galleries/{id}/edit', [AdminController::class, 'editGallery'])->name('galleries.edit');
    Route::post('/galleries/{id}/update', [AdminController::class, 'updateGallery'])->name('galleries.update');
    Route::delete('/galleries/{id}/delete', [AdminController::class, 'deleteGallery'])->name('galleries.delete');
    Route::delete('/photos/{id}', [AdminController::class, 'deletePhoto'])->name('photos.delete');

    // Teachers (Tenaga Pendidik) Management
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('teachers');
    Route::get('/teachers/create', [AdminController::class, 'createTeacher'])->name('teachers.create');
    Route::post('/teachers', [AdminController::class, 'storeTeacher'])->name('teachers.store');
    Route::get('/teachers/{id}/edit', [AdminController::class, 'editTeacher'])->name('teachers.edit');
    Route::post('/teachers/{id}/update', [AdminController::class, 'updateTeacher'])->name('teachers.update');
    Route::delete('/teachers/{id}', [AdminController::class, 'deleteTeacher'])->name('teachers.destroy');

    // Comments Management
    Route::get('/comments', [AdminController::class, 'comments'])->name('comments');
    Route::get('/comments/berita', [AdminController::class, 'commentsBerita'])->name('comments.berita');
    Route::get('/comments/galeri', [AdminController::class, 'commentsGaleri'])->name('comments.galeri');
    Route::get('/comments/{id}', [AdminController::class, 'showComment'])->name('comments.show');
    Route::post('/comments/{id}/approve', [AdminController::class, 'approveComment'])->name('comments.approve');
    Route::post('/comments/{id}/reject', [AdminController::class, 'rejectComment'])->name('comments.reject');
    Route::delete('/comments/{id}', [AdminController::class, 'deleteComment'])->name('comments.delete');

    // Reports
    Route::get('/reports', [\App\Http\Controllers\AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/print', [\App\Http\Controllers\AdminReportController::class, 'print'])->name('reports.print');
    Route::get('/reports/pdf', [\App\Http\Controllers\AdminReportController::class, 'pdf'])->name('reports.pdf');

    // Contact Messages Management
    Route::get('/contacts', [ContactMessageController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [ContactMessageController::class, 'show'])->name('contacts.show');
    Route::post('/contacts/{id}/read', [ContactMessageController::class, 'markRead'])->name('contacts.read');
    Route::delete('/contacts/{id}', [ContactMessageController::class, 'destroy'])->name('contacts.destroy');
});

