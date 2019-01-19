<?php

use Faker\Generator as Faker;

$factory->define(\App\Blog::class, function (Faker $faker) {
    return [
        'name' => $faker->words(rand(2, 6), true),
        'subdomain' => str_slug($faker->company),
    ];
});
