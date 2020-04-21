<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Societe;
use Faker\Generator as Faker;

$factory->define(Societe::class, function (Faker $faker) {
    return [
        //
        "user_id" => $faker->unique()->numberBetween(1, 10),
        "Societe_identifiant_fiscale" => $faker->word,
        "Societe_identifiant_commun_entreprise" => $faker->word,
        "Societe_Nom" => $faker->word,
        "Societe_Taxe_Professionelle" => $faker->randomDigit,
        "Societe_Pays" => $faker->country,
        "Societe_Note" => $faker->word,
        "Societe_Ville" => $faker->city,
        "Societe_Site_Internet" => "http://www." . $faker->word . ".com"

    ];
});
