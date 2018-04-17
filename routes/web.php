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

Auth::routes();
Route::get('/','Admin\AdminController@index')->name('root');
Route::prefix('admin')->name('admin.')->group(function ($routes){
    $routes->resource('/news','Admin\NewsController',['only' => ['index','edit','update','create','store']]);
    $routes->delete('/news/destroy','Admin\NewsController@destroy')->name('news.destroy');
    $routes->resource('/setting','Admin\SettingController',['only' => ['edit','update']]);
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
