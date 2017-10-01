@extends('manage.layout')

@section('content')
        <div class="col-md-4">
            <h3>全部APP</h3>
            <hr>
            <div class="table-sm">
                <table class="table table-striped table-hover myWords-my-table table-sm">
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <h3>APP分词</h3>
            <hr>
            <div class="table-sm">
                <table class="table table-striped table-hover mywords-follow-words-table">
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <h3>全部分词<button class="btn btn-success" style="display: block;float: right" id="myWords-add">添加分词</button></h3>
            <hr>
            <div class="table-sm">
                <table class="table table-striped table-hover mywords-my-words-table">
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
@endsection

@section('js')
    <script src="/js/manage/words.js"></script>
@endsection