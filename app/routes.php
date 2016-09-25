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

Route::any('/',['as'=>'/','uses'=>'IndexController@index']);
Route::any('alert',['as'=>'index.alert','uses'=>'IndexController@alert']);
Route::any('alert_ajax_pwd',['as'=>'index.alert_ajax_pwd','uses'=>'IndexController@alert_ajax_pwd']);
Route::any('wall',['as'=>'index.wall','uses'=>'IndexController@wall']);
Route::any('summer_death',['as'=>'index.summer_death','uses'=>'IndexController@summer_death']);
Route::any('movie',['as'=>'index.movie','uses'=>'IndexController@movie']);
Route::any('love_circle',['as'=>'index.love_circle','uses'=>'IndexController@love_circle']);



Route::any('test',['uses'=>'TestController@test']);
