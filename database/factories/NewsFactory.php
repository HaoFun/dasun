<?php

use Faker\Generator as Faker;

$factory->define(\App\News::class, function (Faker $faker) {
    $type = ['最新消息', '最新公告', '最新宣導', '最新活動'];
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'type'    => $faker->randomElement($type),
        'publish_at' => $updated_at,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
