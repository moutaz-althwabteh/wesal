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
            $table->increments('id');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('about_ar');
            $table->string('about_en');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('email');
            $table->string('fax');
            $table->integer('tel');
            $table->integer('mobile');
            $table->float('Longtude');
            $table->float('Latitude');
            $table->string('title_place');
            $table->boolean('maintenance');
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
