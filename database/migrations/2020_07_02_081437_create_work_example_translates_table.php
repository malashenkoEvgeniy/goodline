<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExampleTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_example_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title',100);
            $table->text('body')->nullable();
            $table->char('seo_title',255)->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->char('language', 10);
            $table->bigInteger('work_example_id')->unsigned();
            $table->foreign('work_example_id')->references('id')->on('work_examples')->onDelete('cascade');
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
        Schema::dropIfExists('work_example_translates');
    }
}
