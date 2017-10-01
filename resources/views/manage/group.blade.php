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
                <th>分组ID</th>
                <th>分组名</th>
                <th>创建者</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    {{--<td><span class="glyphicon glyphicon-check" aria-hidden="true"></span></td>--}}
                    <td><span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span></td>
                    <td>{{$group->GID}}</td>
                    <td>{{$group->name}}</td>
                    <td>{{$group->creator}}</td>
                    <td>{{$group->created_at}}</td>
                    <td style="display:none;">{{$group->text}}</td>
                    <td><a href="/manage/groupDel?GID={{$group->GID}}">删除</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
    @else
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>当前没有任何分组</h4>
            你可以在下方新建一个分组
        </div>
    @endif
    <form method="post">
        {{csrf_field()}}
        <input name="GID" id="GID" type="hidden"/>
        <div class="form-group">
            <label for="name">分组名</label>
            <input class="form-control" id="name" name="name"/>
        </div>
        <div class="form-group">
            <label for="text">分组描述</label>
            <textarea class="form-control" id="text" name="text" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-default" id="submit">新建分组</button>
    </form>
@endsection
@section('js')
    <script>
        $(".table").delegate("tbody>tr", "click", function () {
            var tr = $(".table tr");
            if ($(this).hasClass("danger")) {
                $(this).removeClass("danger");
                $(this).find("span").attr("class", "glyphicon glyphicon-unchecked");
                $("#GID").val("");
                $("#name").val("");
                $("#text").val("");
                $("#submit").text("新建分组");
                $(".panel-body>h2").text("分组管理");
            } else {
                tr.removeClass("danger");
                tr.find("span").attr("class", "glyphicon glyphicon-unchecked");
                $(this).addClass("danger");
                $(this).find("span").attr("class", "glyphicon glyphicon-check");
                $("#GID").val($(this).children().eq(1).text());
                $("#name").val($(this).children().eq(2).text());
                $("#text").val($(this).children().eq(5).text());
                $("#submit").text("保存修改");
                $(".panel-body>h2").text("分组管理 - 正编辑“" + $(this).children().eq(2).text() + "”");
            }
        });
    </script>
@endsection