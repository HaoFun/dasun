<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = factory(\App\Module::class)->times(20)->make();
        \App\Module::insert($modules->toArray());
    }
}
