<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Vacation;
use Faker\Generator as Faker;

$factory->define(Vacation::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'start' => now(),
        'end' => now()->addDay(3),
    ];
});
