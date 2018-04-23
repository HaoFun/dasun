<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servers = [
            [
                'title'   => '汽車檢驗',
                'content' => '特約廠商免費至貴公司取車送車，只收取檢驗規費新台幣肆佰伍拾元整，不另收取任何客外服務費。',
                'order'   => 1,
                'image'   => '/images/CS_ICON_-06.png'
            ],
            [
                'title'   => '汽車保養',
                'content' => '特約廠商免費至貴公司取車送車，只收取檢驗規費新台幣肆佰伍拾元整，不另收取任何客外服務費。',
                'order'   => 2,
                'image'   => '/images/CS_ICON_-07.png'
            ],
            [
                'title'   => '汽車維修',
                'content' => '特約廠商免費至貴公司取車送車，只收取檢驗規費新台幣肆佰伍拾元整，不另收取任何客外服務費。',
                'order'   => 3,
                'image'   => '/images/CS_ICON_-08.png'
            ],
            [
                'title'   => '專業諮詢',
                'content' => '特約廠商免費至貴公司取車送車，只收取檢驗規費新台幣肆佰伍拾元整，不另收取任何客外服務費。',
                'order'   => 4,
                'image'   => '/images/CS_ICON_-09.png'
            ],
        ];
        \App\Service::insert($servers);
    }
}
