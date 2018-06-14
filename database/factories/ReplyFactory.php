<?php
use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'content'   => $faker->realText(random_int(50, 250)),
    ];
});