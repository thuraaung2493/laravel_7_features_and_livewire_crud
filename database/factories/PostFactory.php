<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'name' => $w = $faker->sentence(),
        'slug' => Str::slug($w, '_')
    ];
});
