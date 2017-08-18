<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonOfTvShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('season_of_tv_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('season');
            $table->integer('tv_show_id')->unsigned()->nullable();
            $table->text('overview');
            $table->timestamp('year');
            $table->text('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('season_of_tv_shows');
    }
}
