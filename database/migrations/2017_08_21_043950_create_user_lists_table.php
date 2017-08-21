<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listname');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('film_id')->unsigned()->nullable();
            $table->integer('episode_of_season_id')->unsigned()->nullable();
            $table->text('list_image');
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
        Schema::drop('user_lists');
    }
}
