@extends('manage.layout')
@section('content')
    @if (count($errors) > 0)
        <div class="form-group alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif

    @if($count!=0)
        <table class="table">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th>ID</th>
                <th>LOGO</th>
                <th>APP名称</th>
                <th>开发商/运营商</th>
                <th>内部源</th>
                <th>最近更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($apps as $app)
                <tr>
                    {{--<td><span class="glyphicon glyphicon-check" aria-hidden="true"></span></td>--}}
                    <td><span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span></td>
                    <td>{{$app->AID}}</td>
                    <td><img class="app-logo" src="/manage/logo?file={{$app->logo}}"/></td>
                    <td>{{$app->name}}</td>
                    <td>{{$app->developer}}</td>
                    <td>{{$app->sourceID}}</td>
                    <td>{{$app->updated_at}}</td>
                    <td style="display:none;">{{$app->text}}</td>
                    <td><a href="/manage/appDel?AID={{$app->AID}}">删除</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
    @else
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>当前没有任何APP</h4>
            你可以在下方添加APP
        </div>
    @endif

    <form method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="AID" id="AID" type="hidden">
        <div class="form-group">
            <label for="name">APP名称：</label>
            <input class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="logo">APP_LOGO：</label>
            <input class="form-control" id="logo" name="logo" type="file">
        </div>
        <div class="form-group">
            <label for="text">APP描述：</label>
            <textarea class="form-control" id="text" name="text" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="developer">开发商/运营商：</label>
            <input class="form-control" id="developer" name="developer">
        </div>
        <div class="form-group">
            <label for="sourceID">内部源ID：</label>
            <input class="form-control" id="sourceID" name="sourceID">
        </div>
        <button type="submit" class="btn btn-primary btn-block">提交</button>
    </form>
@endsection
@section('js')
    <script>
        $(".table").delegate("tbody>tr", "click", function () {
            var tr = $(".table tr");
            if ($(this).hasClass("danger")) {
                $(this).removeClass("danger");
                $(this).find("span").attr("class", "glyphicon glyphicon-unchecked");
                $("#AID").val("");
                $("#name").val("");
                $("#text").val("");
                $("#developer").val("");
                $("#sourceID").val("");
                $("#submit").text("添加APP");
                $(".panel-body>h2").text("APP管理");
            } else {
                tr.removeClass("danger");
                tr.find("span").attr("class", "glyphicon glyphicon-unchecked");
                $(this).addClass("danger");
                $(this).find("span").attr("class", "glyphicon glyphicon-check");
                $("#AID").val($(this).children().eq(1).text());
                $("#name").val($(this).children().eq(3).text());
                $("#text").val($(this).children().eq(7).text());
                $("#developer").val($(this).children().eq(4).text());
                $("#sourceID").val($(this).children().eq(5).text());
                $("#submit").text("保存修改");
                $(".panel-body>h2").text("APP管理 - 正编辑“" + $(this).children().eq(3).text() + "”");
            }
        });
    </script>
@endsection