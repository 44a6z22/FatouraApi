<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Type_article;
use Faker\Generator as Faker;

$factory->define(Type_article::class, function (Faker $faker) {
    return [
        "article_type_value" => $faker->word,
        "article_type_value_eng" => $faker->word
    ];
});
