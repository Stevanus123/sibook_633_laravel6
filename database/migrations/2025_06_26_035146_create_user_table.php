<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foto', 100)->default('profil/profile_default.png');
            $table->string('nama', 50);
            $table->string('username', 120)->unique();
            $table->string('password', 255);
            $table->string('email', 200);
            $table->string('no_telp', 15);
            $table->string('desa', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('kota', 150);
            $table->integer('saldo')->default(100000);
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
        Schema::dropIfExists('user');
    }
}
