<?php

use Illuminate\Database\Seeder;
use App\User;

class LargeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(User::class, 100)->create();
      // $users = new User(['first_name' => '張', 'last_name' => '爹洲', 'email' => 'test5@test.test',
      //                    'password' => Hash::make("111111"), 'zip' => 1111111,
      //                    'address1' => '東京都', 'address2' => 'アドレス２', 'address3' => 'アドレス３',
      //                    'address4' => 'アドレス４',
      //                    'favorite_game_type_id' => 2, 'favorite_team_id' => 3]);
      // $users->save();
    }
}
