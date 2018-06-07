<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToFollowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('followers', function (Blueprint $table) {
        $table->foreign('follow_id')
              ->references('id')
              ->on('users');
        $table->foreign('follower_id')
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
      Schema::table('followers', function (Blueprint $table) {
        $table->dropForeign('followers_follow_id_foreign');
        $table->dropForeign('followers_follower_id_foreign');
      });
    }
}
