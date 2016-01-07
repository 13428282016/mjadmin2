<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //


    public function __construct(Admin $admin){

        $this->admin=$admin;

    }
    public  function  index(){

        return Admin::all();

    }

    public  function  getProfile(){

        return view('');
    }
    public  function  show($id)
    {
        return Admin::findOrFail($id);
    }
    public  function  edit($id){
        return Admin::findOrFail($id);
    }
    public  function  update($id){

        return Admin::findOrFail($id);
    }

    public  function  store($id){

        return Admin::findOrFail($id);
    }


    public  function create($id)
    {
        return Admin::findOrFail($id);
    }

    public function destroy($id)
    {
        return Admin::findOrFail($id);
    }
}
