@extends('admin.layout.gong')
<<<<<<< HEAD
@section('title', '商品添加')
=======
@section('title', '角色列表')
>>>>>>> zxp
@section('content')
    <center><h1>角色列表<a style="float:right" href="{{url('/role/create')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>
    <div class="table-responsive">
        <form>
            <input type="text" name="brand_name"  placeholder="请输入品牌关键字" value="{{$query['brand_name']??''}}">
            <input type="text" name="brand_url"  placeholder="请输入网址关键字" value="{{$query['brand_url']??''}}">
            <button class="btn btn-info">搜索</button>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>角色ID</th>
                <th>角色名称</th>
                <th>角色简介</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($role as $v)
                <tr>
                    <td>{{$v->role_id}}
                    <td id="{{$v->role_id}}"><span class="aww">{{$v->role_name}}</span></td>
                    <td>{{$v->role_desc}}</td>
                    <td>
                        <a href="{{url('/role/addpriv')}}" type="button" class="btn btn-success">添加权限</a>
                        <a href="{{url('/role/edit/'.$v->role_id)}}" id="{{$v->role_id}}" type="button" class="btn btn-success">编辑</a>
                        <a href="javascript:void(0);" id="{{$v->role_id}}" type="button" class="btn btn-warning">删除</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    {{$role->appends(["query"=>$query])->links('vendor.pagination.adminshop')}}
                    <button class="mordel btn btn-info">批量删除</button>
                </td>
            </tr>
            </tbody>

        </table>

    </div>

    <script type="text/javascript">
         $(document).on('click','#layui-laypage-1 a ',function(){
            var url = $(this).attr('href');
            $.get(url,function(result){
                $('tbody').html(result);
            })
            return false;
        });
           $(document).on('click','.btn-warning',function (){
            var id = $(this).attr('id');
            var isdel = confirm('确定删除吗?');
            if(isdel == true){
                $.get('/role/destroy/'+id,function(rest){
                    if(rest.error_no == '1'){
                        location.reload();
                    }
                },'json');
            }

        });

    </script>
@endsection
