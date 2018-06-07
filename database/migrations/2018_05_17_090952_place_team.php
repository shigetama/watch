<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlaceTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_team', function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('place_id');
          $table->unsignedInteger('team_id');
          $table->timestamps('');

          $table->foreign('place_id')
                ->references('id')
                ->on('places')
                ->onDelete('cascade');

          $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_team');
    }
}
