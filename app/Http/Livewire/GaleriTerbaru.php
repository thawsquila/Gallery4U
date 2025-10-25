<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Galery;

class GaleriTerbaru extends Component
{
    public function render()
    {
        $galeriByKategori = Galery::with('fotos')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('kategori');

        return view('livewire.galeri-terbaru', [
            'galeriByKategori' => $galeriByKategori
        ]);
    }
}