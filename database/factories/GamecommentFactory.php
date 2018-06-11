<?php

use Faker\Generator as Faker;

$factory->define(App\Gamecomment::class, function (Faker $faker) {
    return [
        'game_id' => App\Game::get()->random()->id,
        'body' => $faker->text,
        'user_id' => App\User::get()->random()->id,
        'photo_id' => rand(1,8),
        'created_at' => $faker->date,
    ];
});
