<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the galleries.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $galleries = Galery::with('fotos')->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $galleries
        ]);
    }

    /**
     * Store a newly created gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:255',
            'status' => 'required|in:aktif,tidak aktif',
            'photos' => 'required|array|min:1',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:15360',
            'photo_titles' => 'required|array|min:1',
            'photo_titles.*' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create gallery
        $gallery = Galery::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'status' => $request->status
        ]);

        // Handle photo uploads
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            $titles = $request->photo_titles;

            foreach ($photos as $index => $photo) {
                $filename = time() . '_' . $photo->getClientOriginalName();
                $photo->storeAs('public/gallery', $filename);

                Foto::create([
                    'galery_id' => $gallery->id,
                    'file' => $filename,
                    'judul' => $titles[$index] ?? 'Untitled'
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Gallery created successfully',
            'data' => $gallery->load('fotos')
        ], 201);
    }

    /**
     * Display the specified gallery.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $gallery = Galery::with('fotos')->find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $gallery
        ]);
    }

    /**
     * Update the specified gallery in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $gallery = Galery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|nullable|string',
            'kategori' => 'sometimes|nullable|string|max:255',
            'status' => 'sometimes|required|in:aktif,tidak aktif',
            'photos' => 'sometimes|array',
            'photos.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_titles' => 'sometimes|array',
            'photo_titles.*' => 'sometimes|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update gallery fields
        if ($request->has('judul')) $gallery->judul = $request->judul;
        if ($request->has('deskripsi')) $gallery->deskripsi = $request->deskripsi;
        if ($request->has('kategori')) $gallery->kategori = $request->kategori;
        if ($request->has('status')) $gallery->status = $request->status;

        $gallery->save();

        // Handle new photo uploads if any
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            $titles = $request->photo_titles ?? [];

            foreach ($photos as $index => $photo) {
                $filename = time() . '_' . $photo->getClientOriginalName();
                $photo->storeAs('public/gallery', $filename);

                Foto::create([
                    'galery_id' => $gallery->id,
                    'file' => $filename,
                    'judul' => $titles[$index] ?? 'Untitled'
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Gallery updated successfully',
            'data' => $gallery->load('fotos')
        ]);
    }

    /**
     * Remove the specified gallery from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $gallery = Galery::with('fotos')->find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found'
            ], 404);
        }

        // Delete all associated photos
        foreach ($gallery->fotos as $foto) {
            Storage::delete('public/gallery/' . $foto->file);
            $foto->delete();
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery deleted successfully'
        ]);
    }

    /**
     * Add a photo to an existing gallery.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPhoto(Request $request, $id)
    {
        $gallery = Galery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Handle photo upload
        $photo = $request->file('photo');
        $filename = time() . '_' . $photo->getClientOriginalName();
        $photo->storeAs('public/gallery', $filename);

        $foto = Foto::create([
            'galery_id' => $gallery->id,
            'file' => $filename,
            'judul' => $request->title
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Photo added successfully',
            'data' => $foto
        ], 201);
    }

    /**
     * Remove a photo from a gallery.
     *
     * @param  int  $gallery_id
     * @param  int  $photo_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removePhoto($gallery_id, $photo_id)
    {
        $gallery = Galery::find($gallery_id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found'
            ], 404);
        }

        $photo = Foto::where('galery_id', $gallery_id)->where('id', $photo_id)->first();

        if (!$photo) {
            return response()->json([
                'success' => false,
                'message' => 'Photo not found in this gallery'
            ], 404);
        }

        // Delete the photo file
        Storage::delete('public/gallery/' . $photo->file);
        $photo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Photo removed successfully'
        ]);
    }
}