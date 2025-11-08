<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;
use App\Models\Galery;
use App\Models\GaleryLike;
use App\Models\Comment;

class EngagementController extends Controller
{
    public function postCounts($id)
    {
        $post = Post::where('status', 'aktif')->findOrFail($id);
        $commentsCount = Comment::where('post_id', $post->id)->where('is_approved', true)->count();
        return response()->json([
            'id' => $post->id,
            'kategori_id' => $post->kategori_id,
            'views' => (int) ($post->views ?? 0),
            'comments_count' => $commentsCount,
            'likes_count' => 0,
        ]);
    }

    public function galleryCounts($id, Request $request)
    {
        $galeri = Galery::where('status', 'aktif')->findOrFail($id);
        $commentsCount = Comment::where('galery_id', $galeri->id)->where('is_approved', true)->count();
        $likesCount = Schema::hasTable('galery_likes') ? $galeri->likes()->count() : 0;
        $likedByMe = false;
        if (Schema::hasTable('galery_likes') && $request->user()) {
            $likedByMe = $galeri->isLikedBy($request->user()->id);
        }
        return response()->json([
            'id' => $galeri->id,
            'views' => (int) ($galeri->views ?? 0),
            'comments_count' => $commentsCount,
            'likes_count' => $likesCount,
            'liked_by_me' => $likedByMe,
        ]);
    }

    public function incrementPostView($id)
    {
        $post = Post::findOrFail($id);
        $post->increment('views');
        return response()->json(['id' => $post->id, 'views' => (int) $post->views]);
    }

    public function incrementGalleryView($id)
    {
        $galeri = Galery::findOrFail($id);
        $galeri->increment('views');
        return response()->json(['id' => $galeri->id, 'views' => (int) $galeri->views]);
    }

    public function postComments($id)
    {
        $post = Post::where('status', 'aktif')->findOrFail($id);
        $comments = Comment::where('post_id', $post->id)
            ->whereNull('parent_id')
            ->where('is_approved', true)
            ->with(['replies' => function ($q) {
                $q->where('is_approved', true)
                  ->with(['replies' => function ($r2) {
                      $r2->where('is_approved', true)
                         ->with(['replies' => function ($r3) {
                             $r3->where('is_approved', true);
                         }]);
                  }]);
            }, 'user'])
            ->latest()
            ->get();
        return response()->json($comments);
    }

    public function galleryComments($id)
    {
        $galeri = Galery::where('status', 'aktif')->findOrFail($id);
        $comments = Comment::where('galery_id', $galeri->id)
            ->whereNull('parent_id')
            ->where('is_approved', true)
            ->with(['replies' => function ($q) {
                $q->where('is_approved', true)
                  ->with(['replies' => function ($r2) {
                      $r2->where('is_approved', true)
                         ->with(['replies' => function ($r3) {
                             $r3->where('is_approved', true);
                         }]);
                  }]);
            }, 'user'])
            ->latest()
            ->get();
        return response()->json($comments);
    }

    public function storePostComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:2000',
            'parent_id' => 'nullable|integer'
        ]);
        $post = Post::where('status', 'aktif')->where('kategori_id', 1)->findOrFail($id);
        $user = $request->user();
        $comment = Comment::create([
            'post_id' => $post->id,
            'parent_id' => $request->input('parent_id'),
            'user_id' => $user?->id,
            'name' => $user?->name,
            'email' => $user?->email,
            'content' => $request->input('content'),
            'is_approved' => true,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
        return response()->json(['message' => 'Komentar berhasil dikirim.', 'data' => $comment], 201);
    }

    public function storeGalleryComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:2000',
            'parent_id' => 'nullable|integer'
        ]);
        $galeri = Galery::where('status', 'aktif')->findOrFail($id);
        $user = $request->user();
        $comment = Comment::create([
            'galery_id' => $galeri->id,
            'parent_id' => $request->input('parent_id'),
            'user_id' => $user?->id,
            'name' => $user?->name,
            'email' => $user?->email,
            'content' => $request->input('content'),
            'is_approved' => true,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
        return response()->json(['message' => 'Komentar berhasil dikirim.', 'data' => $comment], 201);
    }

    public function toggleGalleryLike(Request $request, $id)
    {
        $galeri = Galery::findOrFail($id);
        $userId = $request->user()->id;
        $existing = GaleryLike::where('galery_id', $galeri->id)->where('user_id', $userId)->first();
        $status = 'liked';
        if ($existing) {
            $existing->delete();
            $status = 'unliked';
        } else {
            GaleryLike::create(['galery_id' => $galeri->id, 'user_id' => $userId]);
        }
        return response()->json([
            'status' => $status,
            'likes' => Schema::hasTable('galery_likes') ? $galeri->likes()->count() : 0,
        ]);
    }
}
