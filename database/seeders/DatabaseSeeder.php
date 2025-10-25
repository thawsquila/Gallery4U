<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call UserSeeder to create admin and guest users
        $this->call([
            UserSeeder::class,
            PetugasSeeder::class,
            KategoriSeeder::class,
            PostSeeder::class,
        ]);
        
        // Uncomment if you want to create test users with factory
        // User::factory(10)->create();
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
