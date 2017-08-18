<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToEpisodeImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episode_images', function (Blueprint $table) {
            $table->foreign('episode_of_season_id')->references('id')->on('episode_of_seasons')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('episode_images', function (Blueprint $table) {
            $table->dropForeign('episode_of_season_id');
        });
    }
}
