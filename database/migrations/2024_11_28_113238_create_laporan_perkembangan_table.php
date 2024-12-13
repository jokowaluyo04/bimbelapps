<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_laporan_perkembangan_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPerkembanganTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_perkembangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade'); // FK ke tabel siswa
            $table->text('deskripsi');
            $table->string('nilai')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_perkembangan');
    }
}
