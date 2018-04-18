<?php

use Faker\Generator as Faker;

$factory->define(\App\Setting::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth;
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'config_name'    => '達盛興汽車有限公司',
        'config_phone'   => '(03)575-3318 / 571-6331',
        'config_address' => '新竹市公道五路二段132號',
        'config_fax'     => '(03)5714393',
        'config_email'   => 'dasun.sin@msa.hinet.net',
        'description'    => '達盛興汽車有限公司',
        'keywords'       => '達盛興汽車有限公司',
        'config_info'    => '達盛興汽車有限公司',
        'config_image'   => '/images/BANNER.jpg',
        'config_image_title' => '/images/SOG-10.png',
        'config_ad_image'    => serialize(['/images/QRcode2.jpg','/images/yesdir-QRcode.jpg']),
        'created_at'     => $created_at,
        'updated_at'     => $updated_at
    ];
});
