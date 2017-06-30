<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function ($request) {
    //
});


App::after(function ($request, $response) {
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function () {

    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            $back_url = urlencode(Request::getUri());
            return Redirect::to(action('user.login') . '?back_url=' . $back_url);
        }
    }
});


Route::filter('auth.basic', function () {
    return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function () {
    if (Auth::check()) {
        return Redirect::to('/');
    }
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function () {
    if (Session::token() !== Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});


Route::filter('panzi', function () {
    $role = Auth::User()->role;
    if ($role != ROLE_SUPER && $role != ROLE_PANZI) {
        return Redirect::action('/');
    }
});

Route::filter('xhprof_before', function () {
    xhprof_enable();
});

Route::filter('xhprof_after', function () {
    $xhprof_data = xhprof_disable();

    include_once "./xhprof_lib/utils/xhprof_lib.php";
    include_once "./xhprof_lib/utils/xhprof_runs.php";

    //$xhprof_runs = new XHProfRuns_Default();

    //$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_foo");

    $all_time = 0;
    foreach($xhprof_data as $v){
        $all_time += ($v['wt'] * $v['ct']);
    }

    //访问时间


    Test::create(['str' => Request::getUri(), 'num' => $all_time]);

    //echo "<a href='/xhprof_html/index.php?run=".$run_id."&source=xhprof_foo'>view</a>";
});