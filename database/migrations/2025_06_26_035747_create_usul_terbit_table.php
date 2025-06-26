<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulTerbitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usul_terbit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('judul', 75);
            $table->integer('harga');
            $table->integer('jumlah_halaman');
            $table->text('sinopsis');
            $table->string('file_naskah', 255);
            $table->string('sampul', 255)->nullable();
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('kategori_id')->references('kategori_id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usul_terbit');
    }
}
