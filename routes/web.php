<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Goutte\Client;
use Carbon\Carbon;
Route::get('/',function (){
    $type = [
        '393' => '最新消息',
        '394' => '最新公告',
        '395' => '最新宣導',
        '396' => '最新活動'
    ];
    $news_url_pluck =  \App\News::all()->pluck('from_rul')->toArray();
    foreach ($type as $key => $type_name)
    {
        $client = new Client();
        $crawler = $client->request('GET',"https://hmv.thb.gov.tw/WebL.aspx?mid={$key}&type=1");
        $crawler->filter('div[id="article"] > div[id="catalog-content"] > ul > li > div > a')->each(function($node) use($client,$type_name,$news_url_pluck) {
            $from_url = $node->attr('href');
            if($from_url && !in_array($from_url,$news_url_pluck))
            {
                $link = $client->request('GET','https://hmv.thb.gov.tw'.$from_url);
                $article = $link->filter('div[id=article]');
                $title = trim($node->attr('title'));
                preg_match('/\d{3}-\d{2}-\d{2}/',$title,$resultDate);
                $find_date = isset($resultDate[0]) ? substr($resultDate[0],0,3):null;
                $from = $article->filterXPath('div[@id="article"]/div[1]/span/div')->text();
                if($from)
                {
                    $from_explode = explode("　",$from);
                    $data = [
                        'title'      => $title,
                        'type'       => $type_name,
                        'from'       => isset($from_explode) && count($from_explode) === 2 ? $from_explode[0]:null,
                        'from_url'   => $from_url,
                        'from_date ' => isset($from_explode) && count($from_explode) === 2 ? $from_explode[1]:null,
                        'content'    => $article->filterXPath('div[@id="article"]/div[2]')->text(),
                        'publish_at' => isset($find_date) ? str_replace($find_date,(int)$find_date + 1911,$resultDate[0]):Carbon::now()->toDateString()
                    ];
                    dd($data);
                    \Illuminate\Support\Facades\DB::table('news')->insert($data);
                }
            }
        });
    }
});
Auth::routes();
Route::get('/admin/dashboard','Admin\AdminController@index')->name('root');
Route::prefix('admin')->name('admin.')->group(function ($routes){
    $routes->resource('/news','Admin\NewsController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/news/destroy','Admin\NewsController@destroy')->name('news.destroy');
    $routes->resource('/setting','Admin\SettingController',['only' => ['update']]);
    $routes->get('/setting/edit','Admin\SettingController@edit')->name('setting.edit');
    $routes->resource('/banner','Admin\BannerController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/banner/destroy','Admin\BannerController@destroy')->name('banner.destroy');
    $routes->resource('/module','Admin\ModuleController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/module/destroy','Admin\ModuleController@destroy')->name('module.destroy');
});

/* Error Page*/
Route::get('401','ErrorPageController@Error401');
Route::get('402','ErrorPageController@Error402');
Route::get('403','ErrorPageController@Error403');
Route::get('404','ErrorPageController@Error404');
Route::get('405','ErrorPageController@Error405');
Route::get('500','ErrorPageController@Error500');
