<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = factory(\App\Banner::class)->times(10)->make()->each(function ($banner,$index) {
            $banner->module_id = $index + 1;
        });
        \App\Banner::insert($banners->toArray());
    }
}
