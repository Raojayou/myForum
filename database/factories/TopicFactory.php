<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {

    $title = rtrim($faker->realText(random_int(25, 50)), '.');
    $slug = str_slug($title);

    /**
     * Datos que rellena el faker.
     */
    return [
        'title' => $title,
        'slug' => $slug,
        'category' => $faker->word,
        'content' => $faker->realText(random_int(1, 500))
    ];
});
