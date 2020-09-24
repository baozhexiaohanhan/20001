@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
	<center><h2>添加商品</h2></center>
<a href="{{url('/student/index')}}" type="button" class="btn btn-success">商品列表</a>

<form action="{{url('student/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
		@csrf
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
				
		</div>
			<div class="layui-tab-item">
			<textarea id="demo" style="display: none;" ></textarea>
			</div>
			  <div class="layui-tab-item">
		<table width="90%" id="mix-table" style="display: table;" class="layui-table" align="center">
                    <tbody><tr>
            <td class="green">商品重量：</td>
            <td><input type="text" name="goods_weight" value="" size="20"> <select name="weight_unit"><option value="1" selected="">千克</option><option value="0.001">克</option></select></td>
          </tr>
                              <tr>
            <td class="green">商品库存数量：</td>
<!--            <td><input type="text" name="goods_number" value="1" size="20"  /><br />-->
            <td><input type="text" name="goods_number" value="1" size="20"><br>
            <span class="notice-span" style="display:block" id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
          </tr>
          <tr>
            <td class="green">库存警告数量：</td>
            <td><input type="text" name="warn_number" value="1" size="20"></td>
          </tr>
                    <tr>
            <td class="green">加入推荐：</td>
            <td><input type="checkbox" name="is_best" value="1">精品 <input type="checkbox" name="is_new" value="1">新品 <input type="checkbox" name="is_hot" value="1">热销</td>
          </tr>
          <tr id="alone_sale_1">
            <td class="green" id="alone_sale_2">上架：</td>
            <td id="alone_sale_3"><input type="checkbox" name="is_on_sale" value="1" checked="checked"> 打勾表示允许销售，否则不允许销售。</td>
          </tr>
          <tr>
            <td class="green">能作为普通商品销售：</td>
            <td><input type="checkbox" name="is_alone_sale" value="1" checked="checked"> 打勾表示能作为普通商品销售，否则只能作为配件或赠品销售。</td>
          </tr>
          <tr>
            <td class="green">是否为免运费商品</td>
            <td><input type="checkbox" name="is_shipping" value="1"> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</td>
          </tr>
          <tr>
            <td class="green">商品关键词：</td>
            <td><input type="text" name="keywords" value="" size="40"> 用空格分隔</td>
          </tr>
          <tr>
            <td class="green">商品简单描述：</td>
            <td><textarea name="goods_brief" cols="40" rows="3"></textarea></td>
          </tr>
          <tr>
            <td class="green">
             商家备注： </td>
            <td><textarea name="seller_note" cols="40" rows="3"></textarea><br>
            <span class="notice-span" style="display:block" id="noticeSellerNote">仅供商家自己看的信息</span></td>
          </tr>
        </tbody></table>
		</div>

			<div class="layui-tab-item">
                <table>
                    <tr>
                        <td class="layui-form-label">商品类型：</td>
                        <td>
                            <select name="cat_id"  onchange="getAttrList(0)" lay-filter="demo" lay-verify="required">
                                <option value="0">请选择商品类型</option>
                                @foreach($type as $v)
                                    <option value="{{$v->cat_id}}">{{$v->cat_name}}</option>
                                @endforeach
                                </select>
                                    <br>
                            <span class="notice-span" style="display:block" id="noticeGoodsType">请选择商品的所属类型，进而完善此商品的属性</span></td>
                    </tr>
                    <tr>
                             <td id="tbody-goodsAttr" colspan="2" style="padding:0">
                                 <table width="100%"  id="attrTable"></table>

                             </td>
                    </tr>
                </table>
            </div>

			</div>
			<div class="layui-tab-item">内容5</div>
		</div>
		<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-info">添加</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
		</div>
	</div> 
</form>
<script src="/layui/layui.js"></script>
<script src="/layui/layui.all.js"></script>

<script>
layui.use(['element','layedit'], function(){
	var element = layui.element;
  var layedit = layui.layedit;
	layedit.set({
  	uploadImage: {
    	url: '/student/upload' //接口url
    	,type: 'post' //默认post
  	}
	});
  layedit.build('demo',{
  height: 300
   //设置编辑器高度
	}); //建立编辑器
});
</script>


@endsection


