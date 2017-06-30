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

Route::group(['before' => 'xhprof_before', 'after' => 'xhprof_after'], function() {

	Route::any('/', ['as' => '/', 'uses' => 'IndexController@index']);

	Route::group(['prefix' => 'panzi'], function () {

		Route::group(['before' => ['auth', 'panzi']], function () {
			Route::any('alert', ['as' => 'index.alert', 'uses' => 'IndexController@alert']);
			Route::any('alert_ajax_pwd', ['as' => 'index.alert_ajax_pwd', 'uses' => 'IndexController@alert_ajax_pwd']);
			Route::any('wall', ['as' => 'index.wall', 'uses' => 'IndexController@wall']);
			Route::any('summer_death', ['as' => 'index.summer_death', 'uses' => 'IndexController@summer_death']);
			Route::any('movie', ['as' => 'index.movie', 'uses' => 'IndexController@movie']);
			Route::any('love_circle', ['as' => 'index.love_circle', 'uses' => 'IndexController@love_circle']);
		});
	});

	Route::any('/user/login', ['as' => 'user.login', 'uses' => 'UserController@login']);
	Route::any('/user/do_login', ['as' => 'user.do_login', 'uses' => 'UserController@do_login']);



	Route::any('maintenance', function () {
		return View::make('index.maintenance');
	});

});

Route::any('test', ['uses' => 'TestController@test']);
