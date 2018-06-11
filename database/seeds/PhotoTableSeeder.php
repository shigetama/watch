<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($e = 1; $e < 9; $e++) {
          $photo = new Photo;
          $photo->user_id = 1;
          $photo->path = $e.'.jpg';
          $photo->save();
        }
    }
}
