<?php
namespace App\Providers;

use App\Admin;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(Admin $user)
    {
        // 使用类来指定视图组件

        View::composer('', 'App\Http\ViewComposers\ProfileComposer');

        // 使用闭包来指定视图组件
        View::composer('admin.layout.main', function($view) use ($user)
        {
            $view->with('user', $user);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}