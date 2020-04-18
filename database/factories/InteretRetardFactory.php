<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Interet_retard;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Interet_retard::class, function (Faker $faker) {
    return [
        //
        'inter_value' => $faker->randomDigit
    ];
});
