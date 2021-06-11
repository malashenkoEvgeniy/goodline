<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title', 100)->nullable();
            $table->char('address', 200)->nullable();
            $table->text('body')->nullable();
            $table->char('seo_title', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->char('language', 10);
            $table->bigInteger('settings_id')->unsigned();
            $table->foreign('settings_id')->references('id')->on('settings')->onDelete('cascade');
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
        Schema::dropIfExists('settings_translates');
    }
}
