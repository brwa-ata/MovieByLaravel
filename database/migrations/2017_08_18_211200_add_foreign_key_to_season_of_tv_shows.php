<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToSeasonOfTvShows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('season_of_tv_shows', function (Blueprint $table) {
            $table->foreign('tv_show_id')->references('id')->on('tv_shows')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('season_of_tv_shows', function (Blueprint $table) {
            $table->dropForeign('tv_show_id');
        });
    }
}
