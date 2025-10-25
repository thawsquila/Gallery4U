<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Petugas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah tabel petugas sudah memiliki data
        if (DB::table('petugas')->count() > 0) {
            // Jika sudah ada data, update data yang ada
            $users = User::all();
            
            foreach ($users as $user) {
                // Cek apakah petugas dengan user_id ini sudah ada
                $petugas = Petugas::where('username', $user->email)->first();
                
                if ($petugas) {
                    // Update data yang sudah ada
                    $petugas->update([
                        'user_id' => $user->id,
                        'nama' => $user->name,
                        'jabatan' => 'Staff',
                    ]);
                } else {
                    // Jika belum ada, buat data baru dengan username dan password
                    Petugas::create([
                        'user_id' => $user->id,
                        'nama' => $user->name,
                        'jabatan' => 'Staff',
                        'username' => $user->email,
                        'password' => Hash::make('password123') // Default password
                    ]);
                }
            }
        } else {
            // Jika belum ada data, buat data baru
            $users = User::all();
            
            foreach ($users as $user) {
                Petugas::create([
                    'user_id' => $user->id,
                    'nama' => $user->name,
                    'jabatan' => 'Staff',
                    'username' => $user->email,
                    'password' => Hash::make('password123') // Default password
                ]);
            }
        }
    }
}