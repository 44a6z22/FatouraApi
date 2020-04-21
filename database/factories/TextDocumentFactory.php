<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Text_Document;
use Faker\Generator as Faker;

$factory->define(Text_Document::class, function (Faker $faker) {
    return [
        //

        "Introduction" => $faker->sentence,
        "Conclusion" => $faker->sentence,
        "Pied_page" => $faker->sentence,
        "condition_general" => $faker->sentence,

    ];
});
