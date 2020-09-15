@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

<<<<<<< HEAD
<center><h1>角色列表<a style="float:right" href="{{url('/role/create')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>

<div>

<form>
<input type="text" name="role_name"  placeholder="请输入品牌关键字" value="{{$query['role_name']??''}}">
<button class="btn btn-info">搜索</button>
</form>

<table class="table">
        <thead>
        <tr>
            
            <th>角色ID</th>
            <th>角色姓名</th>
            <th>角色描述</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            @foreach($role as $v)
        <tr>
            <th>{{$v->role_id}}</th>
            <th>{{$v->role_name}}</th>
            <th>{{$v->role_desc}}</th>
            
            <th> <a href="javascript:void()" class="btn btn-warning" onclick="if(confirm('确认删除此用户')){location.href='{{url('/role/destroy/'.$v->role_id)}}'; }">删除</a></th>
        </tr>
            @endforeach
            <div>
      <tr>
        <th colspan="8">
        {{$role->links('vendor.pagination.adminshop')}}
        
        </th>
      </tr>
   </div>


       </tbody>
    </table>

</div>

@endsection


<script>
layui.use(['element', 'form'],function(){
  var element = layui.element;
  var form = layui.form;
  
});

    $(document).on('click','#layui-laypage-1 a ',function(){
=======
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
        $(document).on('click','#layui-laypage-1 a ',function(){
>>>>>>> 37a9f1401cf85e0534f470e7a153e5b02e20f47c
            var url = $(this).attr('href');
            $.get(url,function(result){
                $('tbody').html(result);
            })
            return false;
        });
<<<<<<< HEAD
    

</script>
=======
    </script>
@endsection
>>>>>>> 37a9f1401cf85e0534f470e7a153e5b02e20f47c
