@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
    <center><h1>广告添加<a style="float:right" href="{{url('/posters/create')}}" type="button" class="btn btn-default">添加</a></h1></center><hr/>
    <div class="table-responsive">
        <table class="table">
            <tbody>
            <tr>
                <th>广告名称</th>
                <th>广告位置</th>
                <th>媒介类型</th>
                <th>开始日期</th>
                <th>结束日期</th>
                <th>点击次数</th>
                <th>操作</th>
            </tr>
            @foreach($res as $k=>$v)
                <tr>
                    <th>{{$v->position_id}}</th>
                    <th>{{$v->ad_name}}</th>
                    <th>{{$v->position_id}}</th>
                    <th>{{$v->media_type}}</th>
                    <th>{{$v->start_date}}</th>
                    <th>{{$v->end_date}}</th>
                    <th>{{$v->click_count}}</th>
                    <th><a href="{{url('/poster/edit/'.$v->position_id)}}" id="{{$v->position_id}}" type="button" class="btn btn-dange">编辑</a>
                        <a href="javascript:void(0);" id="{{$v->position_id}}" type="button" class="btn btn-danger">删除</a>
                    </th>
                </tr>
            @endforeach
            <tr>
            </tr>
            </tbody>
        </table>
    </div>
    <script src="/static/jquery.min.js"></script>
    <script>
        //ajax删除
        $('.btn-danger').click(function(){
            var id = $(this).attr('id');
            var isdel = confirm('确定删除吗?');
            if(isdel == true){
                $.get('/poster/destroy/'+id,function(rest){
                    if(rest.error_no == '1'){
                        location.reload();
                    }
                },'json');
            }
        });
    </script>
@endsection
