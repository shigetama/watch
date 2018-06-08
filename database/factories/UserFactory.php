<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
      'first_name' => $faker->name,
      'last_name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'zip' => '0520316',
      'address1' => '北海道 ',
      'address2' => '伊達市 ',
      'address3' => '大滝区 ',
      'address4' => '北湯沢温泉町 ',
      'favorite_game_type_id' => '1',
      'favorite_team_id' => '1',
      'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
      'remember_token' => str_random(10),
    ];
});
