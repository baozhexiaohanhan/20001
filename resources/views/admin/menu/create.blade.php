@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')

    <center><h1>添加菜单<a style="float:right" href="{{url('/menu')}}" type="button" class="btn btn-info">列表</a></h1></center><hr/>
    <form action="{{url('/menu/store')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        {{csrf_field()}}
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">菜单名称</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="menu_name"
                       placeholder="请输入角色名称">
            </div>
        </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">菜单URL</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstname" name="url"
                           placeholder="请输入角色名称">
                </div>
            </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">菜单别名</label>
            <div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="routname"
                      placeholder="请输入角色描述"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
@endsection
