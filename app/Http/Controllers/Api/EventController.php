<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $events = Post::where('kategori_id', 2) // Assuming kategori_id 2 is for events
                    ->with('kategori')
                    ->latest()
                    ->get();
                    
        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }

    /**
     * Store a newly created event in storage.
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
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
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
            $file->storeAs('public/events', $gambar);
        }

        // Dapatkan petugas_id berdasarkan user_id yang login
        $petugas = \App\Models\Petugas::where('user_id', auth()->id())->first();
        
        if (!$petugas) {
            return response()->json([
                'success' => false,
                'message' => 'Petugas not found for this user'
            ], 400);
        }
        
        // Create event as a post with kategori_id 2
        $event = Post::create([
            'judul' => $request->judul,
            'kategori_id' => 2, // Assuming kategori_id 2 is for events
            'isi' => $request->isi,
            'petugas_id' => $petugas->id, // Set petugas_id yang benar
            'status' => $request->status,
            'gambar' => $gambar,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Event created successfully',
            'data' => $event
        ], 201);
    }

    /**
     * Display the specified event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $event = Post::where('id', $id)
                    ->where('kategori_id', 2) // Ensure it's an event
                    ->with('kategori')
                    ->first();

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    /**
     * Update the specified event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $event = Post::where('id', $id)
                    ->where('kategori_id', 2) // Ensure it's an event
                    ->first();

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'sometimes|required|string|max:255',
            'isi' => 'sometimes|required|string',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'sometimes|required|date',
            'lokasi' => 'sometimes|required|string|max:255',
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
            if ($event->gambar) {
                Storage::delete('public/events/' . $event->gambar);
            }
            
            $file = $request->file('gambar');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/events', $gambar);
            $event->gambar = $gambar;
        }

        // Update event fields
        if ($request->has('judul')) $event->judul = $request->judul;
        if ($request->has('isi')) $event->isi = $request->isi;
        if ($request->has('status')) $event->status = $request->status;
        if ($request->has('tanggal')) $event->tanggal = $request->tanggal;
        if ($request->has('lokasi')) $event->lokasi = $request->lokasi;

        $event->save();

        return response()->json([
            'success' => true,
            'message' => 'Event updated successfully',
            'data' => $event
        ]);
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $event = Post::where('id', $id)
                    ->where('kategori_id', 2) // Ensure it's an event
                    ->first();

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        // Delete image if exists
        if ($event->gambar) {
            Storage::delete('public/events/' . $event->gambar);
        }

        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully'
        ]);
    }

    /**
     * Get upcoming events.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upcoming()
    {
        $events = Post::where('kategori_id', 2) // Assuming kategori_id 2 is for events
                    ->where('tanggal', '>=', now()->format('Y-m-d'))
                    ->where('status', 'published')
                    ->with('kategori')
                    ->orderBy('tanggal', 'asc')
                    ->get();
                    
        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }

    /**
     * Get past events.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function past()
    {
        $events = Post::where('kategori_id', 2) // Assuming kategori_id 2 is for events
                    ->where('tanggal', '<', now()->format('Y-m-d'))
                    ->where('status', 'published')
                    ->with('kategori')
                    ->orderBy('tanggal', 'desc')
                    ->get();
                    
        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }
}