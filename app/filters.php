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

App::before(function($request) {

    /**
     * A láblévben megjelenő cikkek objektumát hozza létre.
     */
    if (!Request::is('admin') && !Request::is('admin/*')) {
        View::share('articleFooter', \Divide\CMS\Article::orderBy('created_at', 'desc')->take('3')->get(['id','title','author_id','created_at']));
    }

    /**
     * A felhasználó objektumát hozza létre!.
     */
    if ((Request::is('admin') || Request::is('admin/*')) && Sentry::check()) {
        View::share('user', \Divide\CMS\User::find(\Sentry::getUser()->id));
    }


    /* if(Request::path()!='/')
      {
      return Redirect::to('/');
      } */

    /* if( ! Request::secure() && FALSE)
      {
      return Redirect::secure(Request::path());
      } */
});


App::after(function($request, $response) {

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

Route::filter('auth', function() {
    if (Auth::guest())
        return Redirect::guest('login');
});


Route::filter('auth.basic', function() {
    return Auth::basic();
});

/**
 * Sentry filter
 *
 * Checks if the user is logged in
 */
Route::filter('userNotLoggedIn', function() {
    if (!Sentry::check()) {
        return Redirect::route('admin.bejelentkezes');
    }
});

Route::filter('userLoggedIn', function() {
    if (Sentry::check()) {
        return Redirect::route('admin.vezerlopult');
    }
});

/**
 * hasAcces filter (permissions)
 *
 * Check if the user has permission (group/user)
 */
Route::filter('hasAccess', function($route, $request, $value) {
    try {
        $user = Sentry::getUser();

        if (!$user->hasAccess($value)) {
            return Redirect::route('admin.bejelentkezes')->with('error', 'Nincs jogosultságod!');
        }
    } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
        return Redirect::route('admin.bejelentkezes')->with('error', 'A felhasználó nem található!');
    }
});

/**
 * InGroup filter
 *
 * Check if the user belongs to a group
 */
Route::filter('inGroup', function($route, $request, $value) {
    try {
        $user = Sentry::getUser();

        $group = Sentry::findGroupByName($value);

        if (!$user->inGroup($group)) {
            Sentry::logout();
            return Redirect::route('admin.bejelentkezes')->with('error', 'Nincs jogosultságod!');
        }
    } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
        return Redirect::route('admin.bejelentkezes')->with('error', 'A felhasználó nem található!');
    } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
        return Redirect::route('admin.bejelentkezes')->with('error', 'A felhasználói csoport nem található!');
    }
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

Route::filter('guest', function() {
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

Route::filter('csrf', function() {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});


