<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $name = $faker->word;
    $slug = str_slug($name);
    return [
        'name' => $name,
        'slug' => $slug,
    ];
});