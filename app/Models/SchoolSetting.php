<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'profile',
        'vision',
        'mission',
        'headmaster_name',
        'headmaster_greeting',
        'headmaster_photo',
    ];

    public static function getCurrent(): self
    {
        return static::query()->first() ?? static::create([]);
    }
}
