<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Type_article;
use Faker\Generator as Faker;

$factory->define(Type_article::class, function (Faker $faker) {
    return [
        "user_id" => $faker->randomElement([null, 1, 2, 3, 4, 5, 6, 6]),
        "article_type_value" => $faker->word,
        "article_type_value_eng" => $faker->word
    ];
});
