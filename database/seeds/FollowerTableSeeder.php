<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Follower;

class FollowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();
        foreach($users as $user){
            if($user->id != 1){
            $follower = new Follower();
            $follower->follow_id = 1;
            $follower->follower_id = $user->id;
            $follower->save();
          }
        }
    }
}
