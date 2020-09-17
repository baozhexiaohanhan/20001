@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')

    <center><h1>添加管理<a style="float:right" href="{{url('/admin/index')}}" type="button" class="btn btn-info">列表</a></h1></center><hr/>
    <form action="{{url('/admin')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        {{csrf_field()}}
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">管理名称</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="admin_name"
                       placeholder="请输入管理名称">
            </div>
        </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">管理密码</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="firstname" name="pwd"
                           placeholder="请输入管理名称">
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">管理确认密码</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="firstname" name="pwds"
                           placeholder="请输入管理确认密码">
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">手机号</label>
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
