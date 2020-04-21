<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        "role_id" => $faker->numberBetween(1, 2),
        "User_Nom" => $faker->name,
        "User_Email" => $faker->unique()->safeEmail,
        "User_password" => $faker->password,
        "User_Nom_Societe" => $faker->word,
        "User_Identifiant_Fiscale" => $faker->word,
        "User_Identifiant_Commun_Entreprise" => $faker->word,
        "User_Taxe_Professionnele" =>  $faker->numberBetween(1, 29),
        "User_Code_Postal" => $faker->numberBetween(10009, 2992929),
        "User_Ville" => $faker->city,
        "User_Site_Internet" => "www" . $faker->word . ".com"
    ];
});
