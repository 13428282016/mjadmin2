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
//    Route::get('/test/{id}', function ($id) {
//        $admin = \App\Admin::findOrFail($id);
//
//        var_dump($admin->hasAuthority('User', 'create'));
//        var_dump($admin->hasAuthority('xc', 'showcc'));
//        var_dump(session('authorities'));
//        return $admin->authorities();
//
//
//    });

    Route::get('test/log',function(){
        Log::listen(function($level,$message,$context){
            var_dump($level);
            var_dump($message);
            var_dump($context);
        });
       Log::useFiles(storage_path('logs/custom.log'));
        Log::debug('Files3232',['id'=>32132132,'name'=>'32323']);
        Log::alert('Files32323',['id'=>32132132,'name'=>'32323']);
        Log::critical('Files32323',['id'=>32132132,'name'=>'32323']);
        Log::error("Files32323",['id'=>32132132,'name'=>'32323']);
        Log::warning("Files32323",['id'=>32132132,'name'=>'32323']);
        Log::notice("Files32323",['id'=>32132132,'name'=>'32323']);
        Log::info("Files32323",['id'=>32132132,'name'=>'32323']);

        Log::useDailyFiles(storage_path('logs/daily'),1);
        Log::debug('DailyFiles3232');
        Log::alert('DailyFiles32323');
        Log::critical('DailyFiles32323');
        Log::error("DailyFiles32323");
        Log::warning("DailyFiles32323");
        Log::notice("DailyFiles32323");
        Log::info("DailyFiles32323");

        Log::useSyslog('laravel');
        Log::debug('Syslog3232');
        Log::alert('Syslog32323');
        Log::critical('Syslog32323');
        Log::error("Syslog32323");
        Log::warning("Syslog32323");
        Log::notice("Syslog32323");
        Log::info("Syslog32323");

        Log::useErrorLog();
        Log::debug('ErrorLog3232');
        Log::alert('ErrorLog32323');
        Log::critical('ErrorLog32323');
        Log::error("ErrorLog32323");
        Log::warning("ErrorLog32323");
        Log::notice("ErrorLog32323");
        Log::info("ErrorLog32323");




    });


    Route::get('/test/event',function(){

        Event::fire(new App\Events\Test());
        event(new App\Events\Test());


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

        Route::controller('user', 'UserController');
        Route::resource('user', 'UserController');
        Route::controller('password','PasswordController');
        Route::get('/', 'HomeController@getIndex');

    });

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', 'AuthController@getLogin');
        Route::post('login', 'AuthController@postLogin');
    });


});
