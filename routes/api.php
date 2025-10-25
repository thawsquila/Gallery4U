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

// Authentication routes
Route::post('/login', [ApiController::class, 'login']);
Route::post('/logout', [ApiController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [ApiController::class, 'user'])->middleware('auth:sanctum');

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
    
    // Categories routes
    Route::get('/categories', [KategoriController::class, 'index']);
    Route::get('/categories/{id}', [KategoriController::class, 'show']);
    Route::get('/categories/{id}/posts', [KategoriController::class, 'posts']);
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
