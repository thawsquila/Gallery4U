<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetAdminPassword extends Command
{
    protected $signature = 'admin:reset-password {email=admin@smkn4.sch.id} {password=123456}';
    protected $description = 'Reset admin password';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User dengan email {$email} tidak ditemukan.");
            return 1;
        }

        $user->update(['password' => Hash::make($password)]);
        $this->info("✓ Password untuk {$email} berhasil direset ke: {$password}");
        return 0;
    }
}
