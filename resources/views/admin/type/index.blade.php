@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

    <center><h1>属性列表<a style="float:right" href="{{url('/type/create')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>
<div class="table-responsive">
    <form>
        <input type="text" name="brand_name"  placeholder="请输入品牌关键字" value="{{$query['brand_name']??''}}">
        <input type="text" name="brand_url"  placeholder="请输入网址关键字" value="{{$query['brand_url']??''}}">
        <button class="btn btn-info">搜索</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>属性ID</th>
            <th>属性名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($type as $v)
            <tr>
                <td>{{$v->cat_id}}</td>
                <td>{{$v->cat_name}}</td>
                <td>
                    <a href="{{url('/attr/create/'.$v->cat_id)}}" id="{{$v->cat_id}}" type="button" class="layui-btn layui-btn-normal">添加属性</a>
                    <a href="{{url('/type/edit/'.$v->cat_id)}}" id="{{$v->cat_id}}" type="button" class="btn btn-success">编辑</a>
                <a href="javascript:void(0);" id="{{$v->cat_id}}" type="button" class="btn btn-warning">删除</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>

</div>
    <script>
        //几点几改
        $(document).on('click','.aww',function (){
            var brand_name = $(this).text();
            var id = $(this).parent().attr('id');
            $(this).parent().html('<input type="text" name="input_name" class="changname input_name_'+id+'"  value='+brand_name+'>');
            $('.input_name_'+id).val('').focus().val(brand_name);
        });
        $(document).on('blur','.changname',function () {
            var newname = $(this).val();
            var id = $(this).parent().attr('id');
            var obj = $(this);
            $.get('/brand/change', {id: id, brand_name: newname}, function (res) {
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
                $.get('/brand/destroy/'+id,function(rest){
                    if(rest.error_no == '1'){
                        location.reload();
                    }
                },'json');
            }

        });
            //分页
        $(document).on('click','#layui-laypage-1 a ',function(){
            var url = $(this).attr('href');
            $.get(url,function(result){
                $('tbody').html(result);
            })
            return false;
        });

        $(document).on('click','#layui-form-checkbox:eq(0)',function () {
            var checkedval = $('input[name="checkboxone"]').prop('checked');
            if (checkedval) {
                $('input[name="checkboxtwo"]').prop('checked', true);
            } else {
                $('input[name="checkboxtwo"]').prop('checked', false);
            }
        });

    </script>
@endsection
