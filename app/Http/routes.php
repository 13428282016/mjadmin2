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
Route::group(['middleware' => ['web'], "domain" => "mj.kankan.com"], function () {

    Route::get('/password/{password}', function ($password) {


        return bcrypt($password);
    });

    Route::get('/phpinfo', function () {
        phpinfo();
    });

    Route::get('/test/service',function(){

        var_dump(Authority::canAccess('ad','ds'));

    });
    Route::get('/test/middleware',function(){

             echo "test/middleware";
    })->middleware(['authority']);
    Route::get('/test/{id}', function ($id) {
        $admin = \App\Admin::findOrFail($id);

        var_dump($admin->hasAuthority('User', 'create'));
        var_dump($admin->hasAuthority('xc', 'showcc'));
        var_dump(session('authorities'));
        return $admin->authorities();


    });


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


Route::group(['middleware' => ['web'], "domain" => "admin.mj.kankan.com", 'namespace' => 'Admin', 'as' => 'admin::'], function () {
    //
    //

    Route::group(['middleware' => ['auth','access']], function () {

        Route::group(['prefix' => 'auth'], function () {

            Route::get('logout', 'AuthController@getLogout');
        });


        Route::group(['prefix' => 'user'], function () {


            Route::get('profile', 'UserController@getProfile');


        });
        Route::resource('user', 'UserController');

        Route::group(['prefix' => 'password'], function () {

            Route::get('reset', 'PasswordController@getReset');
            Route::post('reset', 'PasswordController@postReset');

        });

        Route::get('/', 'HomeController@getIndex');

    });

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', 'AuthController@getLogin');
        Route::post('login', 'AuthController@postLogin');
    });


});
