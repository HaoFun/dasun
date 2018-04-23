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
        $users = factory(\App\User::class)->times(2)->make();
        $user_array = $users->makeVisible(['password','remember_token'])->toArray();
        \App\User::insert($user_array);

        $user = \App\User::find(1);
        $user->name = 'admin';
        $user->email = 'admin@exsample.com';
        $user->save();

        $user = \App\User::find(2);
        $user->name = 'guest';
        $user->email = 'guest@exsample.com';
        $user->save();
    }
}
