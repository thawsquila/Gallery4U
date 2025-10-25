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
        // Column already exists from previous migration attempt
        // Just add index if needed
        Schema::table('comments', function (Blueprint $table) {
            if (!Schema::hasColumn('comments', 'galery_id')) {
                $table->integer('galery_id')->nullable()->after('post_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            if (Schema::hasColumn('comments', 'galery_id')) {
                $table->dropColumn('galery_id');
            }
        });
    }
};
