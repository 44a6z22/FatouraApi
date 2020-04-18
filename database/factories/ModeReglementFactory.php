<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mode_reglement;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Mode_reglement::class, function (Faker $faker) {
    return [
        //
        'mode_value' => $faker->name
    ];
});
