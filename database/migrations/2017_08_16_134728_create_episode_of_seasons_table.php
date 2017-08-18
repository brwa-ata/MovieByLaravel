<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodeOfSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_of_seasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('episode_name', 45);
            $table->string('episode_number', 45);
            $table->integer('season_of_tv_show_id')->unsigned()->nullable();
            $table->timestamp('released_date');
            $table->float('episode_revenue', 10, 0);
            $table->float('episode_budget', 10, 0);
            $table->text('episode_overview');
            $table->integer('duration');
            $table->integer('popularity')->default(0);
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
        Schema::dropIfExists('episode_of_seasons');
    }
}
