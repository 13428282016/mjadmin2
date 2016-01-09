@extends('admin.layout.main')

@section('content')
    <section class="content-header">
        <h1>
            用户中心
            <small> 个人信息</small>
        </h1>
        {{--<ol class="breadcrumb">--}}
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
        {{--<li class="active">Here</li>--}}
        {{--</ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>

        </div>
    </section><!-- /.content -->

@endsection