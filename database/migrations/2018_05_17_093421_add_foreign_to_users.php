<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->foreign('favorite_game_type_id')
              ->references('id')
              ->on('gametypes');
        $table->foreign('favorite_team_id')
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
        Schema::table('users', function (Blueprint $table) {
          $table->dropForeign('users_favorite_game_type_id_foreign');
          $table->dropForeign('users_favorite_team_id_foreign');
        });
    }
}
