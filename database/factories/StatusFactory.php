<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {
    return [
        "status_value" => $faker->randomElement([
            "One", "Two", "Three"
        ])
    ];
});
