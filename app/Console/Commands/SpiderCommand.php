<?php

namespace App\Console\Commands;

use App\News;
use Illuminate\Console\Command;
use Goutte\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SpiderCommand extends Command
{
    public $type = [
        '393' => '最新消息',
        '394' => '最新公告',
        '395' => '最新宣導',
        '396' => '最新活動'
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dasun:spider-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '爬蟲抓取監理所資料';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //取當前資料庫中 url 欄位
        $news_url_pluck = News::all()->pluck('from_url')->toArray();
        foreach ($this->type as $key => $type_name)
        {
            $client = new Client();
            $crawler = $client->request('GET',"https://hmv.thb.gov.tw/WebL.aspx?mid={$key}&type=1");
            $crawler->filter('div[id="article"] > div[id="catalog-content"] > ul > li > div > a')->each(function($node) use($client,$type_name,$news_url_pluck) {
                $from_url = $node->attr('href');
                if($from_url && !in_array($from_url,$news_url_pluck))
                {
                    $this->info("開始{$from_url}爬取");
                    $link = $client->request('GET','https://hmv.thb.gov.tw'.$from_url);
                    $article = $link->filter('div[id=article]');
                    $title = trim($node->attr('title'));
                    preg_match('/\d{3}-\d{2}-\d{2}/',$title,$resultDate);
                    $find_date = isset($resultDate[0]) ? substr($resultDate[0],0,3):null;
                    $from = $article->filterXPath('div[@id="article"]/div[1]/span/div')->text();
                    if($from)
                    {
                        $from_explode = explode("　",$from);
                        $now = Carbon::now();
                        $data = [
                            'title'        => $title,
                            'type'         => $type_name,
                            'from'         => isset($from_explode) && count($from_explode) === 2 ? $from_explode[0]:null,
                            'from_url'     => $from_url,
                            'from_publish' => isset($from_explode) && count($from_explode) === 2 ? $from_explode[1]:null,
                            'content'      => $article->filterXPath('div[@id="article"]/div[2]')->html(),
                            'publish_at'   => isset($find_date) ? str_replace($find_date,(int)$find_date + 1911,$resultDate[0]):Carbon::now()->toDateString(),
                            'created_at'   => $now,
                            'updated_at'   => $now
                        ];
                        DB::table('news')->insert($data);
                        $this->info("{$title}爬取成功!");
                    }
                }
                else
                {
                    $this->info("{$from_url}紀錄已存在!");
                }
            });
        }
        $this->info('爬蟲結束!!');
    }
}
