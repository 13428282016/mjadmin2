<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>魔镜后台登录 | 响巢看看</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.min.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="{{asset("js/common.min.js")}}"></script>
    <!--[if lt IE 9]>

    <script src="{{asset('js/shim.bundle.min.js')}}"></script>

    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{asset("img/favicon.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset("img/apple-touch-icon-144-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset("img/apple-touch-icon-114-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset("img/apple-touch-icon-72-precomposed.png")}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset("img/apple-touch-icon-57-precomposed.png")}}">

</head>

<body >

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>魔镜</strong>  后台登录</h1>
                    {{--<div class="description">--}}
                        {{--<p>--}}
                            {{--This is a free responsive login form made with Bootstrap.--}}
                            {{--Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!--}}
                        {{--</p>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>登录</h3>
                            <p>请输入你的账号和密码:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        @if (count($errors) > 0)
                                <!-- Form Error List -->
                        <div class="alert alert-danger">
                            <strong>糟糕! 有东西出错啦!</strong>

                            <br><br>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form role="form" action="/auth/login" method="post" class="login-form">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="sr-only" for="username">账号</label>
                                <input type="text" name="username" placeholder="账号..." class="form-username form-control" value="{{old('username')}}" id="username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">密码</label>
                                <input type="password" name="password" placeholder="密码..." class="form-password form-control" id="password">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember"> 记住我
                            </div>
                            <button type="submit" class="btn">登 录</button>
                        </form>
                    </div>
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-sm-6 col-sm-offset-3 social-login">--}}
                    {{--<h3>...or login with:</h3>--}}
                    {{--<div class="social-login-buttons">--}}
                        {{--<a class="btn btn-link-1 btn-link-1-facebook" href="#">--}}
                            {{--<i class="fa fa-facebook"></i> Facebook--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-link-1 btn-link-1-twitter" href="#">--}}
                            {{--<i class="fa fa-twitter"></i> Twitter--}}
                        {{--</a>--}}
                        {{--<a class="btn btn-link-1 btn-link-1-google-plus" href="#">--}}
                            {{--<i class="fa fa-google-plus"></i> Google Plus--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="{{asset("js/vendor.bundle.min.js")}}"></script>




</body>

</html>