<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FactureType;
use Faker\Generator as Faker;

$factory->define(FactureType::class, function (Faker $faker) {
    return [
        //
        "type_name" => $faker->name
    ];
});
