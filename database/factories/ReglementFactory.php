<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Reglement;
use Faker\Generator as Faker;

$factory->define(Reglement::class, function (Faker $faker) {
    return [
        //
        'mode_reglement_id' => $faker->numberBetween(1, 10),
        'condition_reglement_id' => $faker->numberBetween(1, 10),
        'interet_retard_id' => $faker->numberBetween(1, 10),
        'compte_bancaire_id' => null,
        'facture_id' => $faker->numberBetween(1, 10),
        'devis_id' => null,
    ];
});
