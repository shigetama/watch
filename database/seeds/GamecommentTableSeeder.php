<?php

use Illuminate\Database\Seeder;
use App\Gamecomment;
use App\Photo;
use App\User;
use App\Game;

class GamecommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($e = 1; $e < 100; $e++){
        $photo = new Photo();
        $photo->user_id = User::get()->random()->id;
        $photo->path = rand(1,8).'.jpg';
        $photo->save();

        $game = Game::get()->random();
        $gamecomment = new Gamecomment();
        $gamecomment->game_id = $game->id;
        $gamecomment->body = 'テストコメント';
        $gamecomment->user_id = $photo->user_id;
        $gamecomment->photo_id = $photo->id;
        $gamecomment->created_at = $game->game_date;
        $gamecomment->save();
      }


    //   for($e = 1; $e < 13; $e++){
    //     for($i = 0; $i < 500; $i++){
    //       $title = rand(1,100);
    //       $date = rand(1,28);
    //       $date = sprintf("%02d", $date);
    //       $type = rand(1,5);
    //       $place = rand(1,3);
    //       $body = rand();
    //       $user = rand(1,100);
    //       $home = rand(1,3);
    //       $visitor = rand(1,3);
    //
    //       $gamecomment = new Gamecommetn(['title' => 'テストゲーム'.$title,
    //                         'game_date' => '2018-'.sprintf("%02d", $e).'-'.$date,
    //                         'gametype_id' => $type,
    //                         'place_id' => $place,
    //                         'body' => $body,
    //                         'create_user_id' => $user,
    //                         'home_team_id' => $home,
    //                         'visitor_team_id' => $visitor]);
    //       $gamecomment->save();
    //     }
    //   }
    }
}
