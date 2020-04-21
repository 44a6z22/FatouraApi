<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Facture;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Facture::class, function (Faker $faker) {
    return [
        //
        "status_id" => $faker->numberBetween(1, 3),
        "client_id" => $faker->numberBetween(1, 10),
        "user_id" => $faker->numberBetween(1, 10),
        "societe_id" => null,
        "text_document_id" => factory(App\Text_Document::class)
    ];
});
