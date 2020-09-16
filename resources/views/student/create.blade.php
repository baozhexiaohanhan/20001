@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
	<center><h2>添加商品</h2></center>
<a href="{{url('/student/index')}}" type="button" class="btn btn-success">商品列表</a>

<form action="{{url('student/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="s_pp" 
				   placeholder="商品名称">
				   <b style="color:red">{{$errors->first('s_pp')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品型号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="s_cc" 
				   placeholder="商品货号">
				   <b style="color:red">{{$errors->first('s_cc')}}</b>

		</div>
	</div>
	<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<select name="s_aa">
		<option value="0" checked>请选择</option>
		<option value="玫瑰花">玫瑰花</option>
		<option value="牡丹花">牡丹花</option>
		<option value="白兰花">白兰花</option>
		<option value="紫罗兰">紫罗兰</option>
</select>
	</div>

	<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<select name="s_bb">
		<option value="0" checked>请选择</option>
		<option value="玫瑰花">宝马</option>
		<option value="牡丹花">香奈儿</option>
		<option value="白兰花">保时捷</option>
		<option value="紫罗兰">格力</option>
</select>
	</div>

	<!-- <div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="firstname"  name="s_bb" 
			   placeholder="商品品牌">
			   <b style="color:red">{{$errors->first('s_bb')}}</b>

		</div>
	</div> -->
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品图片</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname"  name="s_ss" 
				   placeholder="商品主图">
				  

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname"  name="s_ii[]" multiple="multiple"  
				   placeholder="商品相册">

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname"  name="s_oo" 
				   placeholder="价格">
				   <b style="color:red">{{$errors->first('s_oo')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname"  name="s_hh" 
				   placeholder="库存">
				   <b style="color:red">{{$errors->first('s_hh')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio"  id="firstname"  name="s_yy" value="是">是
			<input type="radio"  id="firstname"  name="s_yy"value="否">否

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-10">
			<input type="radio"  id="firstname"  name="s_ff"value="是">是
			<input type="radio"  id="firstname"  name="s_ff"value="否">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-10">
			<input type="radio"  id="firstname"  name="s_uu" value="是">是
			<input type="radio"  id="firstname"  name="s_uu"value="否">否
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

@endsection
