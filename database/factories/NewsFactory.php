<?php

use Faker\Generator as Faker;

$factory->define(\App\News::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'publish_at' => $updated_at,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
