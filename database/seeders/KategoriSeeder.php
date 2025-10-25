<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah kategori Berita sudah ada
        if (!DB::table('kategori')->where('judul', 'Berita')->exists()) {
            DB::table('kategori')->insert([
                'judul' => 'Berita'
            ]);
        }
        
        // Cek apakah kategori Event sudah ada
        if (!DB::table('kategori')->where('judul', 'Event')->exists()) {
            DB::table('kategori')->insert([
                'judul' => 'Event'
            ]);
        }
    }
}
