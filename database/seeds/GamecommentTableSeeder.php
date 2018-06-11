<?php

use Illuminate\Database\Seeder;
use App\Gamecomment;
use App\Photo;
use App\User;
use App\Game;

class GamecommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Gamecomment::class, 250)->create();
    }
}
