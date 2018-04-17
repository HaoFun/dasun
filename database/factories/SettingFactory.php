<?php

use Faker\Generator as Faker;

$factory->define(\App\Setting::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'config_name'    => 'Dasun',
        'config_phone'   => $faker->phoneNumber,
        'config_address' => $faker->address,
        'config_fax'     => $faker->phoneNumber,
        'config_email'   => $faker->safeEmail,
        'config_house'   => $faker->phoneNumber,
        'description'    => 'Dasun',
        'keywords'       => 'Dasun',
        'created_at'     => $created_at,
        'updated_at'     => $updated_at
    ];
});
