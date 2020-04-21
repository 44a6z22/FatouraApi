<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Compte_bancaire;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Compte_bancaire::class, function (Faker $faker) {
    return [
        //
        "user_id" => $faker->numberBetween(1, 10),
        "IBAN" => $faker->iban,
        "BIC" => $faker->sentence,
        "Titulaire" => $faker->name,
        "Libelle_Du_Compte" => $faker->name
    ];
});
