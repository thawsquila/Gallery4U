<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Show the form for editing the statistics.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $stats = Statistics::getCurrent();
        $school = SchoolSetting::getCurrent();
        return view('admin.statistics.edit', compact('stats','school'));
    }

    /**
     * Update the specified statistics in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate both statistics and school profile fields
        $validated = $request->validate([
            'active_students' => 'required|integer|min:0',
            'majors_count' => 'required|integer|min:0',
            'professional_teachers' => 'required|integer|min:0',

            'school_name' => 'nullable|string|max:255',
            'profile' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'headmaster_name' => 'nullable|string|max:255',
            'headmaster_greeting' => 'nullable|string',
            'headmaster_photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        // Update statistics
        $stats = Statistics::getCurrent();
        $stats->update([
            'active_students' => $validated['active_students'],
            'majors_count' => $validated['majors_count'],
            'professional_teachers' => $validated['professional_teachers'],
        ]);

        // Update school settings
        $school = SchoolSetting::getCurrent();
        $school->school_name = $validated['school_name'] ?? $school->school_name;
        $school->profile = $validated['profile'] ?? $school->profile;
        $school->vision = $validated['vision'] ?? $school->vision;
        $school->mission = $validated['mission'] ?? $school->mission;
        $school->headmaster_name = $validated['headmaster_name'] ?? $school->headmaster_name;
        $school->headmaster_greeting = $validated['headmaster_greeting'] ?? $school->headmaster_greeting;

        // Handle headmaster photo upload
        if ($request->hasFile('headmaster_photo')) {
            $dir = public_path('images/headmaster');
            if (!is_dir($dir)) { @mkdir($dir, 0775, true); }
            // Remove old photo if exists
            if ($school->headmaster_photo && file_exists($dir . DIRECTORY_SEPARATOR . $school->headmaster_photo)) {
                @unlink($dir . DIRECTORY_SEPARATOR . $school->headmaster_photo);
            }
            $file = $request->file('headmaster_photo');
            $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $name);
            $school->headmaster_photo = $name;
        }

        $school->save();

        return redirect()->route('admin.statistics.edit')
            ->with('success', 'Perubahan berhasil disimpan!');
    }
}
