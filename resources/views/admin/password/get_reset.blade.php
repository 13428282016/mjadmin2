@extends('admin.layout.main')

@section('content')
    <style>

        .password-reset .row label{
            text-align: right;
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
            <li class="active">修改密码</li>
        </ol>
    </section>

    <!-- Main content -->
    <section  class="content password-reset">

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
        <form method="post" action="/password/reset"  class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="old_password" class="col-sm-2 control-label">原密码：</label>
                <div class="col-sm-10 col-md-3 ">
                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="输入原密码" >
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">新密码： </label>
                <div class="col-sm-10 col-md-3 ">
                    <input type="password" class="form-control"  name="password" id="password" placeholder="输入新密码"  >
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label">确认新密码： </label>
                <div class="col-sm-10 col-md-3 ">
                    <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation" placeholder="输入新密码" >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> 修改
                    </button>
                </div>
            </div>
        </form>

    </section><!-- /.content -->

@endsection