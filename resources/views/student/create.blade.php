@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
	<center><h2>添加商品</h2></center>
<a href="{{url('/student/index')}}" type="button" class="btn btn-success">商品列表</a>


<form action="{{url('student/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
  <ul class="layui-tab-title">
    <li class="layui-this">通用信息</li>
    <li>详细描述</li>
    <li>其他信息</li>
    <li>商品属性</li>
    <li>商品相册</li>
  </ul>
  <div class="layui-tab-content">
  	<div class="layui-tab-item layui-show">
		
			@csrf
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">商品名称</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="firstname" name="s_name" 
							placeholder="商品名称">
							<b style="color:red">{{$errors->first('s_name')}}</b>
				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">商品型号</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="firstname" name="s_xinghao" 
							placeholder="商品货号">
							<b style="color:red">{{$errors->first('s_xinghao')}}</b>

				</div>
			</div>

				<div class="form-group">
				<label class="col-sm-2 control-label">商品分类</label>
				<div class="col-sm-10">
					<select name="cate_id" lay-filter="aihao">
						<option value="">请选择分类</option>
						@foreach($cate as $v)
						<option value="{{$v->cate_id}}">{{str_repeat('-|',$v->level)}}{{$v->cate_name}}</option>
						@endforeach
					</select>
					<b style="color:red">{{$errors->first('cate_id')}}</b>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">商品品牌</label>
				<div class="col-sm-10">
					<select name="brand_id" lay-filter="aihao">
						<option value="">请选择品牌</option>
						@foreach($brand as $v)
						<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
						@endforeach
					</select>
					<b style="color:red">{{$errors->first('brand_id')}}</b>
				</div>
			</div>

			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">商品图片</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" id="firstname"  name="s_img" 
							placeholder="商品主图">
							

				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">商品相册</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" id="firstname"  name="s_imgs[]" multiple="multiple"  
							placeholder="商品相册">

				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">商品价格</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="firstname"  name="s_price" 
							placeholder="价格">
							<b style="color:red">{{$errors->first('s_price')}}</b>

				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">商品库存</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="firstname"  name="s_kucun" 
							placeholder="库存">
							<b style="color:red">{{$errors->first('s_kucun')}}</b>

				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">是否显示</label>
				<div class="col-sm-10">
					<input type="radio"  id="firstname"  name="is_zhanshi" value="是" checked>是
					<input type="radio"  id="firstname"  name="is_zhanshi"value="否">否

				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">是否新品</label>
				<div class="col-sm-10">
					<input type="radio"  id="firstname"  name="is_new"value="是" checked>是
					<input type="radio"  id="firstname"  name="is_new"value="否">否
				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">是否精品</label>
				<div class="col-sm-10">
					<input type="radio"  id="firstname"  name="is_jingpin" value="是" checked>是
					<input type="radio"  id="firstname"  name="is_jingpin"value="否">否
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-info">添加</button>
				</div>
			</div>
	</div>
    <div class="layui-tab-item">内容2</div>
    <div class="layui-tab-item">内容3</div>
    <div class="layui-tab-item">内容4</div>
    <div class="layui-tab-item">内容5</div>
  </div>
</div> 
</form>



@endsection
