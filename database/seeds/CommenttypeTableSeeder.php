<?php

use Illuminate\Database\Seeder;
use App\Commenttype;

class CommenttypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $commenttype = new Commenttype(['comment_status' => 'TEST']);
      $commenttype->save();

    }
}
