<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //

    public  function  getIndex(){

        $user=Auth::user();

        return view('admin.index',['user'=>$user]);

    }
}
