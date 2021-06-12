<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductmirrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productmirrors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prod_var');
            $table->foreign('prod_var')->references('id')->on('productvariants');
            $table->unsignedBigInteger('mirror_id');
            $table->foreign('mirror_id')->references('id')->on('mirrors');
            $table->integer('price');
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
        Schema::dropIfExists('productmirrors');
    }
}
