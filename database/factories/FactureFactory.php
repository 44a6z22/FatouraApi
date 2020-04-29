<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Facture;
use App\Model;
use Faker\Generator as Faker;
use App\lib\NumerotationConverter;

$factory->define(Facture::class, function (Faker $faker) {
    $converter = new NumerotationConverter;

    return [
        //
        "status_id" => $faker->numberBetween(1, 3),
        "client_id" => $faker->numberBetween(1, 10),
        "user_id" => $faker->numberBetween(1, 10),
        "societe_id" => null,
        "facture_type_id" => $faker->numberBetween(1, 2),
        "text_document_id" => factory(App\Text_Document::class),
        "uid" =>  $converter->convert("<doc><aa><cmp>", $faker->randomElement(["App\Facture"]), $faker->unique()->randomDigit),
        "total_ht" => $faker->randomDigit(),
        "total_ttc" => $faker->randomDigit(),
        "montant_tva" => $faker->randomDigit()
    ];
});
