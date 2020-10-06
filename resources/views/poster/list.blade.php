@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
列表
<table class="table">
        <thead>
        <tr>
            <th>广告ID</th>
            <th>广告位名称</th>
            <th>位置宽度</th>
            <th>位置高度</th>
            <th>广告描述</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($menu as $k=>$v)
       		<tr>
       			<th>{{$v->position_id}}</th>
       			<th>{{$v->position_name}}</th>
       			<th>{{$v->ad_width}}</th>
       			<th>{{$v->ad_height}}</th>
       			<th>{{$v->position_desc}}</th>

                <td><a href="javascript:void(0);" id="{{$v->position_id}}" type="button" class="btn btn-warning">删除</a></td>
       		</tr>
       		@endforeach
    </table>
    		<script type="text/javascript">
    			//ajax删除
            $(document).on('click','.btn-warning',function (){
            var id = $(this).attr('id');
            var isdel = confirm('确定删除吗?');
            if(isdel == true){
                $.get('/poster/destroy/'+id,function(rest){
                    if(rest.error_no == '1'){
                        location.reload();
                    }
                },'json');
            }

        });
    		</script>
@endsection