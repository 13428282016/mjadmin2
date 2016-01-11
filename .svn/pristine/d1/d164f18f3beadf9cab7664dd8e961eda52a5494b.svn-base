<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //


    public function __construct()
    {

        $this->admin = Auth::user();

    }

    public function  index()
    {

        return Admin::all();

    }

    public function  getProfile()
    {

        return view('admin.user.show');
    }

    public function getEdit()
    {

        return view('admin.user.self_edit');
    }

    public function  postEdit(Requests\UserPostEdit $request)
    {

        $inputs = $request->only(['cellphone', 'email']);
        $inputs['cellphone'] && $this->admin->cellphone = $inputs['cellphone'];
        $inputs['email'] && $this->admin->email = $inputs['email'];
        if ($this->admin->save()) {
            return redirect('user/profile');
        }
        return back()->withInput();


    }

    public function  show($id)
    {
        return Admin::findOrFail($id);
    }

    public function  edit($id)
    {
        return Admin::findOrFail($id);
    }

    public function  update($id)
    {

        return Admin::findOrFail($id);
    }

    public function  store(Requests\UserStore $request)
    {

        $inputs = $request->only(['name', 'cellphone', 'email', 'avatar', 'roles','username']);
        $admin = new Admin();
        $admin->name = $inputs['name'];
        $admin->password=bcrypt('123456');
        $inputs['cellphone'] && $admin->cellphone = $inputs['cellphone'];
        $inputs['email'] && $admin->email = $inputs['email'];
        $inputs['avatar'] && $admin->avatar = parse_url($inputs['avatar'])['path'];
        $admin->username=$inputs['username'];


        DB::transaction(function () use($admin,$inputs){



                $admin->save();
                $admin->roles()->attach($inputs['roles']);


        });

        return redirect('user');




    }


    public function create()
    {
        return view('admin.user.create');
    }

    public function destroy($id)
    {
        return Admin::findOrFail($id);
    }
}
