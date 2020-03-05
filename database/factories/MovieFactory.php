<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'year' => $faker->year,
    ];
});
