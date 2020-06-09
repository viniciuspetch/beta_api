<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Creator;
use Faker\Generator as Faker;

$factory->define(Creator::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
