<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('games', function (Blueprint $table) {
        $table->foreign('gametype_id')
              ->references('id')
              ->on('gametypes');
        $table->foreign('place_id')
              ->references('id')
              ->on('places');
        $table->foreign('create_user_id')
              ->references('id')
              ->on('users');
        $table->foreign('home_team_id')
              ->references('id')
              ->on('teams');
        $table->foreign('visitor_team_id')
              ->references('id')
              ->on('teams');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('games', function (Blueprint $table) {
        $table->dropForeign('games_gametype_id_foreign');
        $table->dropForeign('games_place_id_foreign');
        $table->dropForeign('games_create_user_id_foreign');
        $table->dropForeign('games_home_team_id_foreign');
        $table->dropForeign('games_visitor_team_id_foreign');
      });
    }
}
