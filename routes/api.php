<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EngagementController;
use App\Http\Controllers\Api\TeacherController;

// Authentication routes
Route::post('/login', [ApiController::class, 'login']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/logout', [ApiController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [ApiController::class, 'user'])->middleware('auth:sanctum');
// Password management
Route::post('/password/change', [ApiController::class, 'changePassword'])->middleware('auth:sanctum');
Route::post('/password/reset', [ApiController::class, 'resetPassword']);
Route::post('/password/forgot', [ApiController::class, 'passwordForgot']);
Route::post('/password/verify-otp', [ApiController::class, 'verifyPasswordOtp']);

// Direct API routes for mobile app compatibility
Route::get('/galeri', [GalleryController::class, 'index']);
Route::get('/galeri/{id}', [GalleryController::class, 'show']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/category/{kategori_id}', [PostController::class, 'getByCategory']);
Route::get('/news', [PostController::class, 'getByCategory'])->defaults('kategori_id', 1);
Route::get('/events', [PostController::class, 'getByCategory'])->defaults('kategori_id', 2);

// Public routes
Route::prefix('public')->group(function () {
    // News routes
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/featured/{limit?}', [NewsController::class, 'featured']);
    Route::get('/news/{id}', [NewsController::class, 'show']);
    
    // Events routes
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/upcoming', [EventController::class, 'upcoming']);
    Route::get('/events/past', [EventController::class, 'past']);
    Route::get('/events/{id}', [EventController::class, 'show']);
    
    // Gallery routes
    Route::get('/galleries', [GalleryController::class, 'index']);
    Route::get('/galleries/{id}', [GalleryController::class, 'show']);
    
    // Teachers (Tenaga Pendidik)
    Route::get('/teachers', [TeacherController::class, 'index']);
    Route::get('/teachers/{id}', [TeacherController::class, 'show']);
    
    // Categories routes
    Route::get('/categories', [KategoriController::class, 'index']);
    Route::get('/categories/{id}', [KategoriController::class, 'show']);
    Route::get('/categories/{id}/posts', [KategoriController::class, 'posts']);
});

// Engagement routes (public and auth-protected)
// Public: counts, views, and list comments
Route::prefix('engagement')->group(function () {
    // Post counts and views
    Route::get('/posts/{id}/counts', [EngagementController::class, 'postCounts']);
    Route::post('/posts/{id}/view', [EngagementController::class, 'incrementPostView']);
    Route::get('/posts/{id}/comments', [EngagementController::class, 'postComments']);

    // Gallery counts and views
    Route::get('/galleries/{id}/counts', [EngagementController::class, 'galleryCounts']);
    Route::post('/galleries/{id}/view', [EngagementController::class, 'incrementGalleryView']);
    Route::get('/galleries/{id}/comments', [EngagementController::class, 'galleryComments']);
});

// Auth-protected engagement actions (comments and likes)
Route::middleware('auth:sanctum')->prefix('engagement')->group(function () {
    // Comment on posts and galleries (login required)
    Route::post('/posts/{id}/comments', [EngagementController::class, 'storePostComment']);
    Route::post('/galleries/{id}/comments', [EngagementController::class, 'storeGalleryComment']);

    // Toggle like on gallery (login required)
    Route::post('/galleries/{id}/like', [EngagementController::class, 'toggleGalleryLike']);
});

// Admin routes
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    // Legacy route
    Route::get('/posts', [AdminController::class, 'posts']);
    
    // News management
    Route::apiResource('/news', NewsController::class)->except(['index', 'show']);
    
    // Events management
    Route::apiResource('/events', EventController::class)->except(['index', 'show']);
    
    // Gallery management
    Route::apiResource('/galleries', GalleryController::class)->except(['index', 'show']);
    Route::post('/galleries/{id}/photos', [GalleryController::class, 'addPhoto']);
    Route::delete('/galleries/{gallery_id}/photos/{photo_id}', [GalleryController::class, 'removePhoto']);
    
    // Categories management
    Route::apiResource('/categories', KategoriController::class)->except(['index', 'show']);
});
