<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Container;
use Faker\Generator as Faker;

$factory->define(Container::class, function (Faker $faker) {
    return [
        'status' => 1,
        'semantic_tag' => 'body',
        'row_position' => 2,
        'col_width' => 8,
        'col_position' => 1,
        'row_classes' => $faker->text(50),
        'classes' => $faker->text(50),
        'title' => json_encode([
            'text' => $faker->word,
            'status' => 1,
            'row_classes' => $faker->text(50),
            'classes' => $faker->text(50),
            'styles' => [
                'color' => 'red'
            ],
            'structure' => [
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => []
            ]
        ]),
        'summary' => json_encode([
            'text' => $faker->sentences(2),
            'status' => 1,
            'row_classes' => $faker->text(50),
            'classes' => $faker->text(50),
            'styles' => [
                'color' => 'red'
            ],
            'structure' => [
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => []
            ]
        ]),
        'body' => json_encode([
            'text' => $faker->sentences(10),
            'status' => 1,
            'row_classes' => $faker->text(50),
            'classes' => $faker->text(50),
            'styles' => [
                'color' => 'red'
            ],
            'structure' => [
                'text' => '',
                'status' => 0,
                'row_classes' => '',
                'classes' => '',
                'styles' => []
            ]
        ]),
        'styles' => json_encode([
            'structure' => []
        ]),
    ];
});
