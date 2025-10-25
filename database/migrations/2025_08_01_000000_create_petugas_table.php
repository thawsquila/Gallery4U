<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel petugas sudah ada dengan kolom id, username, password, dan created_at
        // Kita hanya perlu menambahkan kolom user_id, nama, dan jabatan jika belum ada
        // dan menambahkan kolom updated_at jika belum ada
        
        // Cek apakah kolom user_id sudah ada di tabel petugas
        if (!Schema::hasColumn('petugas', 'user_id')) {
            Schema::table('petugas', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('id');
            });
        }

        // Cek apakah kolom nama sudah ada di tabel petugas
        if (!Schema::hasColumn('petugas', 'nama')) {
            Schema::table('petugas', function (Blueprint $table) {
                $table->string('nama')->nullable()->after('password');
            });
        }

        // Cek apakah kolom jabatan sudah ada di tabel petugas
        if (!Schema::hasColumn('petugas', 'jabatan')) {
            Schema::table('petugas', function (Blueprint $table) {
                $table->string('jabatan')->nullable()->after('nama');
            });
        }

        // Cek apakah kolom updated_at sudah ada di tabel petugas
        if (!Schema::hasColumn('petugas', 'updated_at')) {
            Schema::table('petugas', function (Blueprint $table) {
                $table->timestamp('updated_at')->nullable()->after('created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak menghapus tabel, hanya menghapus kolom yang ditambahkan jika diperlukan
        Schema::table('petugas', function (Blueprint $table) {
            if (Schema::hasColumn('petugas', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('petugas', 'nama')) {
                $table->dropColumn('nama');
            }
            if (Schema::hasColumn('petugas', 'jabatan')) {
                $table->dropColumn('jabatan');
            }
            if (Schema::hasColumn('petugas', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
        });
    }
};