@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')
<a href="{{url('/user/create')}}">添加</a>
<table class="table">
        <thead>
        <tr>
            
            <th>管理ID</th>
            <th>管理人姓名</th>
            <th>管理人手机</th>
           
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            @foreach($user as $v)
        <tr>
            <th>{{$v->user_id}}</th>
            <th>{{$v->user_name}}</th>
            <th>{{$v->user_number}}</th>
            
            <th> <a href="javascript:void()" onclick="if(confirm('确认删除此用户')){location.href='{{url('/user/destroy/'.$v->user_id)}}'; }">删除</a></th>
        </tr>


            @endforeach
       </tbody>
    </table>



@endsection