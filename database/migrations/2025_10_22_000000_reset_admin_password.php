<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')
            ->where('email', 'admin@smkn4.sch.id')
            ->update(['password' => Hash::make('123456')]);
    }

    public function down(): void
    {
        // Rollback tidak diperlukan
    }
};
