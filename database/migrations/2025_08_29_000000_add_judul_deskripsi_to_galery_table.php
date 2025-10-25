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
            $table->string('judul')->nullable()->after('kategori');
            $table->text('deskripsi')->nullable()->after('judul');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galery', function (Blueprint $table) {
            $table->dropColumn(['judul', 'deskripsi']);
        });
    }
};