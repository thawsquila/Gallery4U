<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'active_students',
        'majors_count',
        'professional_teachers'
    ];

    /**
     * Get the current statistics
     *
     * @return \App\Models\Statistics
     */
    public static function getCurrent()
    {
        return self::firstOrCreate([], [
            'active_students' => 1200,
            'majors_count' => 4,
            'professional_teachers' => 100,
        ]);
    }
}
