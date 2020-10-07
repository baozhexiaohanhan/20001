@extends('layout.layout')
@section('title', '广告列表')
@section('content')

    <center><h1>广告添加<a style="float:right" href="{{url('/poster/create')}}" type="button" class="btn btn-default">添加</a></h1></center><hr/>
<div class="table-responsive">
    <table class="table">
         <tbody>
         <tr>
                <th width="30px">广告ID</th>
                <th width="100px">广告位名称</th>
                <th width="50px">位置宽度</th>
                <th width="50px">位置高度</th>
                <th width="50px">广告描述</th>
                <th width="200px">操作</th>
            </tr>
         @foreach($menu as $k=>$v)
       		<tr>
       			<th>{{$v->position_id}}</th>
       			<th>{{$v->position_name}}</th>
       			<th>{{$v->ad_width}}</th>
       			<th>{{$v->ad_height}}</th>
       			<th>{{$v->position_desc}}</th>
       			 <th>
                     <a href="{{url('/poster/createad/'.$v->position_id)}}" id="{{$v->position_id}}" type="button" class="btn btn-dange">生成文件</a>
                 <a href="{{url('/poster/edit/'.$v->position_id)}}" id="{{$v->position_id}}" type="button" class="btn btn-dange">编辑</a>
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
