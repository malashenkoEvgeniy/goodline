<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsItemsTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_items_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title', 100)->nullable();
            $table->text('body')->nullable();
            $table->char('language', 10);
            $table->bigInteger('about_us_items_id')->unsigned();
            $table->foreign('about_us_items_id')->references('id')->on('about_us_items')->onDelete('cascade');
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
        Schema::dropIfExists('about_us_items_translates');
    }
}
