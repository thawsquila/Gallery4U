<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryLike extends Model
{
    use HasFactory;

    protected $table = 'galery_likes';

    protected $fillable = [
        'galery_id',
        'user_id',
    ];

    public function galery()
    {
        return $this->belongsTo(Galery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
