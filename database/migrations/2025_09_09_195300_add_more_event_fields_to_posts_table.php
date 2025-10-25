<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // waktu_mulai: jam acara (HH:MM)
            $table->string('waktu_mulai', 10)->nullable()->after('tanggal');
            // tiket: teks bebas, contoh "Gratis (Wajib Registrasi)" atau "Rp 20.000"
            $table->string('tiket')->nullable()->after('lokasi');
            // kapasitas: jumlah peserta
            $table->unsignedInteger('kapasitas')->nullable()->after('tiket');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['waktu_mulai','tiket','kapasitas']);
        });
    }
};
