<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@smkn4.sch.id',
            'role' => 'admin',
            'password' => Hash::make('123456'),
        ]);

        // Create guest user
        User::create([
            'name' => 'Guest User',
            'email' => 'guest@smkn4.sch.id',
            'role' => 'guest',
            'password' => Hash::make('123456'),
        ]);
    }
}