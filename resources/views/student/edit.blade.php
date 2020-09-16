@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
<a href="{{url('/student/index')}}" type="button" class="btn btn-success">返回</button></a>

<form action="{{url('student/update/'.$student->id)}}" method="post" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="s_pp" value="{{$student->s_pp}}"
				   placeholder="商品名称">
				   <b style="color:red">{{$errors->first('s_pp')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="s_cc" value="{{$student->s_cc}}"
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
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname"  name="s_bb" value="{{$student->s_bb}}"
				   placeholder="商品品牌">
				   <b style="color:red">{{$errors->first('s_bb')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">价格</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname"  name="s_oo" value="{{$student->s_oo}}"
				   placeholder="价格">
				   <b style="color:red">{{$errors->first('s_oo')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">库存</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname"  name="s_hh" value="{{$student->s_hh}}"
				   placeholder="库存">
				   <b style="color:red">{{$errors->first('s_hh')}}</b>

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio"  id="firstname"  name="s_yy" value="是" checked>是
			<input type="radio"  id="firstname"  name="s_yy"value="否">否

		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-10">
			<input type="radio"  id="firstname"  name="s_ff"value="是">是
			<input type="radio"  id="firstname"  name="s_ff"value="否" checked>否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-10">
			<input type="radio"  id="firstname"  name="s_uu" value="是" checked>是
			<input type="radio"  id="firstname"  name="s_uu"value="否">否
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

@endsection