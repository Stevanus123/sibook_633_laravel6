<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('cartItems_id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('buku_id');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('cart_id')->references('cart_id')->on('carts')->onDelete('cascade');
            $table->foreign('buku_id')->references('buku_id')->on('books')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
