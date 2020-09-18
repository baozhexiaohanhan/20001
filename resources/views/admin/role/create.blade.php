@extends('admin.layout.gong')

@section('title', '商品添加')
@section('content')

    <center><h1>添加角色<a style="float:right" href="{{url('/role')}}" type="button" class="btn btn-info">列表</a></h1></center><hr/>
    <form action="{{url('/role/store')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
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

                       placeholder="请输入角色名称">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">角色描述</label>
            <div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="role_desc"
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
