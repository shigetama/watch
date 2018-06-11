<?php

use Faker\Generator as Faker;
use App\Game;

$factory->define(Game::class, function (Faker $faker) {
    return [
      'title' => $faker->word.$faker->word.$faker->word,
      'game_date' => '2018-'.sprintf("%02d", rand(1,12)).'-'.sprintf("%02d", rand(1,28)),
      'gametype_id' => App\Gametype::get()->random()->id,
      'place_id' => App\Place::get()->random()->id,
      'body' => $faker->text,
      'create_user_id' => App\User::get()->random()->id,
      'home_team_id' => App\Team::get()->random()->id,
      'visitor_team_id' => App\Team::get()->random()->id
    ];
});
