@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

    <center><h1>管理员列表<a style="float:right" href="{{url('/admin/create')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>管理员ID</th>
                <th>管理员名称</th>
                <th>管理员联系方式</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($admin as $v)
                <tr>
                    <td>{{$v->admin_id}}
                    <td id="{{$v->admin_id}}"><span class="aww">{{$v->admin_name}}</span></td>
                    <td>{{$v->mobile}}</td>
                    <td><a href="{{url('/admin/edit/'.$v->admin_id)}}" id="{{$v->admin_id}}" type="button" class="btn btn-success">编辑</a>
                        <a href="javascript:void(0);" id="{{$v->admin_id}}" type="button" class="btn btn-warning">删除</a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    {{$admin->appends(["query"=>$query])->links('vendor.pagination.adminshop')}}
                    
                </td>
            </tr>
            </tbody>

        </table>

    </div>
    <script>
        $(document).on('click','#layui-laypage-1 a ',function(){
            var url = $(this).attr('href');
            $.get(url,function(result){
                $('tbody').html(result);
            })
            return false;
        });
    </script>
@endsection
