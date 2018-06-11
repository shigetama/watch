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
      'first_name' => $faker->lastName,
      'last_name' => $faker->firstName,
      'email' => $faker->unique()->safeEmail,
      'zip' => '0520316',
      'address1' => $faker->city,
      'address2' => $faker->city,
      'address3' => $faker->streetName,
      'address4' => $faker->buildingNumber,
      'favorite_game_type_id' => App\Gametype::get()->random()->id,
      'favorite_team_id' => App\Team::get()->random()->id,
      'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
      'remember_token' => str_random(10),
    ];
});
