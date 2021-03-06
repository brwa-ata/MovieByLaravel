<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToProductionCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('production_companies', function (Blueprint $table) {
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('production_companies', function (Blueprint $table) {
            $table->dropForeign('film_id');
            $table->dropForeign('tv_show');
        });
    }
}
