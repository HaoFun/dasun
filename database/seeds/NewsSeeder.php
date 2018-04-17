<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = factory(\App\News::class)->times(30)->make();
        \App\News::insert($news->toArray());
    }
}
