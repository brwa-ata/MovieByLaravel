<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToEpisodeOfSeasons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episode_of_seasons', function (Blueprint $table) {
            $table->foreign('season_of_tv_show_id')->references('id')->on('season_of_tv_shows')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('episode_of_seasons', function (Blueprint $table) {
            $table->dropForeign('season_of_tv_show_id');
        });
    }
}
