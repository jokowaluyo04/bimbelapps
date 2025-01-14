<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->string('kelas');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_hp', 15);
            $table->text('alamat');
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
