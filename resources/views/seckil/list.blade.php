@extends('layout.layout')
@section('title', '广告列表')
@section('content')

    <center><h1>广告添加<a style="float:right" href="{{url('/poster/create')}}" type="button" class="btn btn-default">添加</a></h1></center><hr/>
<div class="table-responsive">
    <table class="table">
         <tbody>
            <tr>
               
               <td>ID</td>
               <td>限时抢购名称</td>
               <td>起始时间</td>
               <td>结束时间</td>
               <td>图片</td>
               <td>名称</td>
               <td>原价格</td>
               <td>限时抢购价格</td>
               <td>介绍</td>
               <td>操作</td>
            </tr>
         
            @foreach($menu as $k=>$v)
                <tr>
                    <td>{{$v->seckill_id}}</td>
                    <td>{{$v->seckill_name}}</td>
                    <td>{{date('Y-m-d h:i:s',$v->start_time)}}</td>
                    <td>{{date('Y-m-d h:i:s',$v->end_time)}}</td>
                     <td>
                        @if($v->goods_img)
                        <img src="{{$v->goods_img}}" width="50px" height="50px">
                        @endif

                        </td>
                    <td>{{$v->goods_id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->goods_price}}</td>
                    <td>{{$v->goods_qprice}}</td>
                    <td>{{$v->desc}}</td>
                    <td><a href="{{url('/poster/edit/'.$v->position_id)}}" id="{{$v->position_id}}" type="button" class="btn btn-dange">编辑</a>
                        <a href="javascript:void(0);" id="{{$v->position_id}}" type="button" class="btn btn-danger">删除</a>
                    </td>
            @endforeach
            <tr>
            </tr>
        </tbody>
    </table>
</div>
<script src="/static/jquery.min.js"></script>
@endsection
