@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

    <center><h1>菜单列表<a style="float:right" href="{{url('/menu/create')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>
    <div class="table-responsive">
        <form>
            <input type="text" name="brand_name"  placeholder="请输入品牌关键字" value="{{$query['brand_name']??''}}">
            <input type="text" name="brand_url"  placeholder="请输入网址关键字" value="{{$query['brand_url']??''}}">
            <button class="btn btn-info">搜索</button>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>菜单ID</th>
                <th>菜单名称</th>
                <th>菜单URL</th>
                <th>菜单别名</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($menu as $v)
                <tr>
                    <td>{{$v->menu_id}}
                    <td id="{{$v->menu_id}}"><span class="aww">{{$v->menu_name}}</span></td>
                    <td>{{$v->url}}</td>
                    <td>{{$v->routname}}</td>
                    <td><a href="{{url('/menu/edit/'.$v->menu_id)}}" id="{{$v->menu_id}}" type="button" class="btn btn-success">编辑</a>
                        <a href="javascript:void(0);" id="{{$v->menu_id}}" type="button" class="btn btn-warning">删除</a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    {{$menu->appends(["query"=>$query])->links('vendor.pagination.adminshop')}}
                    <button class="mordel btn btn-info">批量删除</button>
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

          //ajax删除
            $(document).on('click','.btn-warning',function (){
            var id = $(this).attr('id');
            var isdel = confirm('确定删除吗?');
            if(isdel == true){
                $.get('/menu/destroy/'+id,function(rest){
                    if(rest.error_no == '1'){
                        location.reload();
                    }
                },'json');
            }

        });
    </script>
@endsection
