@extends('layout.layout')
@section('title', '广告列表')
@section('content')

    <center><h1>广告添加<a style="float:right" href="{{url('/posters/create')}}" type="button" class="btn btn-default">添加</a></h1></center><hr/>
    <div class="table-responsive">
        <table class="table">
            <tbody>
            <tr>
                <th width="30px">ID</th>
                <th width="100px">广告名称</th>
                <th width="50px">广告位置</th>
                <th width="50px">媒介类型</th>
                <th width="50px">开始日期</th>
                <th width="50px">结束日期</th>
                <th width="50px">广告联系人</th>
                <th width="50px">联系人email</th>
                <th width="50px">联系人手机号</th>
                <th width="200px">操作</th>
            </tr>
            @foreach($menu as $k=>$v)
                <tr>
                <tr ad_id="{{$v->ad_id}}">
                    <td>{{$v->ad_id}}</td>
                    <td>{{$v->ad_name}}</td>
                    <td>{{$v->position_name}}</td>
                    <td>
                        @if($v->media_type == 1)
                            图片
                        @elseif($v->media_type == 2)
                            Flash
                        @elseif($v->media_type == 3)
                            代码
                        @elseif($v->media_type == 4)
                            文字
                        @endif
                    </td>
                    <td>{{date('Y-m-d h:i:s',$v->start_time)}}</td>
                    <td>{{date('Y-m-d h:i:s',$v->end_time)}}</td>
                    <td>{{$v->link_man}}</td>
                    <td>{{$v->link_email}}</td>
                    <td>{{$v->link_phone}}</td>
                    <td><a href="{{url('/poster/edit/'.$v->position_id)}}" id="{{$v->position_id}}" type="button" class="btn btn-dange">编辑</a>
                        <a href="javascript:void(0);" id="{{$v->position_id}}" type="button" class="btn btn-danger">删除</a>
                    </td>
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
