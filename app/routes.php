<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('/',['uses'=>'IndexController@index']);
Route::any('test',['uses'=>'TestController@test']);

Route::any('maintenance',function(){
	return View::make('index.maintenance');
});

//微信
Route::group(['prefix'=>'wx'],function(){
    Route::any('create_menu',['as'=>'wx.menu','uses'=>'WxController@create_menu']);
    Route::any('get_code',['as'=>'wx.get_code','uses'=>'WxController@get_code']);
    Route::any('get_userlist',['as'=>'wx.get_userlist','uses'=>'WxController@get_userlist']);
    Route::any('get_userinfo',['as'=>'wx.get_userinfo','uses'=>'WxController@get_userinfo']);
    Route::any('get_snsapi_token',['as'=>'wx.get_snsapi_token','uses'=>'WxController@get_snsapi_token']);
});