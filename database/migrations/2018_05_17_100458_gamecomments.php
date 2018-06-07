<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gamecomments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('gamecomments', function (Blueprint $table) {
        $table->foreign('game_id')
              ->references('id')
              ->on('games');
        $table->foreign('user_id')
              ->references('id')
              ->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('gamecomments', function (Blueprint $table) {
        $table->dropForeign('gamecomments_game_id_foreign');
        $table->dropForeign('gamecomments_user_id_foreign');
      });
    }
}
