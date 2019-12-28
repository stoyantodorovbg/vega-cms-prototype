<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'title' => json_encode([
            'text' => $faker->name,
            'status' => 1,
            'classes' => $faker->text(50),
            'styles' => [
                'color' => 'red'
            ],
            'structure' => [
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]
        ]),
        'description' => json_encode([
            'text' => $faker->text(100),
            'status' => 1,
            'classes' => $faker->text(50),
            'styles' => [
                'color' => 'red'
            ],
            'structure' => [
                'text' => '',
                'status' => 0,
                'classes' => '',
                'styles' => []
            ]
        ]),
        'status' => 1,
        'classes' => $faker->text(50),
        'styles' => json_encode([
            'height' => '100px',
            'display' => 'inline-block',
            'structure' => []
        ]),
    ];
});
