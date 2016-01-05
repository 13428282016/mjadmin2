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
Route::group(['middleware' => ['web'],"domain"=>"mj.kankan.com"],function(){

    Route::get('/password/{password}',function($password){


        return bcrypt($password);
    });

    Route::get('/phpinfo',function(){
        phpinfo();
    });


    Route::get('/test/{id}',function($id){
        $admin=\App\Admin::findOrFail($id);
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




Route::group(['middleware' => ['web'],"domain"=>"admin.mj.kankan.com",'namespace'=>'Admin'], function () {
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
