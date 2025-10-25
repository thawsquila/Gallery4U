<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->string('bidang')->nullable();
            $table->string('keahlian')->nullable(); // comma separated tags
            $table->text('bio')->nullable();
            $table->string('foto')->nullable(); // stored file name in public/images/teachers
            $table->string('linkedin_url')->nullable();
            $table->string('email')->nullable();
            $table->integer('urutan')->default(0);
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
