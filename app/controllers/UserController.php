<?php

class UserController extends BaseController
{

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
        $a= 0;
        for($i=1;$i<100000100;$i++){
            $a++;
        }
        echo $a;

//        $back_url = Input::get('back_url', action('/'));
//        return View::make('user.login', compact('back_url'));
    }

    public function do_login()
    {
        $phone    = Input::get('phone');
        $password = Input::get('password');

        $res = [];
        if (Auth::attempt(['phone' => $phone, 'password' => $password], true)) {
//        if ($phone) {
            $res['status'] = 1;
        } else {
            $res['status'] = 0;
        }

        return $res;
    }


}
