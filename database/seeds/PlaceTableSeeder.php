<?php

use Illuminate\Database\Seeder;
use App\Place;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $places = new Place(['name' => '東京ドーム', 'zip' => 1234567,
                            'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                            'address4' => 'アドレス４']);
      $places->save();
      $places = new Place(['name' => '東京スタジアム', 'zip' => 1234567,
                            'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                            'address4' => 'アドレス４']);
      $places->save();
      $places = new Place(['name' => '東京体育館', 'zip' => 1234567,
                            'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                            'address4' => 'アドレス４']);
      $places->save();

    }
}
