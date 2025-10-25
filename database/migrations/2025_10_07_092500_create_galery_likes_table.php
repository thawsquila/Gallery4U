<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('galery_likes')) {
            return; // table already exists, prevent failure
        }
        Schema::create('galery_likes', function (Blueprint $table) {
            $table->id();
            // Match existing galery.id type (likely unsigned INT)
            $table->unsignedInteger('galery_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('galery_id')->references('id')->on('galery')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['galery_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galery_likes');
    }
};
