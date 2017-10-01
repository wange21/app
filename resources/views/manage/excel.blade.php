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

    <form method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="file">选择Excel文件上传</label>
            <input class="form-control" id="file" name="file" type="file"/>
        </div>
        <button type="submit" class="btn btn-default" id="submit">上传并导入</button>
    </form>
@endsection