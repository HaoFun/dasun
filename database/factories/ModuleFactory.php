<?php

use Faker\Generator as Faker;

$factory->define(\App\Module::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'module_name' => $faker->sentence,
        'module_url'  => str_replace(['https://','http://'],'',$faker->url),
        'module_content' => $faker->text,
        'module_order' => rand(1,20),
        'created_at'   => $created_at,
        'updated_at'   => $updated_at
    ];
});
