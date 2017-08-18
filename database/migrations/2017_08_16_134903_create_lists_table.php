<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listname');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('film_id')->unsigned()->nullable();
            $table->integer('episode_of_season_id')->unsigned()->nullable();
            $table->integer('image_of_list_id')->unsigned()->nullable();
            $table->text('list_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists');
    }
}
