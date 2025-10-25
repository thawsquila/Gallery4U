<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Petugas;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID kategori
        $kategoriBerita = Kategori::where('judul', 'Berita')->first();
        $kategoriEvent = Kategori::where('judul', 'Event')->first();
        
        // Mendapatkan ID petugas (admin)
        $petugasAdmin = Petugas::where('username', 'admin@smkn4.sch.id')->first();
        
        if ($kategoriBerita && $petugasAdmin) {
            // Contoh berita 1
            DB::table('posts')->insert([
                'judul' => 'Berita Terkini: Perkembangan Teknologi AI',
                'kategori_id' => $kategoriBerita->id,
                'isi' => '<p>Perkembangan teknologi kecerdasan buatan (AI) semakin pesat dalam beberapa tahun terakhir. Berbagai inovasi baru bermunculan dan memberikan dampak signifikan pada berbagai sektor industri.</p><p>Para ahli memprediksi bahwa teknologi AI akan terus berkembang dan menjadi bagian penting dalam kehidupan sehari-hari.</p>',
                'petugas_id' => 2,
                'status' => 'published',
                'gambar' => 'default-berita.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            
            // Contoh berita 2
            DB::table('posts')->insert([
                'judul' => 'Perkembangan Ekonomi Digital di Indonesia',
                'kategori_id' => $kategoriBerita->id,
                'isi' => '<p>Ekonomi digital di Indonesia terus menunjukkan pertumbuhan yang signifikan. Berbagai startup bermunculan dan mendapatkan pendanaan yang besar.</p><p>Pemerintah juga terus mendorong perkembangan ekonomi digital melalui berbagai kebijakan dan program.</p>',
                'petugas_id' => 2,
                'status' => 'published',
                'gambar' => 'default-berita.jpg',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ]);
        }
        
        if ($kategoriEvent && $petugasAdmin) {
            // Contoh event 1
            DB::table('posts')->insert([
                'judul' => 'Workshop Pengembangan Web dengan Laravel',
                'kategori_id' => $kategoriEvent->id,
                'isi' => '<p>Workshop pengembangan web dengan Laravel akan diselenggarakan pada tanggal 15 Agustus 2023. Workshop ini akan membahas berbagai fitur terbaru dari Laravel dan implementasinya dalam pengembangan aplikasi web.</p>',
                'petugas_id' => $petugasAdmin->id,
                'status' => 'published',
                'gambar' => 'default-event.jpg',
                'tanggal' => '2023-08-15',
                'lokasi' => 'Gedung Serbaguna, Jakarta',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ]);
            
            // Contoh event 2
            DB::table('posts')->insert([
                'judul' => 'Seminar Keamanan Siber',
                'kategori_id' => $kategoriEvent->id,
                'isi' => '<p>Seminar keamanan siber akan diselenggarakan pada tanggal 20 September 2023. Seminar ini akan membahas berbagai isu terkini dalam keamanan siber dan strategi untuk mengatasinya.</p>',
                'petugas_id' => 2,
                'status' => 'published',
                'gambar' => 'default-event.jpg',
                'tanggal' => '2023-09-20',
                'lokasi' => 'Hotel Grand Hyatt, Surabaya',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ]);
        }
    }
}
