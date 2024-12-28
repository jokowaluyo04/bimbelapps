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
        Schema::create('laporan_perkembangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->integer('nilai_matematika')->nullable();
            $table->integer('nilai_ipa')->nullable();
            $table->integer('nilai_ppkn')->nullable();
            $table->integer('nilai_bahasa_indonesia')->nullable();
            $table->integer('jumlah_hadir')->nullable();
            $table->integer('jumlah_tidak_hadir')->nullable();
            $table->text('catatan')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_perkembangan');
    }
};
