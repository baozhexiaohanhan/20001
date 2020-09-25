@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')

	<center><h2>商品列表</h2></center>
<a href="{{url('/goods/create')}}" type="button" class="btn btn-success">添加商品</a>
<div class="table-responsive">
	<table class="table" >
		<caption></caption>
		<thead>
			<tr>
				<th>商品ID</th>
				<th>商品名称</th>
				<th>商品型号</th>
				<th>商品分类</th>
				<th>商品品牌</th>
				<th>商品图片</th>
				<th>商品相册</th>
				<th>商品价格</th>
				<th>商品库存</th>
				<th>是否显示</th>
				<th>是否新品</th>
				<th>是否精品</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $v)
		<tr>
				<th>{{$v->goods_id}}</th>
				<th>{{$v->goods_name}}</th>
				<th>{{$v->goods_xinghao}}</th>
				<th>{{$v->cate_name}}</th>
				<th>{{$v->brand_name}}</th>
				<th><img src="{{env('IMG_URL')}}{{$v->goods_img}}" width="40" height="40"></th>
				<th>
					@if($v->goods_imgs)
					@php $goods_imgs= explode('|',$v->goods_imgs); @endphp
					@foreach ($goods_imgs as $vv)
					<img src="{{env('IMG_URL')}}{{$vv}}" width="40" height="40">
					@endforeach
					@endif
				</th>
				<th>{{$v->goods_price}}</th>
				<th>{{$v->goods_kucun}}</th>
				<th>{{$v->is_zhanshi}}</th>
				<th>{{$v->is_new}}</th>
				<th>{{$v->is_jingpin}}</th>
				<th><a href="{{url('/goods/edit/'.$v->goods_id)}}" type="button" class="btn btn-success">修改</a>-
                    <a href="javascript:void(0);" goods_id="{{$v->goods_id}}" type="button" class="btn btn-warning">删除</a></td>
                </th>
			</tr>
			@endforeach
		
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
           var goods_id = $(this).attr('goods_id');
           var isdel = confirm('确定删除吗?');
           if(isdel == true){
               $.get('/goods/destroy/'+goods_id,function(rest){
                   if(rest.error_no == '1'){
                       location.reload();
                   }
               },'json');
           }
       });
</script>
@endsection
