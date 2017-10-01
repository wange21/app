@extends('manage.layout')
@section('content')
    {{--<link href="/plugins/file_input/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>--}}
    @if (count($errors) > 0)
        <div class="form-group alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif
    <form method="post">
        {{csrf_field()}}
        @if(!empty($user))
            <input name="UID" type="hidden" value="{{$user->UID}}">
            <input name="IID" type="hidden" value="{{$user->IID}}">
        @endif
        <div class="form-group">
            <label for="username">用户名：</label>
            <input class="form-control" id="username" @if(!empty($user)) value="{{$user->user}}" readonly
                   @else name="username" @endif>
        </div>
        @if(empty($user))
            <div class="form-group">
                <label for="pwd">密码：</label>
                <input class="form-control" id="pwd" name="pwd" type="password">
            </div>
        @endif
        <div class="form-group">
            <label for="name">昵称：</label>
            <input class="form-control" id="name" name="name" @if(!empty($user)) value="{{$user->name}}" @endif>
        </div>
        <div class="form-group">
            <label for="contact">联系方式：</label>
            <input class="form-control" id="contact" name="contact"
                   @if(!empty($user)) value="{{$user->contact}}" @endif>
        </div>
        <div class="form-group">
            <label>分组：</label>
            <select name="GID" class="form-control">
                <option value="null" @if(!empty($user)&&$user->GID==null) selected @endif>未分组</option>
                @foreach($groups as $group)
                    <option value='{{$group->GID}}'
                            @if(!empty($user)&&$user->GID==$group->GID) selected @endif>{{$group->name}}</option>
                @endforeach
            </select>
        </div>
        {{--<div class="form-group">
            <label>头像：</label>
            <input class="form-control" name="head" type="file" id="head" accept="image/*"/>
        </div>--}}
        <button type="submit" class="btn btn-primary btn-block">提交</button>
    </form>
@endsection
{{--
@section('js')
    <script src="/plugins/file_input/canvas-to-blob.min.js"></script>

    <script src="/plugins/file_input/fileinput.min.js"></script>

    <script src="/plugins/file_input/zh.js"></script>

    <script>
        $(document).ready(function () {
            $("#head").fileinput({
                language:'zh',
                allowedFileExtensions: ['jpg', 'png'],
                uploadUrl: "URL",
                uploadAsync: true,
                dropZoneEnabled: true,
                maxImageWidth: 50,
                maxImageHeight: 50,
                maxFileSize: 1024,
                maxFileCount: 1,
                enctype: 'multipart/form-data',
                validateInitialCount:true,
            });
        });
    </script>
@endsection--}}
