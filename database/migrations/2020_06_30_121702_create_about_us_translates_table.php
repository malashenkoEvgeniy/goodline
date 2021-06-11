<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('page_title',255)->nullable();
            $table->text('body_top')->nullable();
            $table->text('body_bottom')->nullable();
            $table->char('seo_title',255)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->char('language', 10);
            $table->bigInteger('about_us_id')->unsigned();
            $table->foreign('about_us_id')->references('id')->on('about_us');

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
        Schema::dropIfExists('about_us_translates');
    }
}
