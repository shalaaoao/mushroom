<?php

namespace App\Http\Middleware;

use App\Enum\UserEnum;
use App\Model\RequestLog;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class RequestLogMiddleware
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
        $ip = Request::getClientIp();
        $uri = Route::currentRouteName();

        $user = Auth::User();
        if (!$user) {
            $role = UserEnum::ROLE_COMMON;
        } else {
            $role = $user->role;
        }

        RequestLog::create(['uri' => $uri, 'ip' => $ip, 'role' => $role]);

        return $next($request);

    }
}