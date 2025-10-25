<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // If your table name is not "teachers", set it explicitly:
    // protected $table = 'teachers';

    protected $fillable = [
        'nama',
        'jabatan',
        'bidang',
        'keahlian',
        'bio',
        'foto',
        'urutan',
        'status',
    ];
}