@extends('admin.layout.main')

@section('content')
    <style>

        #user_create_container .row label {
            text-align: right;
        }



        #roles input,#roles label
        {
            vertical-align: middle;
            cursor: pointer;
        }

    </style>
    <section class="content-header">
        <h1>
            {{--{{' '}}--}}
            <small></small>
            {{--用户中心--}}
            {{--<small> 个人信息</small>--}}

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 用户管理</a></li>
            <li class="active">添加用户</li>
        </ol>
    </section>

    <!-- Main content -->
    <section id="user_create_container" class="content">

        @if (count($errors) > 0)
                <!-- Form Error List -->
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="/user " class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">账号：</label>

                <div class="col-sm-10 col-md-3 ">
                    <input type="text" class="form-control" name="username" id="username" placeholder="输入账号" value="{{old('username')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">姓名：</label>

                <div class="col-sm-10 col-md-3 ">
                    <input type="text" class="form-control" name="name" id="name" placeholder="输入真实姓名" value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="avatar" class="col-sm-2 control-label">头像：</label>

                <div class="col-sm-10 col-md-3 ">
                    <img width="80" height="80" style="display: none" class="img-circle" alt="User Image">
                    <input type="hidden" name="avatar">
                    <button type="submit" class="btn btn-success  file-hidden-cover">
                        <i class="fa fa-upload"></i> 上传(可选)
                        <input class="file-hidden" type="file" id="avatar_file">
                    </button>

                </div>
            </div>
            <div class="form-group">
                <label for="cellphone" class="col-sm-2 control-label">角色：</label>

                <div class="col-sm-10 col-md-3" id="roles">
                    <ul style="max-height: 300px;overflow-y:auto;" class="list-group">
                    @foreach(\App\Role::all() as $key=> $role)

                      <li class="list-group-item list-group-item-warning">

                                      <input type="checkbox"  value="{{$role->id}}" id="checkbox_{{$key}}" name="roles[]">&nbsp;&nbsp;<label for="checkbox_{{$key}}" class="label  bg-green"> {{$role->name}}</label>

                      </li>



                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="form-group">
                <label for="cellphone" class="col-sm-2 control-label">手机：</label>

                <div class="col-sm-10 col-md-3 ">
                    <input type="text" class="form-control" name="cellphone" id="cellphone" placeholder="输入手机号码(可选)" value="{{old('cellphone')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱： </label>

                <div class="col-sm-10 col-md-3 ">
                    <input type="email" class="form-control" name="email" id="email" placeholder="输入电子邮箱(可选)"  value="{{old('email')}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> 保存
                    </button>
                </div>
            </div>
        </form>

    </section><!-- /.content -->

@endsection