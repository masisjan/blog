<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
            'title' => $faker->title,
            'text' => $faker->text,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
    ];
});
