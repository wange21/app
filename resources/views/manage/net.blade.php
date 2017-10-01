@extends('manage.layout')

@section('content')
    <div class="progress ">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
             aria-valuemax="100">
        </div>
    </div>
    <form class="form-horizontal" style="margin-top: 50px;">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="startDate" class="col-sm-2 control-label">开始时间：</label>
            <div class="col-sm-10">
                <input size="16" id="startDate" name="startDate" type="text" readonly class="datepicker form-control">
            </div>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="endDate" class="col-sm-2 control-label">结束时间：</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input size="16" id="endDate" name="endDate" type="text" readonly class="datepicker form-control">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="gameId" class="col-sm-2 control-label">选择应用：</label>
            <div class="col-sm-10">
                <select class="form-control" id="gameId" name="appname">
                    <option>请选择</option>
                    @foreach($apps as $app)
                        <option data-sourceid="{{$app->sourceID}}">{{$app->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="categoryId" class="col-sm-2 control-label">平台：</label>
            <div class="col-sm-10">
                <select class="form-control" id="categoryId" name="category">
                    <option>请选择</option>
                    <option data-categoryid="{{APP_STORE_ID}}">AppStore</option>
                    <option data-categoryid="{{YINGYONG_ID}}">应用宝</option>
                    <option data-categoryid="{{WANDOU_ID}}">豌豆荚</option>
                    <option data-categoryid="{{BAIDU_ID}}">百度手机助手</option>>
                    <option data-categoryid="{{_360_ID}}">360手机助手</option>>
                </select>
            </div>
        </div>
        <a id="comment-submit" class="btn btn-primary ">更新</a>
    </form>

    <div class="net-show"></div>
@endsection

@section('js')
    <script src="/js/manage/comment.js"></script>
    <script src="/js/layer/layer.js"></script>
@endsection