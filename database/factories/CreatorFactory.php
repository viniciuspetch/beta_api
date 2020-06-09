<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Creator;
use Faker\Generator as Faker;

$factory->define(Creator::class, function (Faker $faker) {
    $fn = $faker->firstName;
    $mn = $faker->firstName;
    $ln = $faker->lastName;
    return [
        'first_name' => $fn,
        'middle_name' => $mn,
        'last_name' => $ln,
        'full_name' => $fn . " " . $mn . " " . $ln,
        'url' => $faker->url,
    ];
});
