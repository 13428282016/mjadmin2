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

        <form>
            <div class="form-group">
                <label for="昵称">昵称</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </section><!-- /.content -->

@endsection