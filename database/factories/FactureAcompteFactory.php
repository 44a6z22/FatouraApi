<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FactureAcompte;
use Faker\Generator as Faker;

$factory->define(FactureAcompte::class, function (Faker $faker) {
    return [
        //

        "user_id" => $faker->numberBetween(1, 10),
        'devis_id' => $faker->numberBetween(1, 10),
        "montant" => $faker->numberBetween(100, 2000),
        "tva" => $faker->numberBetween(0, 20),
        "text_document_id" =>  $faker->numberBetween(1, 10),
        "reglement_id" =>  $faker->numberBetween(1, 10),
        "status_id" =>  $faker->numberBetween(1, 2),
        "payed_at" => null,

    ];
});
