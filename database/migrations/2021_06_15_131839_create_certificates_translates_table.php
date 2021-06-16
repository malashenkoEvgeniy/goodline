<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 255);
            $table->text('body')->nullable();
            $table->char('language', 10)->default('ua');
            $table->integer('certificates_id')->unsigned();
            $table->foreign('certificates_id')->references('id')->on('certificates')->onDelete('cascade');
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
        Schema::dropIfExists('certificates_translates');
    }
}
