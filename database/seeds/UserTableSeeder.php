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
      $users = new User(['first_name' => '田中', 'last_name' => '太郎', 'email' => 'test1@test.test',
                         'password' => Hash::make("111111"), 'zip' => 1111111,
                         'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                         'address4' => 'アドレス４',
                         'favorite_game_type_id' => 2, 'favorite_team_id' => 3]);
      $users->save();
      $users = new User(['first_name' => '山田', 'last_name' => '花子', 'email' => 'test2@test.test',
                         'password' => Hash::make("111111"), 'zip' => 1111111,
                         'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                         'address4' => 'アドレス４',
                         'favorite_game_type_id' => 2, 'favorite_team_id' => 3]);
      $users->save();
      $users = new User(['first_name' => 'アレックス', 'last_name' => 'ジョン', 'email' => 'test3@test.test',
                         'password' => Hash::make("111111"), 'zip' => 1111111,
                         'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                         'address4' => 'アドレス４',
                         'favorite_game_type_id' => 2, 'favorite_team_id' => 3]);
      $users->save();
      $users = new User(['first_name' => 'ジョージ', 'last_name' => 'ルイス', 'email' => 'test4@test.test',
                         'password' => Hash::make("111111"), 'zip' => 1111111,
                         'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                         'address4' => 'アドレス４',
                         'favorite_game_type_id' => 2, 'favorite_team_id' => 3]);
      $users->save();
      $users = new User(['first_name' => '張', 'last_name' => '爹洲', 'email' => 'test5@test.test',
                         'password' => Hash::make("111111"), 'zip' => 1111111,
                         'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
                         'address4' => 'アドレス４',
                         'favorite_game_type_id' => 2, 'favorite_team_id' => 3]);
      $users->save();

    }
}
