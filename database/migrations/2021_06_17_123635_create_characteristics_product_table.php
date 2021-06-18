<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristics_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('characteristics_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();

            $table->foreign('product_id')->references('id')->on('products');

            $table->foreign('characteristics_id')->references('id')->on('characteristics');
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
        Schema::dropIfExists('characteristics_product');
    }
}
