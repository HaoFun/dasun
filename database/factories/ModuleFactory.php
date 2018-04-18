<?php

use Faker\Generator as Faker;

$factory->define(\App\Module::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'name'         => $faker->sentence,
        'url'          => str_replace(['https://','http://'],'',$faker->url),
        'content'      => $faker->text,
        'order'        => rand(1,20),
        'created_at'   => $created_at,
        'updated_at'   => $updated_at
    ];
});
