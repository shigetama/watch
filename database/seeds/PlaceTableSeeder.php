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
      DB::table('places')->insert([['name' => '東京ドーム', 'zip' => '1128555',
                                  'address1' => '東京都', 'address2' => '文京区',
                                  'address3' => '後楽園一丁目', 'address4' => '3-61'],
                                  ['name' => '札幌ドーム', 'zip' => '0628655',
                                  'address1' => '北海道', 'address2' => '札幌市',
                                  'address3' => '豊平区', 'address4' => '羊ヶ丘一番地'],
                                  ['name' => '横浜国際総合競技場', 'zip' => '2223306',
                                  'address1' => '神奈川県', 'address2' => '横浜市',
                                  'address3' => '港北区', 'address4' => '小机町3300'],
                                  ['name' => '埼玉スタジアム2002', 'zip' => '3360967',
                                  'address1' => '埼玉県', 'address2' => 'さいたま市',
                                  'address3' => '美園', 'address4' => '2-1'],
                                  ['name' => '国立代々木競技場', 'zip' => '1500041',
                                  'address1' => '東京都', 'address2' => '渋谷区',
                                  'address3' => '神南', 'address4' => '2-1-1'],

                                  ]);


    }
}
