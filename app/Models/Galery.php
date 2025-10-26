<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galery';

    protected $fillable = [
        'post_id',
        'kategori',
        'status',
        'judul',
        'deskripsi',
        'views'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'galery_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'galery_id');
    }
    
    public function likes()
    {
        return $this->hasMany(GaleryLike::class, 'galery_id');
    }
    
    public function isLikedBy(?int $userId): bool
    {
        if (!$userId) return false;
        return $this->likes()->where('user_id', $userId)->exists();
    }
    
    // Accessor untuk mengkonversi status menjadi is_active
    public function getIsActiveAttribute()
    {
        // Log status untuk debugging
        \Log::info('Gallery status: ' . $this->status);
        return $this->status === 'aktif';
    }
}
