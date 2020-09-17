@extends('admin.layout.gong')
<<<<<<< HEAD
@section('title', '商品品牌列表')
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
                    <td><a href="{{url('/role/edit/'.$v->role_id)}}" id="{{$v->role_id}}" type="button" class="btn btn-success">编辑</a>
                        <a href="javascript:void(0);" id="{{$v->role_id}}" type="button" class="btn btn-warning">删除</a></td>
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
    <script>
=======
@section('title', '角色列表')
@section('content')

    <center><h1>角色列表<a style="float:right" href="{{url('/role/role')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>
<div class="table-responsive">
    <form>
        <input type="text" name="role_name"  placeholder="请输入品牌关键字" value="{{$query['role_name']??''}}">
        <button class="btn btn-info">搜索</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th width="6%">
                <input type="checkbox" name="checkboxone"  id="layui-form-checkbox" lay-skin="primary" >
            </th>
            <th>角色ID</th>
            <th>角色名称</th>
            <th>角色描述</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($role as $v)
            <tr>
                <td><input type="checkbox" name="checkboxtwo" lay-skin="primary"  ></td>
                <td>{{$v->role_id}}</td>
                <td>{{$v->role_name}}</td>
                <td>{{$v->role_desc}}</td>
                <td><a href="{{url('/role/edit/'.$v->role_id)}}" id="{{$v->role_id}}" type="button" class="btn btn-success">编辑</a>
                <a href="javascript:void(0);" id="{{$v->role_id}}" type="button" class="btn btn-warning">删除</a></td>
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
    <script>
        //几点几改
        $(document).on('click','.aww',function (){
            var role_name = $(this).text();
            var id = $(this).parent().attr('id');
            $(this).parent().html('<input type="text" name="input_name" class="changname input_name_'+id+'"  value='+role_name+'>');
            $('.input_name_'+id).val('').focus().val(role_name);
        });
        $(document).on('blur','.changname',function () {
            var newname = $(this).val();
            var id = $(this).parent().attr('id');
            var obj = $(this);
            $.get('/role/change', {id: id, role_name: newname}, function (res) {
            if(res.code==0){
                alert(res.msg);
                obj.parent().html('<span class="aww">'+newname+'</span>')
            }
            },'json')
        });
        //ajax删除
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
>>>>>>> exam
        $(document).on('click','#layui-laypage-1 a ',function(){
            var url = $(this).attr('href');
            $.get(url,function(result){
                $('tbody').html(result);
            })
            return false;
        });
<<<<<<< HEAD
=======

        $(document).on('click','#layui-form-checkbox:eq(0)',function () {
            var checkedval = $('input[name="checkboxone"]').prop('checked');
            if (checkedval) {
                $('input[name="checkboxtwo"]').prop('checked', true);
            } else {
                $('input[name="checkboxtwo"]').prop('checked', false);
            }
        });
        // $(document).on('click','.mordel',function (){
        //     var ids = new Array();
        //     $('input[name="checkboxtwo"]:checked').each(function (i,k){
        //         ids.push($(this).val());
        //     })
        //     $.get('/role/destroy',{ids,ids},function(rest){
        //         if(rest.error_no == '1'){
        //             location.reload();
        //         }
        //     },'json');


>>>>>>> exam
    </script>
@endsection
