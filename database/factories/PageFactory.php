<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Page;
use App\Models\Route;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'url' => '/' . $faker->word,
        'status' => 1,
        'title' => $faker->word,
        'description' => $faker->sentence,
        'classes' => $faker->text(50),
        'styles' => json_encode([
            'structure' => []
        ]),
        'meta_tags' => json_encode([
            'keywords' => 'example',
            'charset' => 'UTF-8',
        ]),
    ];
});
