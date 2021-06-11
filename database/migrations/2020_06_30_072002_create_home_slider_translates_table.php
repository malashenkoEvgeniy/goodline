<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeSliderTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_slider_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title', 80)->nullable();
            $table->text('sub_title')->nullable();
            $table->char('language', 10);
            $table->bigInteger('home_slider_id')->unsigned();
            $table->foreign('home_slider_id')->references('id')->on('home_sliders')->onDelete('cascade');
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
        Schema::dropIfExists('home_slider_translates');
    }
}
