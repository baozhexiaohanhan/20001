@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

<center><h1>管理员列表<a style="float:right" href="{{url('/admin/create')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>

<div>

<form>
<input type="text" name="admin_name"  placeholder="请输入品牌关键字" value="{{$query['admin_name']??''}}">
<button class="btn btn-info">搜索</button>
</form>

<table class="table">
        <thead>
        <tr>
            <th>管理ID</th>
            <th>管理人姓名</th>
            <th>管理人手机</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            @foreach($admin as $v)
        <tr>
            <th>{{$v->admin_id}}</th>
            <th>{{$v->admin_name}}</th>
            <th>{{$v->mobile}}</th>
            
            <th> <a href="javascript:void()" class="btn btn-warning" onclick="if(confirm('确认删除此用户')){location.href='{{url('/admin/destroy/'.$v->admin_id)}}'; }">删除</a></th>
        </tr>
            @endforeach
            <div>
      <tr>
        <th colspan="8">
        {{$admin->links('vendor.pagination.adminshop')}}
        
        </th>
      </tr>
   </div>
       </tbody>
    </table>

</div>
<script>
<<<<<<< HEAD
layui.use(['element', 'form'],function(){
  var element = layui.element;
     form = layui.form;
  
});

    $(document).on('click','#layui-laypage-1 a ',function(){
=======
 $(document).on('click','#layui-laypage-1 a ',function(){
>>>>>>> b9ed352f2172e06b16cff34c4bca601debc8c6bd
            var url = $(this).attr('href');
            $.get(url,function(result){
                $('tbody').html(result);
            })
            return false;
        });
    

</script>
@endsection
