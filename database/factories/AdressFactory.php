<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Adress;
use Faker\Generator as Faker;

$factory->define(Adress::class, function (Faker $faker) {
    return [
        //
        "Adress_Value" => $faker->address,
        "client_id" => $faker->numberBetween(1, 10),
        "societe_id" => null
    ];
});
