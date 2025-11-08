<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * List tenaga pendidik aktif.
     * Optional query: per_page (integer) untuk pagination.
     */
    public function index(Request $request)
    {
        $perPage = (int) ($request->query('per_page') ?? 0);
        $query = Teacher::where('status', 'aktif')
            ->orderBy('urutan')
            ->latest('id');

        if ($perPage > 0) {
            $paginated = $query->paginate($perPage)->through(function ($t) {
                return $this->transformTeacher($t);
            });
            return response()->json([
                'success' => true,
                'data' => $paginated->items(),
                'current_page' => $paginated->currentPage(),
                'per_page' => $paginated->perPage(),
                'total' => $paginated->total(),
                'last_page' => $paginated->lastPage(),
            ]);
        }

        $teachers = $query->get()->map(function ($t) {
            return $this->transformTeacher($t);
        });

        return response()->json([
            'success' => true,
            'data' => $teachers,
        ]);
    }

    /**
     * Detail tenaga pendidik.
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher || $teacher->status !== 'aktif') {
            return response()->json([
                'success' => false,
                'message' => 'Teacher not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->transformTeacher($teacher),
        ]);
    }

    private function transformTeacher(Teacher $t): array
    {
        $photoUrl = $t->foto ? asset('images/teachers/' . $t->foto) : null;
        return [
            'id' => $t->id,
            'nama' => $t->nama,
            'jabatan' => $t->jabatan,
            'bidang' => $t->bidang,
            'keahlian' => $t->keahlian,
            'bio' => $t->bio,
            'foto' => $t->foto,
            'photo_url' => $photoUrl,
            'urutan' => $t->urutan,
            'status' => $t->status,
            'created_at' => $t->created_at,
            'updated_at' => $t->updated_at,
        ];
    }
}
