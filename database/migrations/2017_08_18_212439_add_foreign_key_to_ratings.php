<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {

            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('episode_of_season_id')->references('id')->on('episode_of_seasons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {

            $table->dropForeign('film_id');
            $table->dropForeign('episode_of_season_id');
            $table->dropForeign('user_id');

        });
    }
}
