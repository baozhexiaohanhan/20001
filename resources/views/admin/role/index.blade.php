@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

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
            var url = $(this).attr('href');
            $.get(url,function(result){
                $('tbody').html(result);
            })
            return false;
        });
    

</script>