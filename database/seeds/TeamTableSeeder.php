<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $teams = new Team(['name' => 'team1', 'gametype_id' => 2]);
      $teams->save();
      $teams = new Team(['name' => 'team2', 'gametype_id' => 3]);
      $teams->save();
      $teams = new Team(['name' => 'team3', 'gametype_id' => 4]);
      $teams->save();
    }
}
