<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('lense_id')->nullable();
            $table->foreign('lense_id')->references('id')->on('lenses');
            $table->unsignedBigInteger('mirror_id')->nullable();
            $table->foreign('mirror_id')->references('id')->on('mirrors');
            $table->unsignedBigInteger('prod_var_id')->nullable();
            $table->foreign('prod_var_id')->references('id')->on('productvariants');
            $table->integer('qty');
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
        Schema::dropIfExists('carts');
    }
}
