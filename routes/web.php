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

//Auth::routes();


Route::group(['middleware' => ['request_log']], function () {
    Route::any('/', ['as' => 'index', 'uses' => 'HomeController@index']);

    Route::get('/user/login', ['as' => 'user.login', 'uses' => 'UserController@login']);
    Route::any('/user/do_login', ['as' => 'user.do_login', 'uses' => 'UserController@doLogin']);

    Route::group(['prefix' => 'panzi', 'middleware' => ['auth', 'panzi_web']], function () {
        Route::any('alert', ['as' => 'panzi.alert', 'uses' => 'Love\PanziController@alert']);
        Route::any('alert_ajax_pwd', ['as' => 'panzi.alert_ajax_pwd', 'uses' => 'Love\PanziController@alert_ajax_pwd']);
        Route::any('wall', ['as' => 'panzi.wall', 'uses' => 'Love\PanziController@wall']);
        Route::any('summer_death', ['as' => 'panzi.summer_death', 'uses' => 'Love\PanziController@summer_death']);
        Route::any('movie', ['as' => 'panzi.movie', 'uses' => 'Love\PanziController@movie']);
        Route::any('love_circle', ['as' => 'panzi.love_circle', 'uses' => 'Love\PanziController@love_circle']);
    });
});
Route::get('test', ['as' => 'test', 'uses' => 'Test\TestController@test']);
