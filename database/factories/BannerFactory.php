<?php

use Faker\Generator as Faker;

$factory->define(\App\Banner::class, function (Faker $faker) {
    $module_ids = \App\Module::all()->pluck('id')->toArray();
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    $image = [
        'images/BANNER.jpg',
        'images/BANNER02.JPG',
        'images/BANNER03.jpg',
        'images/BANNER04.jpg'
    ];
    return [
        'module_id'    => $faker->randomElement($module_ids),
        'image'        => $faker->randomElement($image),
        'created_at'   => $created_at,
        'updated_at'   => $updated_at
    ];
});
