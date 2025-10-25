<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori_id',
        'isi',
        'petugas_id',
        'status',
        'gambar',
        'tanggal',
        'waktu_mulai',
        'lokasi',
        'tiket',
        'kapasitas',
        'views'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function galeries()
    {
        return $this->hasMany(Galery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
