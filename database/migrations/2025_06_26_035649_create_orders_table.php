<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('total_harga');
            $table->unsignedBigInteger('diskon_id')->nullable();
            $table->enum('status', ['lunas', 'tunda', 'gagal']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('diskon_id')->references('diskon_id')->on('diskon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
