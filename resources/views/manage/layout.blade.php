<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{$title}} - 后台管理</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <link href="/css/manage.css" rel="stylesheet">

</head>
<body id="app-layout">

<nav class="navbar navbar-default nav-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/" style="padding:5px;"><img class="logo" src="/img/logo.png"
                                                                       style="    display: inline !important"
                                                                       width="40px"><span
                        style="display: block;float: right;color:#FFF" width="40px">TheCreator<br>APP评论分析平台</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a class="nav-a" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">用户管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/manage/user">账户管理</a></li>
                        <li><a href="/manage/group">分组管理</a></li>
                    </ul>
                </li>
                <li><a class="nav-a" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">数据管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/manage/app">APP管理</a></li>
                        <li><a href="/manage/excel">从Execl导入数据</a></li>
                        <li><a href="/manage/comment-form-net">从网络导入数据</a></li>
                    </ul>
                </li>
                <li><a class="nav-a" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">分析管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/manage/addwords">管理分词</a></li>
                        <li><a href="#">设置颗粒度</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav-a" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">{{session('user')}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/manage/login">登出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>{{$title}}</h2>
                    <hr>
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScripts -->
<script src="/js/app.js"></script>
<script src="//cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
@yield('js')
</body>
</html>
