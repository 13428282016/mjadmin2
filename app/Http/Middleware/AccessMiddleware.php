<?php

namespace App\Http\Middleware;



use Closure;


class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        $action = app('request')->route()->getAction();

        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);

        if(!\App\Facades\Access::can(str_replace('Controller', '',$controller),$action))
        {
            abort(404);
        }
        return $next($request);
    }
}
