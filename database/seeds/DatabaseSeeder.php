<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->call(UserSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(NewsSeeder::class);
        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
