<?php

use Illuminate\Database\Seeder;
use App\Gametype;

class GametypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gametypes = new Gametype(['name' => '野球']);
        $gametypes->save();
        $gametypes = new Gametype(['name' => 'サッカー']);
        $gametypes->save();
        $gametypes = new Gametype(['name' => 'バスケットボール']);
        $gametypes->save();
        $gametypes = new Gametype(['name' => 'フットサル']);
        $gametypes->save();
        $gametypes = new Gametype(['name' => 'バレーボール']);
        $gametypes->save();


    }
}
