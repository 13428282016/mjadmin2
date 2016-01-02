<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/password/{password}',function($password){


    return bcrypt($password);
});

Route::get('/phpinfo',function(){
  phpinfo();
});


Route::get('/test
',function(){
    var_dump(config('menu'));
    return view('menu');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/




Route::group(['middleware' => ['web']], function () {
    //
    //
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::group(['middleware'=>['auth']],function(){

        Route::get('/','HomeController@getIndex' );

    });
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::post('auth/register', 'Auth\AuthController@postRegister');


});
