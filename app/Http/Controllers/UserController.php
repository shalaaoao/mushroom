<?php

namespace App\Http\Controllers;

use App\Bll\UserBll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function login()
    {
        return View::make('auth.login');
    }

    public function doLogin()
    {
        $phone = Input::get('phone');
        $pwd   = Input::get('pwd');

        if (Auth::attempt(['phone' => $phone, 'password' => $pwd])) {
            $role     = Auth::User()->role;
            $back_url = UserBll::getUserRedirectUri($role);

            return Redirect::to($back_url);
        } else {
            Session::flash('alert', '密码错误');
            return Redirect::to(Route('user.login'));
        }
    }
}
