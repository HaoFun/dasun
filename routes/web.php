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

/* Frontend Routes */
Route::get('/','AppController@home')->name('home');

Route::prefix('tw')->name('tw.')->group(function ($routes){
    $routes->get('/','AppController@index')->name('home');
    $routes->get('/qa','AppController@QA')->name('QA');
    $routes->get('/news','AppController@News')->name('news');
    $routes->get('/news/{news}','AppController@News_content')->name('news_content');
    $routes->get('/cartest','AppController@CarTest')->name('cartest');
});

Auth::routes();
/* Backend Routes */
Route::get('/admin/dashboard','Admin\AdminController@index')->name('root');
Route::prefix('admin')->name('admin.')->group(function ($routes){
    $routes->get('/','Admin\AdminController@toDashboard')->name('dashboard');
    $routes->resource('/news','Admin\NewsController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/news/destroy','Admin\NewsController@destroy')->name('news.destroy');
    $routes->resource('/setting','Admin\SettingController',['only' => ['update']]);
    $routes->get('/setting/edit','Admin\SettingController@edit')->name('setting.edit');
    $routes->resource('/banner','Admin\BannerController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/banner/destroy','Admin\BannerController@destroy')->name('banner.destroy');
    $routes->resource('/module','Admin\ModuleController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/module/destroy','Admin\ModuleController@destroy')->name('module.destroy');
    $routes->resource('/user','Admin\UsersController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/user/destroy','Admin\UsersController@destroy')->name('user.destroy');
    $routes->resource('/question','Admin\QuestionController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/question/destroy','Admin\QuestionController@destroy')->name('question.destroy');
    $routes->resource('/service','Admin\ServiceController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/service/destroy','Admin\ServiceController@destroy')->name('service.destroy');
    $routes->get('/call_artisan','Admin\AdminController@call_artisan')->name('call_artisan');
    $routes->get('/call_storage','Admin\AdminController@call_storage')->name('call_storage');
});

Route::any('{all}','AppController@AllModule')->where(['all' => '.*']);

/* Error Page*/
Route::get('401','ErrorPageController@Error401');
Route::get('402','ErrorPageController@Error402');
Route::get('403','ErrorPageController@Error403');
Route::get('404','ErrorPageController@Error404');
Route::get('405','ErrorPageController@Error405');
Route::get('500','ErrorPageController@Error500');
