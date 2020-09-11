@extends('admin.layout.gong')
@section('title', '分类列表')
@section('content')
<table class="table table-striped">
	<thead>
		<tr>
			<th>分类ID</th>
			<th>分类名称</th>
			<th>是否展示</th>
			<th>是否导航展示</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
@foreach($cate as $v)
		<tr>
			<td>{{$v->cate_id}}</td>
			<td>{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</td>
			<td>{{$v->cate_show}}</td>
			<td>{{$v->cate_shows}}</td>
			<td>
				<a href="{{url('/cate/edit/'.$v->cate_id)}}" class="btn btn-primary">编辑</a>
				<a href="{{url('/cate/destroy/'.$v->cate_id)}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
@endforeach
	</tbody>
</table>


@endsection