<?php

use Faker\Generator as Faker;

$factory->define(App\Page::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'text' => $faker->paragraph($faker->numberBetween(50, 250)),

        'published_at' => $faker->dateTimeThisYear,

        'author_id' => \App\User::inRandomOrder()->first()->id,
    ];
});

$factory->state(\App\Page::class, 'published', function (Faker $faker) {
    return [
        'published_at' => now()->addDays($faker->numberBetween(-100, 0)),
    ];
});
