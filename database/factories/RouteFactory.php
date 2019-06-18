<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Route;
use Faker\Generator as Faker;

$factory->define(Route::class, function (Faker $faker) {
    $routePrefix = $faker->unique()->word;

    return [
        'url' => '/' . $routePrefix . '/' . $routeSuffix = $faker->unique()->word,
        'method' => 'get',
        'action' => ucfirst($faker->unique()->word) . 'Controller@' . $method = $faker->unique()->word,
        'name' => $routePrefix . '-' . $routeSuffix . '.' . $method,
    ];
});
