@extends('admin.layout.main')

@section('content')
    <style>
        .user-profile
        {
            padding-top: 40px;;
        }
        .user-profile .row label{
            text-align: right;;
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
            <li><a href="#"><i class="fa fa-dashboard"></i>   用户中心</a></li>
            <li class="active">个人信息</li>
        </ol>
    </section>

    <!-- Main content -->
    <section  class="content">

        <form method="post" action="/user/update"  class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="cellphone" class="col-sm-2 control-label">手机：</label>
                <div class="col-sm-10 col-md-3 ">
                    <input type="text" class="form-control" id="cellphone" placeholder="输入手机号码" value="{{$user->cellphone}}">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱： </label>
                <div class="col-sm-10 col-md-3 ">
                    <input type="email" class="form-control" id="email" placeholder="输入电子邮箱" value="{{$user->email}}" >
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