@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

    <center><h1>权限管理列表<a style="float:right" href="{{url('/rele/create')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th width="6%">
                </th>
                <th>管理ID</th>
                <th>权限名称</th>
                <th>模块</th>
                <th>控制器</th>
                <th>方法</th>
                <th>操作</th>
                <th>路由别名</th>
            </tr>
            </thead>

        </table>

    </div>
    <script>
    </script>
@endsection
