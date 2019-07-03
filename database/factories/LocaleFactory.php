<?php

use App\Models\Locale;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var $factory Factory */
$factory->define(Locale::class, function (Faker $faker) {
    return [
        'language' => $faker->unique()->word,
        'code' => $faker->unique()->locale
    ];
});
