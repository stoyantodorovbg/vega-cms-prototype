<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Menu;
use App\Models\MenuItem;
use Faker\Generator as Faker;

$factory->define(MenuItem::class, function (Faker $faker) {
    return [
        'menu_id' =>
            function() {
                return factory(Menu::class)->create()->id;
            },
        'parent_id' => null,
        'status' => 1,
        'title' => json_encode([
            'text' => $faker->name,
            'status' => 1,
            'classes' => $faker->text(50),
            'styles' => [
                'color' => 'red'
            ]
        ]),
        'description' => json_encode([
            'text' => $faker->text(100),
            'status' => 1,
            'classes' => $faker->text(50),
            'styles' => [
                'color' => 'red'
            ]
        ]),
        'classes' => $faker->text(50),
        'styles' => json_encode([
            'height' => '100px',
            'display' => 'inline-block'
        ]),
    ];
});
