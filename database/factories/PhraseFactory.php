<?php

/* @var $factory Factory */

use App\Models\Phrase;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Phrase::class, function (Faker $faker) {
    return [
        'system_name' => $faker->unique()->word,
        'text' => [
            'en' => $faker->word,
            'bg' => $faker->word,
            'structure' => [
                'en' => '',
                'bg' => ''
            ]
        ],
    ];
});
