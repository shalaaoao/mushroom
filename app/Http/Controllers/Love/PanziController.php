<?php

namespace App\Http\Controllers\Love;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class PanziController extends Controller
{
    public function alert()
    {
        return View::make('love.panzi.alert');
    }

    public function alert_ajax_pwd()
    {
        $pwd = Input::get('pwd');
        SendMail::send_password($pwd);
    }

    public function wall()
    {
        return View::make('love.panzi.wall');
    }

    public function summer_death()
    {
        return View::make('love.panzi.summer_death');
    }

    public function movie()
    {
        return View::make('love.panzi.movie');
    }

    public function love_circle()
    {
        return View::make('love.panzi.love_circle');

    }
}