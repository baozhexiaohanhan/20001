@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')


<center><h1>角色添加<a style="float:right" href="{{url('/role/index')}}" type="button" class="btn btn-info">列表</a></h1></center><hr/>

@if ($errors->any())
<div class="alert alert-danger" style="padding-bottom:20px;padding-left:20px">
  <ul>
@foreach ($errors->all() as $error)
  <li style="margin-top:10px;color:red; ">{{ $error }}</li>
@endforeach
  </ul>
</div>
@endif


<form action="{{url('/role/store')}}" method="POST" class="form-horizontal" role="form">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        {{csrf_field()}}
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="role_name"
                       placeholder="请输入名称">
            </div>
        </div>
        
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">角色描述</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="role_desc"
                       placeholder="请输入描述">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="layui-btn">添加</button>
            </div>
        </div>
    </form>




@endsection