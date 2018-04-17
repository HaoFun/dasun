<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = factory(\App\Setting::class)->make();
        \App\Setting::insert($setting->toArray());
    }
}
