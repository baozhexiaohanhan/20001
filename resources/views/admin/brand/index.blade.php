@extends('admin.layout.gong')
@section('title', '商品品牌列表')
@section('content')

    <center><h1>商品品牌列表<a style="float:right" href="{{url('/brand/brand')}}" type="button" class="btn btn-info">添加</a></h1></center><hr/>
<div class="table-responsive">
    <form>
        <input type="text" name="brand_name"  placeholder="请输入品牌关键字" value="{{$query['brand_name']??''}}">
        <input type="text" name="brand_url"  placeholder="请输入网址关键字" value="{{$query['brand_url']??''}}">
        <button class="btn btn-info">搜索</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th width="6%">
                <input type="checkbox" name="checkboxone"  id="layui-form-checkbox" lay-skin="primary" >
            </th>
            <th>品牌ID</th>
            <th>品牌名称</th>
            <th>品牌网址</th>
            <th>品牌LOGO</th>
            <th>品牌描述</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($brand as $v)
            <tr>
                <td><input type="checkbox" name="checkboxtwo" lay-skin="primary"  ></td>
                <td>{{$v->brand_id}}</td>
                <td id="{{$v->brand_id}}"><span class="aww">{{$v->brand_name}}</span></td>
                <td>{{$v->brand_url}}</td>
                <td><img src="{{$v->brand_logo}}" width="50"></td>
                <td>{{$v->brand_desc}}</td>
                <td><a href="{{url('/brand/edit/'.$v->brand_id)}}" id="{{$v->brand_id}}" type="button" class="btn btn-success">编辑</a>
                <a href="javascript:void(0);" id="{{$v->brand_id}}" type="button" class="btn btn-warning">删除</a></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                {{$brand->appends(["query"=>$query])->links('vendor.pagination.adminshop')}}
                <button class="mordel">批量删除</button>
            </td>
        </tr>
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
        // $(document).on('click','.mordel',function (){
        //     var ids = new Array();
        //     $('input[name="checkboxtwo"]:checked').each(function (i,k){
        //         ids.push($(this).val());
        //     })
        //     $.get('/brand/destroy',{ids,ids},function(rest){
        //         if(rest.error_no == '1'){
        //             location.reload();
        //         }
        //     },'json');


    </script>
@endsection
