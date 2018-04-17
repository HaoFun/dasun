<?php

use Faker\Generator as Faker;

$factory->define(\App\Banner::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'banner_title' => $faker->sentence,
        'banner_image' => $faker->imageUrl(),
        'created_at'   => $created_at,
        'updated_at'   => $updated_at
    ];
});
