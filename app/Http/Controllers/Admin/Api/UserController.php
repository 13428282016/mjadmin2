<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function  __construct(){


        $this->admin=Auth::user();
    }

    public  function  index(){


    }
}
