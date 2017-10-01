@extends('manage.layout')
@section('title')

@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-md-5 user-left">
            <form class="input-group">
                @if(empty($searchBy))
                    <input type="text" class="form-control" placeholder="查找用户" name="search" required>
                    <input type="hidden" name="group" value="{{$groupBy}}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                </span>
                @else
                    <input type="text" class="form-control" value='正显示"{{$searchBy}}"的查询结果' readonly>
                    <input type="hidden" name="group" value="{{$groupBy}}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </span>
                @endif
            </form>
        </div>
        <div class="col-md-offset-5 col-md-2">
            <a class="btn btn-success user-right" href="/manage/userEdit">
                <span class="glyphicon glyphicon-plus"></span>
                添加用户
            </a>
        </div>
    </div>
    <div class="user-content row clearfix user-panel">
        <div class="col-md-8 user-panel-content">
            <h4 class="user-panel-content-item">所有用户</h4>
            @if($currentTotal!=0)
                @foreach($users as $info)
                    <div class="user-panel-content-item">
                        <div class="user-panel-content-item-left">
                            <p>
                                <img src="head?file={{$info->head}}"
                                     class=".img-responsive img-rounded user-head" alt="用户头像">
                                {{$info->Uname}}<br>
                                <span class="footnote">{{$info->Gname}}</span>
                            </p>
                        </div>
                        <div class="user-panel-content-item-right">
                            <a href="#modal-container-{{$info->UID}}" class="btn btn-danger delConfirm"
                               data-toggle="modal">删除</a>

                            {{--<button class="btn btn-primary">添加到</button>--}}
                            <a class="btn btn-default" href="/manage/userEdit?UID={{$info->UID}}">编辑</a>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-container-{{$info->UID}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        ×
                                    </button>
                                    <h4 class="modal-title">要删除用户"{{$info->Uname}}"吗？</h4>
                                </div>
                                <div class="modal-body">
                                    删除会永久去除该用户的所有资料！真的要这么做吗？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        取消
                                    </button>
                                    <a href="userDel?{{str_replace(array('+','/','='),array('-','_',''),base64_encode('UID='.$info->UID))}}"
                                       class="btn btn-primary">确定</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if($currentTotal>PAGE_SIZE)
                    <ul class="pagination">
                        <li><a href="{{$page['head']}}">首页</a></li>
                        <li><a href="{{$page['pre']}}">上一页</a></li>
                        <li><a href="{{$page['next']}}">下一页</a></li>
                        <li><a href="{{$page['tail']}}">尾页</a></li>
                    </ul>
                @endif
            @else
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    没有找到任何用户
                </div>
            @endif
        </div>
        <div class="col-md-4 user-panel-group">
            <a href="user?search={{$searchBy}}">
                @if(empty($groupBy))
                    <h4 class="user-panel-group-item active">全部用户</h4>
                @else
                    <h4 class="user-panel-group-item">全部用户</h4>
                @endif
            </a>
            @foreach($groups as $group)
                <a href="user?search={{$searchBy}}&group={{$group->GID}}">
                    @if($group->GID == $groupBy)
                        <h4 class="user-panel-group-item active">{{$group->name}}</h4>
                    @else
                        <h4 class="user-panel-group-item">{{$group->name}}</h4>
                    @endif
                </a>
            @endforeach
            <a href="user?search={{$searchBy}}&group=null">
                @if($groupBy=='null')
                    <h4 class="user-panel-group-item active">未分组</h4>
                @else
                    <h4 class="user-panel-group-item">未分组</h4>
                @endif
            </a>
        </div>
    </div>

@endsection