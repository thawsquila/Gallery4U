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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('active_students')->default(0);
            $table->integer('majors_count')->default(4);
            $table->integer('professional_teachers')->default(0);
            $table->timestamps();
        });

        // Insert default values
        DB::table('statistics')->insert([
            'active_students' => 1200,
            'majors_count' => 4,
            'professional_teachers' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
