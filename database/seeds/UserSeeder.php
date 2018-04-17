<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\User::class)->times(3)->make();
        $user_array = $users->makeVisible(['password','remember_token'])->toArray();
        \App\User::insert($user_array);

        $user = \App\User::find(1);
        $user->name = 'Hao';
        $user->save();
    }
}
