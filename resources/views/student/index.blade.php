@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')

	<center><h2>商品列表</h2></center>
<a href="{{url('/student/create')}}" type="button" class="btn btn-warning">添加商品</a>
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
			@foreach($student as $v)
		<tr>
				<th>{{$v->id}}</th>
				<th>{{$v->s_pp}}</th>
				<th>{{$v->s_cc}}</th>
				<th>{{$v->s_aa}}</th>
				<th>{{$v->s_bb}}</th>
				<th><img src="{{env('IMG_URL')}}{{$v->s_ss}}" width="40" height="40"></th>
				<th>
					@if($v->s_ii)
					@php $s_ii= explode('|',$v->s_ii); @endphp
					@foreach ($s_ii as $vv)
					<img src="{{env('IMG_URL')}}{{$vv}}" width="40" height="40">
					@endforeach
					@endif
				</th>
				<th>{{$v->s_oo}}</th>
				<th>{{$v->s_hh}}</th>
				<th>{{$v->s_ff}}</th>
				<th>{{$v->s_uu}}</th>
				<th>{{$v->s_yy}}</th>
				<th><a href="{{url('/student/edit/'.$v->id)}}" type="button" class="btn btn-primary">修改</a>
				   -<a href="{{url('/student/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a></th>
			</tr>
			@endforeach
			<tr><td colspan="13">{{$student->links()}}</td></tr>
		</tbody>
</table>
</div>
@endsection
