<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('email', 100);
            $table->char('email_for_forms', 100);
            $table->char('phone_1', 100);
            $table->char('phone_2', 100);
            $table->char('phone_3', 100);
            $table->char('phone_social', 50)->nullable();
            $table->char('telegram', 50)->nullable();
            $table->char('viber', 50)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
