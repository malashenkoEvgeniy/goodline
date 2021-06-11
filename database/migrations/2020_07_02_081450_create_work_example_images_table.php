<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExampleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_example_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image');
            $table->integer('sort')->default('10');
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
        Schema::dropIfExists('work_example_images');
    }
}
