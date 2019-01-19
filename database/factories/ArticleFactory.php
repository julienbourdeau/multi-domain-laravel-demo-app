<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraphs(rand(1, 4), true),
        'highlighted' => $faker->boolean(30),
        'published_at' => $faker->boolean(90) ? $faker->dateTime() : null,
    ];
});
