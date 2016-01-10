@extends('admin.layout.main')

@section('content')
    <style>
        .user-profile
        {
            padding-top: 40px;;
        }
        .user-profile .row{
            margin-bottom: 10px;
        }
        .user-profile .row label{
            text-align: right;;
        }
    </style>
    <section class="content-header">
        <h1>
            {{--{{' '}}--}}
            {{--<small></small>--}}
            {{--用户中心--}}
            {{--<small> 个人信息</small>--}}
            <a class="btn" href="/user/edit">
                <i class="fa fa-edit"></i> 编辑
            </a>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>   用户中心</a></li>
        <li class="active">个人信息</li>
        </ol>
    </section>

    <!-- Main content -->
    <section  class="content user-profile">

        <div  class="container-fluid">
            <div class="row">
                <label class="col-xs-4 col-sm-2">姓名：</label>

                <div class="col-xs-8 col-sm-10"><p>{{$user->name}}</p></div>
            </div>
            <div class="row">
                <label class="col-xs-4 col-sm-2">角色：</label>

                <div class="col-xs-8 col-sm-10"><p>
                        @if(in_array($user->username,config('backend.authority.supers')))
                            超级管理员
                        @else
                            @foreach($user->roles as  $role )
                                <small class="label bg-yellow">{{$role->name}}</small> {{' '}}
                            @endforeach
                        @endif
                    </p></div>
            </div>
            <div class="row">
                <label class="col-xs-4 col-sm-2">头像：</label>

                <div class="col-xs-8 col-sm-10"><img width="80" height="80" src="{{images($user->avatar)}}" class="img-circle" alt="User Image"></div>
            </div>
            <div class="row">
                <label class="col-xs-4 col-sm-2">手机：</label>

                <div class="col-xs-8 col-sm-10"><p>{{$user->cellphone?$user->cellphone:'未填写'}}</p></div>
            </div>
            <div class="row">
                <label class="col-xs-4 col-sm-2">邮箱：</label>

                <div class="col-xs-8 col-sm-10"><p>{{$user->email?$user->email:'未填写'}}</p></div>
            </div>
            <div class="row">
                <label class="col-xs-4 col-sm-2">创建时间：</label>

                <div class="col-xs-8 col-sm-10"><p>{{$user->created_at}}</p></div>
            </div>
        </div>

    </section><!-- /.content -->

@endsection