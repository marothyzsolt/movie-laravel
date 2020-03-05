<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Rating::class, function (Faker $faker) {
    $movies = \App\Movie::pluck('id')->toArray();

    return [
        'movie_id' => $faker->randomElement($movies),
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'acting' => $faker->numberBetween(1, 10),
        'visual' => $faker->numberBetween(1, 10),
        'story' => $faker->numberBetween(1, 10),
        'fun' => $faker->numberBetween(1, 10),
        'logics' => $faker->numberBetween(1, 10),
        'fin' => $faker->numberBetween(1, 10),
    ];
});
