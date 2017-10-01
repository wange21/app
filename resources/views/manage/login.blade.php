<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理员登陆</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #0092E7;
        }

        .content {
            margin-top: 100px;
        }

        h1 {
            text-align: center;
            color: #FFFFFF;
        }

        h2 {
            margin: 10px;
            text-align: center;
        }

        .panel {
            padding: 20px;
        }

        .form-control {
            background-color: #E5E5E5;
        }

        .glyphicon-ok {
            color: #FFFFFF;
        }

        #login-button {
            background-color: #A3E110;
        }

        .foot {
            text-align: center;
        }
    </style>
</head>
<body id="app-layout">

<div class="row">
    <div class="content col-md-3 col-md-offset-4 col-xs-10 col-xs-offset-1">
        <div>
            <div style="text-align: center">
                <img class="logo" src="/img/logo.png" width="50px"><span
                        style="display: inline-block; vertical-align: bottom ;color: #FFFFFF" width="50px">The Creator<br>APP评论分析平台</span></a>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="form-group alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                    <br>
                @endforeach
            </div>
        @endif
        <div class="panel panel-default">
            <h2>登陆</h2>
            <div class="body">
                <form action="doLogin" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="username">用户名</label>
                        <input type="text" class="form-control" id="username" name="user">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control" id="password" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-lg btn-default" id="login-button">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                </form>
            </div>
            <div class="foot">

            </div>
        </div>
    </div>
</div>
<!-- JavaScripts -->
<script src="/js/app.js"></script>

</body>
</html>
