<?php

namespace App\Http\Middleware;

use App\Enum\UserEnum;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PanziWebMiddleware
{
    /**
     * 处理传入的请求
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = Auth::User()->role;
        if ($role == UserEnum::ROLE_SUPER || $role == UserEnum::ROLE_PANZI) {
            return $next($request);
        } else {
            return Redirect::back(Route('index'));
        }


    }
}