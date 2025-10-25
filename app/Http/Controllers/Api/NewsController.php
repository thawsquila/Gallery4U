<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $news = Post::where('kategori_id', 1) // Assuming kategori_id 1 is for news
                    ->with('kategori')
                    ->latest()
                    ->get();
                    
        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }

    /**
     * Store a newly created news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:published,draft'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Handle file upload
        $gambar = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/news', $gambar);
        }

        // Dapatkan petugas_id berdasarkan user_id yang login
        $petugas = \App\Models\Petugas::where('user_id', auth()->id())->first();
        
        if (!$petugas) {
            return response()->json([
                'success' => false,
                'message' => 'Petugas not found for this user'
            ], 400);
        }
        
        // Create news as a post with kategori_id 1
        $news = Post::create([
            'judul' => $request->judul,
            'kategori_id' => 1, // Assuming kategori_id 1 is for news
            'isi' => $request->isi,
            'petugas_id' => $petugas->id, // Set petugas_id yang benar
            'status' => $request->status,
            'gambar' => $gambar
        ]);

        return response()->json([
            'success' => true,
            'message' => 'News created successfully',
            'data' => $news
        ], 201);
    }

    /**
     * Display the specified news.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $news = Post::where('id', $id)
                    ->where('kategori_id', 1) // Ensure it's a news
                    ->with('kategori')
                    ->first();

        if (!$news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }

    /**
     * Update the specified news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $news = Post::where('id', $id)
                    ->where('kategori_id', 1) // Ensure it's a news
                    ->first();

        if (!$news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'sometimes|required|string|max:255',
            'isi' => 'sometimes|required|string',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'sometimes|required|in:published,draft'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Handle file upload if there's a new image
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($news->gambar) {
                Storage::delete('public/news/' . $news->gambar);
            }
            
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/news', $gambar);
            $news->gambar = $gambar;
        }

        // Update news fields
        if ($request->has('judul')) $news->judul = $request->judul;
        if ($request->has('isi')) $news->isi = $request->isi;
        if ($request->has('status')) $news->status = $request->status;

        $news->save();

        return response()->json([
            'success' => true,
            'message' => 'News updated successfully',
            'data' => $news
        ]);
    }

    /**
     * Remove the specified news from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $news = Post::where('id', $id)
                    ->where('kategori_id', 1) // Ensure it's a news
                    ->first();

        if (!$news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found'
            ], 404);
        }

        // Delete image if exists
        if ($news->gambar) {
            Storage::delete('public/news/' . $news->gambar);
        }

        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'News deleted successfully'
        ]);
    }

    /**
     * Get featured news.
     *
     * @param  int  $limit
     * @return \Illuminate\Http\JsonResponse
     */
    public function featured($limit = 5)
    {
        $news = Post::where('kategori_id', 1) // Assuming kategori_id 1 is for news
                    ->where('status', 'published')
                    ->with('kategori')
                    ->latest()
                    ->limit($limit)
                    ->get();
                    
        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }
}