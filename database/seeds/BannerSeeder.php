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
        $banners = factory(\App\Banner::class)->times(30)->make();
        \App\Banner::insert($banners->toArray());
    }
}
