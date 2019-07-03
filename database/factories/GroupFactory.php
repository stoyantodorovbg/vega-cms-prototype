<?php

use App\Models\Group;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var $factory Factory */
$factory->define(Group::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'status' => 1,
        'description' => $faker->sentence,
    ];
});
