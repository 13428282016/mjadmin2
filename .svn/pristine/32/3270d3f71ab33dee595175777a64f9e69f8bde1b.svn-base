<?php
/**
 * Created by PhpStorm.
 * User: wmj
 * Date: 2016/1/6
 * Time: 17:32
 */

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class Access {


    public  function can($controller,$action){

        if(!Auth::check())
        {
            return false;
        }

        return Auth::user()->hasAuthority($controller,$action);

    }
}