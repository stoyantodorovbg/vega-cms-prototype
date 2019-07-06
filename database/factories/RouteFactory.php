<?php

use App\Models\Route;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var $factory Factory */
$factory->define(Route::class, function (Faker $faker) {
    $routePrefix = $faker->unique()->word;

    return [
        'url' => '/' . $routePrefix . '/' . $routeSuffix = $faker->unique()->word,
        'method' => 'get',
        'action' => 'Front\\' . ucfirst($faker->unique()->word) . 'Controller@' . $method = $faker->unique()->word,
        'name' => $routePrefix . '-' . $routeSuffix . '.' . $method,
    ];
});
