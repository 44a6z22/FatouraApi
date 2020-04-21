<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        "user_id" => $faker->numberBetween(1, 10),
        "societe_id" => null,
        "Client_Nom" => $faker->name,
        "Client_Prenom" => $faker->safeEmail,
        "Client_Code_Postal" => $faker->numberBetween(10009, 2992929),
        "Client_Pays" => $faker->country,
        "Client_Ville" => $faker->city,
        "Client_SiteInternet" => "Http://www." . $faker->word . ".com",
        "Client_Note" => $faker->sentence,
        "Client_Fonction" => $faker->word
    ];
});
