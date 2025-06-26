<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon', function (Blueprint $table) {
            $table->bigIncrements('diskon_id');
            $table->string('nama_diskon', 75);
            $table->string('kode', 15);
            $table->longText('deskripsi');
            $table->float('persen');
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskon');
    }
}
