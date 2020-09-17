@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')


<center><h1>管理员添加<a style="float:right" href="{{url('/admin/index')}}" type="button" class="btn btn-info">列表</a></h1></center><hr/>

@if ($errors->any())
<div class="alert alert-danger" style="padding-bottom:20px;padding-left:20px">
  <ul>
@foreach ($errors->all() as $error)
  <li style="margin-top:10px;color:red; ">{{ $error }}</li>
@endforeach
  </ul>
</div>
@endif


<form action="{{url('/admin/store')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        {{csrf_field()}}
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">管理员姓名</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="admin_name"
                       placeholder="请输入姓名">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="firstname" name="pwd"
                       placeholder="请输入密码">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="firstname" name="pwd1"
                       placeholder="请确认密码">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">联系方式</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="mobile"
                       placeholder="请输入手机号">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>


@endsection