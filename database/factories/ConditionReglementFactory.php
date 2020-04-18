<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Condition_reglement;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Condition_reglement::class, function (Faker $faker) {
    return [
        //
        'condition_value' => $faker->name
    ];
});
