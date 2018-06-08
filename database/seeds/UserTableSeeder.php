<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([['first_name' => '田中', 'last_name' => '太郎', 'email' => 'test1@test.test',
                                   'password' => Hash::make("111111"), 'zip' => '0287555',
                                   'address1' => '岩手県', 'address2' => '八幡平市', 'address3' => '黒澤',
                                   'address4' => '1',
                                   'favorite_game_type_id' => 1, 'favorite_team_id' => 1],
                                   ['first_name' => '山田', 'last_name' => '花子', 'email' => 'test2@test.test',
                                    'password' => Hash::make("111111"), 'zip' => '8831601',
                                    'address1' => '宮崎県', 'address2' => '東臼杵郡', 'address3' => '椎葉村下福良',
                                    'address4' => '2',
                                    'favorite_game_type_id' => 2, 'favorite_team_id' => 2],
                                  ['first_name' => 'アレックス', 'last_name' => 'ジョン', 'email' => 'test3@test.test',
                                   'password' => Hash::make("111111"), 'zip' => '7880038',
                                   'address1' => '高知県', 'address2' => '宿毛市', 'address3' => '二宮',
                                   'address4' => '3',
                                   'favorite_game_type_id' => 3, 'favorite_team_id' => 3]

                                  ]);


    }
}
