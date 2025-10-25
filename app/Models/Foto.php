<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    // Tambahkan baris ini 👇
    protected $table = 'foto';

    protected $fillable = [
        'galery_id',
        'file',
        'judul'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function galery()
    {
        return $this->belongsTo(Galery::class, 'galery_id');
    }
}
