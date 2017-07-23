<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class TestController extends Controller
{
    public function test()
    {
        $role = Auth::User();

        dd($role);
    }

    public function test2()
    {
        echo 444;
    }
}