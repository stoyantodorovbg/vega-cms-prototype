<?php

use App\Models\Route;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var $factory Factory */
$factory->define(Route::class, function (Faker $faker) {
    $uniqueWord = $faker->unique()->word;

    return [
        'url' => '/' . $uniqueWord . '/' . $uniqueWord,
        'method' => 'get',
        'action' => 'Front\\' . ucfirst($uniqueWord) . 'Controller@' . $method = $uniqueWord,
        'name' => $uniqueWord . '-' . $uniqueWord . '.' . $method,
    ];
});
