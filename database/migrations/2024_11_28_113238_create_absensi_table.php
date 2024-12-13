<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_absensi_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    public function up()
{
    Schema::create('absensi', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->string('nis');
        $table->enum('kelas', ['pagi', 'sore', 'malam']);
        $table->enum('status', ['hadir', 'sakit', 'izin', 'alpha']);
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
