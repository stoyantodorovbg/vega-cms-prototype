<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\DefaultJsonStructure;
use Illuminate\Database\Eloquent\Factory;

/* @var $factory Factory */
$factory->define(DefaultJsonStructure::class, function (Faker $faker) {
    return [
        'model' => Str::studly($faker->word . '-' . $faker->word),
        'field' => $faker->word,
        'structure' => json_encode([
            'text' => 'some text',
            'status' => 1,
            'data' => [
                'someKey' => 'someValue',
            ]
        ])
    ];
});
