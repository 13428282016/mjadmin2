<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class PasswordController extends Controller
{
    //

    public  function  __construct(){


        $this->admin=Auth::user();
    }

    public function  getReset(){

        return view('admin.password.get_reset');

    }


    public  function postReset(Requests\PassswordReset $request){

        $oldPassword=$request->input('old_password');

        if(!Hash::check($oldPassword, $this->admin->password))
        {
            return  back()->with('errors',new MessageBag(['old_password'=>'原密码错误']));;
        }
        $this->admin->password=bcrypt($request->input('password'));
        if($this->admin->save())
        {
            return redirect('auth/logout');
        }
        return back();
    }



}
