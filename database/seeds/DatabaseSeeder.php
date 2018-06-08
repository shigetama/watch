<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(GametypeTableSeeder::class);
      $this->call(PlaceTableSeeder::class);
      $this->call(TeamTableSeeder::class);
      $this->call(UserTableSeeder::class);
      $this->call(CommenttypeTableSeeder::class);
      $this->call(LargeUserTableSeeder::class);
      $this->call(GameTableSeeder::class);
      $this->call(FollowerTableSeeder::class);
      $this->call(GamecommentTableSeeder::class);

    }
}
