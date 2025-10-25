<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('galery', function (Blueprint $table) {
            // Cek apakah kolom created_at sudah ada di tabel galery
            if (!Schema::hasColumn('galery', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galery', function (Blueprint $table) {
            if (Schema::hasColumn('galery', 'created_at')) {
                $table->dropColumn('created_at');
            }
        });
    }
};
