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
            <span class="green-span" style="display:block" id="greenStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
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
            <span class="green-span" style="display:block" id="greenSellerNote">仅供商家自己看的信息</span></td>
          </tr>
        </tbody></table>
		</div>

			<div class="layui-tab-item">
               <div id="tabbody-div">
      <form enctype="multipart/form-data" action="" method="post" name="theForm" id="test">
        <!-- 鏈€澶ф枃浠堕檺鍒 -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
        <!-- 閫氱敤淇℃伅 -->
        <table width="90%" id="general-table" align="center" class="gk-table" style="display: none;">
          <tbody><tr>
            <td class="label">商品名称：</td>
            <td><input type="text" name="goods_name" value="闫博" style="float:left;color:;" size="30"><div style="background-color:;float:left;margin-left:2px;" id="font_color" onclick="ColorSelecter.Show(this);"><img src="images/color_selecter.gif" style="margin-top:-1px;"></div><input type="hidden" id="goods_name_color" name="goods_name_color" value="">&nbsp;
            <select name="goods_name_style">
              <option value="">字体样式</option>
              <option value="strong">加粗</option><option value="em">斜体</option><option value="u">下划线</option><option value="strike">删除线</option>            </select>
            <span class="require-field">*</span></td>
          </tr>
          <tr>
            <td class="label">
            <a href="javascript:showgreen('greenGoodsSN');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商品货号： </td>
            <td><input type="text" name="goods_sn" value="0009092" size="20" onblur="checkGoodsSn(this.value,'75')"><span id="goods_sn_green"></span><br>
            <span class="green-span" style="display:block" id="greenGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
          </tr>
          <tr>
            <td class="label">商品分类：</td>
            <td><select name="cat_id" onchange="hideCatDiv()"><option value="0">请选择...
            </option></select>
                            <button type="button" class="btn btn-def " onclick="rapidCatAdd()">添加分类</button>
              <span id="category_add" style="display:none;">
              <input type="text" class="text" size="10" name="addedCategoryName">
               <button type="button" class="btn btn-def " onclick="addCategory()" title=" 确定 "> 确定 </button>
               <button type="button" class="btn btn-def " onclick="return goCatPage()" title="分类管理">分类管理</button>
               <button type="button" class="btn btn-def " onclick="hideCatDiv()" title="隐藏">&lt;&lt;</button>
               </span>
                              <span class="require-field">*</span>            </td>
          </tr>
          <tr>
            <td class="label">扩展分类：</td>
            <td>
              <input type="button" value="添加" onclick="addOtherCat(this.parentNode)" class="button btn-def">
                            <select name="other_cat[]"><option value="0">请选择...</option></select>
                          </td>
          </tr>
          <tr>
            <td class="label">商品品牌：</td>
            <td><select name="brand_id" onchange="hideBrandDiv()"><option value="0">请选择...</option><option value="4" selected="">飞利浦</option><option value="5">夏新</option><option value="15">仓品</option><option value="16">西瓜</option></select>
                            <button type="button" class="btn btn-def " onclick="rapidBrandAdd()">添加品牌</button>
              <span id="brand_add" style="display:none;">
              <input type="text" class="text" size="15" name="addedBrandName">
               <button type="button" class="btn btn-def " onclick="addBrand()" title=" 确定 "> 确定 </button>
               <button type="button" class="btn btn-def " onclick="return goBrandPage()" title="品牌管理">品牌管理</button>
               <button type="button" class="btn btn-def " onclick="hideBrandDiv()" title="隐藏">&lt;&lt;</button>
               </span>
                           </td>
          </tr>
                   <tr>
            <td class="label">选择供货商：</td>
            <td><select name="suppliers_id" id="suppliers_id">
        <option value="0">不指定供货商属于本店商品</option>
        <option value="1" selected="">北京供货商</option><option value="2">上海供货商</option>      </select></td>
          </tr>
                   <tr>
            <td class="label">本店售价：</td>
            <td><input type="text" name="shop_price" value="90.00" size="20" onblur="priceSetted()">
            <input type="button" class="btn btn-def" value="按市场价计算" onclick="marketPriceSetted()">
            <span class="require-field">*</span></td>
          </tr>
                    <tr>
            <td class="label"><a href="javascript:showgreen('greenUserPrice');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>会员价格：</td>
            <td>
                            注册用户<span id="nrank_1">(90)</span><input type="text" id="rank_1" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(1)" size="8">
              <input type="hidden" name="user_rank[]" value="1">
                            代销用户<span id="nrank_3">(81)</span><input type="text" id="rank_3" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(3)" size="8">
              <input type="hidden" name="user_rank[]" value="3">
                            vip<span id="nrank_2">(85.5)</span><input type="text" id="rank_2" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(2)" size="8">
              <input type="hidden" name="user_rank[]" value="2">
                            <br>
              <span class="green-span" style="display:block" id="greenUserPrice">会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</span>
            </td>
          </tr>
          
          <!--鍟嗗搧浼樻儬浠锋牸-->
          <tr>
            <td class="label"><a href="javascript:showgreen('volumePrice');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>商品优惠价格：</td>
            <td>
              <table width="100%" id="tbody-volume" align="center">
                                <tbody><tr>
                  <td>
                                            <a href="javascript:;" onclick="addVolumePrice(this)">[+]</a>
                                          优惠数量 <input type="text" name="volume_number[]" size="8" value="3">
                     优惠价格 <input type="text" name="volume_price[]" size="8" value="2.00">
                  </td>
                </tr>
                              </tbody></table>
              <span class="green-span" style="display:block" id="volumePrice">购买数量达到优惠数量时享受的优惠价格</span>
            </td>
          </tr>
          <!--鍟嗗搧浼樻儬浠锋牸 end -->

          <tr>
            <td class="label">市场售价：</td>
            <td><input type="text" name="market_price" value="108.00" size="20">
              <input type="button" class="btn btn-def" value="取整数" onclick="integral_market_price()">
            </td>
          </tr>
          <tr>
            <td class="label">虚拟销量：</td>
            <td><input type="text" name="virtual_sales" value="0" size="20">
            </td>
          </tr>
          <tr>
            <td class="label"><a href="javascript:showgreen('giveIntegral');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 赠送消费积分数：</td>
            <td><input type="text" name="give_integral" value="-1" size="20">
            <br><span class="green-span" style="display:block" id="giveIntegral">购买该商品时赠送消费积分数,-1表示按商品价格赠送</span></td>
          </tr>
          <tr>
            <td class="label"><a href="javascript:showgreen('rankIntegral');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 赠送等级积分数：</td>
            <td><input type="text" name="rank_integral" value="-1" size="20">
            <br><span class="green-span" style="display:block" id="rankIntegral">购买该商品时赠送等级积分数,-1表示按商品价格赠送</span></td>
          </tr>
          <tr>
            <td class="label"><a href="javascript:showgreen('noticPoints');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 积分购买金额：</td>
            <td><input type="text" name="integral" value="10" size="20" onblur="parseint_integral()" ;="">
              <br><span class="green-span" style="display:block" id="noticPoints">(此处需填写金额)购买该商品时最多可以使用积分的金额</span>
            </td>
          </tr>
          <tr>
            <td class="label"><label for="is_promote"><input type="checkbox" id="is_promote" name="is_promote" value="1" onclick="handlePromote(this.checked);"> 促销价：</label></td>
            <td id="promote_3"><input type="text" id="promote_1" name="promote_price" value="0.00" size="20" disabled=""></td>
          </tr>
          <tr id="promote_4">
            <td class="label" id="promote_5">促销日期：</td>
            <td id="promote_6" class="cal-group">
              <input name="promote_start_date" type="text" id="promote_start_date" size="12" value="" readonly="readonly"><button type="button" class="cal" name="selbtn1" id="selbtn1" onclick="return showCalendar('promote_start_date', '%Y-%m-%d', false, false, 'selbtn1');" disabled=""><img src="images/cal.png" alt=""></button> - <input name="promote_end_date" type="text" id="promote_end_date" size="12" value="" readonly="readonly"><button type="button" class="cal" name="selbtn2" id="selbtn2" onclick="return showCalendar('promote_end_date', '%Y-%m-%d', false, false, 'selbtn2');" disabled=""><img src="images/cal.png" alt=""></button>
            </td>
          </tr>
          <tr>
            <td class="label">上传商品图片：</td>
            <td>
              <div class="upImg">
                
     
                  
                   <div class="img-inner">
                                            <img src="../images/202009/goods_img/75_G_1600690112106.jpg" alt="">
                    
                  </div>
                  <input type="file" name="goods_img" size="35" class="up-ipt" accept="image/png,image/gif,image/jpg,image/jpeg,image/bmp">
                 
              </div>
              <br><input type="text" size="40" value="商品图片外部URL" style="color:#aaa;" onfocus="if (this.value == '商品图片外部URL'){this.value='http://';this.style.color='#000';}" name="goods_img_url">
            </td>
          </tr>
          <tr id="auto_thumb_1">
            <td class="label"> 上传商品缩略图：</td>
            <td id="auto_thumb_3">
              <div class="upImg">
                <div class="img-inner">
                                          <img src="../images/202009/thumb_img/75_thumb_G_1600690112815.jpg" alt="">
                                     </div>
                <input type="file" size="35" name="goods_thumbs" class="up-ipt" accept="image/png,image/gif,image/jpg,image/jpeg,image/bmp">
         
              </div>
              <br><input type="text" size="40" value="商品缩略图外部URL" style="color:#aaa;" onfocus="if (this.value == '商品缩略图外部URL'){this.value='http://';this.style.color='#000';}" name="goods_thumb_url">
                            <br><label for="auto_thumb"><input type="checkbox" id="auto_thumb" name="auto_thumb" checked="true" value="1" onclick="handleAutoThumb(this.checked)">自动生成商品缩略图</label>
            </td>
          </tr>
        </tbody></table>

        <!-- 璇︾粏鎻忚堪 -->
        <table width="90%" id="detail-table" style="display: none;">
          <tbody><tr>
            <td><input type="hidden" id="goods_desc" name="goods_desc" value="<p>&amp;nbsp;哈哈哈</p>" style="display:none"><input type="hidden" id="goods_desc___Config" value="" style="display:none"><iframe id="goods_desc___Frame" src="../includes/fckeditor/editor/fckeditor.html?InstanceName=goods_desc&amp;Toolbar=Normal" width="100%" height="320" frameborder="0" scrolling="no" style="margin: 0px; padding: 0px; border: 0px; background-color: transparent; background-image: none; width: 100%; height: 320px;"></iframe></td>
          </tr>
        </tbody></table>

        <!-- 鍏朵粬淇℃伅 -->
        <table width="90%" id="mix-table" style="display: none;" align="center">
                    <tbody><tr>
            <td class="label">商品重量：</td>
            <td><input type="text" name="goods_weight" value="20.000" size="20"> <select name="weight_unit"><option value="1" selected="">千克</option><option value="0.001">克</option></select></td>
          </tr>
                              <tr>
            <td class="label"><a href="javascript:showgreen('greenStorage');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商品库存数量：</td>
<!--            <td><input type="text" name="goods_number" value="1" size="20" readonly="readonly" /><br />-->
            <td><input type="text" name="goods_number" value="1" size="20"><br>
            <span class="green-span" style="display:block" id="greenStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
          </tr>
          <tr>
            <td class="label">库存警告数量：</td>
            <td><input type="text" name="warn_number" value="1" size="20"></td>
          </tr>
                    <tr>
            <td class="label">加入推荐：</td>
            <td><input type="checkbox" name="is_best" value="1" checked="checked">精品 <input type="checkbox" name="is_new" value="1" checked="checked">新品 <input type="checkbox" name="is_hot" value="1" checked="checked">热销</td>
          </tr>
          <tr id="alone_sale_1">
            <td class="label" id="alone_sale_2">上架：</td>
            <td id="alone_sale_3"><input type="checkbox" name="is_on_sale" value="1" checked="checked"> 打勾表示允许销售，否则不允许销售。</td>
          </tr>
          <tr>
            <td class="label">能作为普通商品销售：</td>
            <td><input type="checkbox" name="is_alone_sale" value="1" checked="checked"> 打勾表示能作为普通商品销售，否则只能作为配件或赠品销售。</td>
          </tr>
          <tr>
            <td class="label">是否为免运费商品</td>
            <td><input type="checkbox" name="is_shipping" value="1"> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</td>
          </tr>
          <tr>
            <td class="label">商品关键词：</td>
            <td><input type="text" name="keywords" value="" size="40"> 用空格分隔</td>
          </tr>
          <tr>
            <td class="label">商品简单描述：</td>
            <td><textarea name="goods_brief" cols="40" rows="3"></textarea></td>
          </tr>
          <tr>
            <td class="label">
            <a href="javascript:showgreen('greenSellerNote');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商家备注： </td>
            <td><textarea name="seller_note" cols="40" rows="3"></textarea><br>
            <span class="green-span" style="display:block" id="greenSellerNote">仅供商家自己看的信息</span></td>
          </tr>
        </tbody></table>

        <!-- 灞炴€т笌瑙勬牸 -->
                <table width="90%" id="properties-table" style="display: table;" align="center">
          <tbody><tr>
              <td class="label"><a href="javascript:showgreen('greenGoodsType');" title="点击此处查看提示信息"><img src="images/green.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>商品类型：</td>
              <td>
                <select name="goods_type" onchange="getAttrList(75)">
                  <option value="0">请选择商品类型</option>
                  <option value="1">书</option><option value="2">音乐</option><option value="3">电影</option><option value="4" selected="true">手机</option><option value="5">笔记本电脑</option><option value="6">数码相机</option><option value="7">数码摄像机</option><option value="8">化妆品</option><option value="9">精品手机</option><option value="10">水果</option>                </select><br>
              <span class="green-span" style="display:block" id="greenGoodsType">请选择商品的所属类型，进而完善此商品的属性</span></td>
          </tr>
        </tbody></table>
        
        <!-- 鍟嗗搧鐩稿唽 -->
        <table width="90%" id="gallery-table" class="aaa" style="display:none" align="center">
          <!-- 鍥剧墖鍒楄〃 -->
          <tbody><tr>
            <td class="up-title">上传商品图片：</td>
            <td>
              <div class="upload-ul clearfix">
                  <input type="hidden" name="img_sn">
                  <ul class="pic-list">
                                    <li id="gallery_51" class="diyUploadHover list" data-imgid="51">
                    <div class="viewThumb">
                        <input type="hidden" name="img_url[]">
                        <p class="diyControl"><span class="diyLeft"><i></i></span><span class="diyCancel" onclick="if (confirm('您确实要删除该图片吗？')) dropImg('51')"><i></i></span><span class="diyRight"><i></i></span></p>
                        <img src="../images/202009/thumb_img/75_thumb_P_1600690112479.jpg">
                    </div>
                    <!-- <input type="text" value="" size="15" name="old_img_desc[51]" placeholder="商品缩略图外部URL" /><span class="fill-img">预览</span> -->
                  </li>
                                </ul>
                  <div class="upload-pick list">
                      <div class="webuploader-container clearfix" id="goodsUpload"><div class="webuploader-pick"></div><div id="rt_rt_1ej0014pr1ros118e1vm5vsm1ar91" style="position: absolute; top: 0px; left: 0px; width: 100px; height: 100px; overflow: hidden; bottom: auto; right: auto;"><input type="file" name="file" class="webuploader-element-invisible" multiple="multiple" accept=""><label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label></div></div>
                  </div>
              </div>
            </td>
          </tr>
          <tr><td>&nbsp;</td></tr>
          <!-- 涓婁紶鍥剧墖 -->
          <tr>
            <td>
              <!-- <a href="javascript:;" onclick="addImg(this)">[+]</a>
              图片描述 <input type="text" name="img_desc[]" size="20" />
              上传文件 <input type="file" name="img_url[]" />
              <input type="text" size="40" value="或者输入外部图片链接地址" style="color:#aaa;" onfocus="if (this.value == '或者输入外部图片链接地址'){this.value='http://';this.style.color='#000';}" name="img_file[]"/> -->
              <!-- <input type="file" name="img_file[]" accept="image/jpg,image/png,image/gif" multiple="multiple" > -->
            </td>
          </tr>
        </tbody></table>

        <!-- 鍏宠仈鍟嗗搧 -->
        <table width="90%" id="linkgoods-table" style="display:none" align="center">
          <!-- 鍟嗗搧鎼滅储 -->
          <tbody>
          <!-- 鍟嗗搧鍒楄〃 -->
          <tr>
            <th>可选商品</th>
            <th>操作</th>
            <th>跟该商品关联的商品</th>
          </tr>
          <tr>
            <td width="42%">
              <select name="source_select1" size="20" style="width:100%" ondblclick="sz1.addItem(false, 'add_link_goods', goodsId, this.form.elements['is_single'][0].checked)" multiple="true">
              </select>
            </td>
            <td align="center">
              <p><input name="is_single" type="radio" value="1" checked="checked">单向关联<br><input name="is_single" type="radio" value="0">双向关联</p>
              <p><input type="button" value=">>" onclick="sz1.addItem(true, 'add_link_goods', goodsId, this.form.elements['is_single'][0].checked)" class="button"></p>
              <p><input type="button" value=">" onclick="sz1.addItem(false, 'add_link_goods', goodsId, this.form.elements['is_single'][0].checked)" class="button"></p>
              <p><input type="button" value="<" onclick="sz1.dropItem(false, 'drop_link_goods', goodsId, elements['is_single'][0].checked)" class="button"></p>
              <p><input type="button" value="<<" onclick="sz1.dropItem(true, 'drop_link_goods', goodsId, elements['is_single'][0].checked)" class="button"></p>
            </td>
            <td width="42%">
              <select name="target_select1" size="20" style="width:100%" multiple="" ondblclick="sz1.dropItem(false, 'drop_link_goods', goodsId, elements['is_single'][0].checked)">
                              </select>
            </td>
          </tr>
        </tbody></table>

        <!-- 閰嶄欢 -->
        <table width="90%" id="groupgoods-table" style="display:none" align="center">
          <!-- 鍟嗗搧鎼滅储 -->
          <tbody>
          <!-- 鍟嗗搧鍒楄〃 -->
          <tr>
            <th>可选商品</th>
            <th>操作</th>
            <th>该商品的配件</th>
          </tr>
          <tr>
            <td width="42%">
              <select name="source_select2" size="20" multiple="" style="width:100%" onchange="sz2.priceObj.value = this.options[this.selectedIndex].id" ondblclick="sz2.addItem(false, 'add_group_goods', goodsId, this.form.elements['price2'].value)">
              </select>
            </td>
            <td align="center">
              <p>价格<br><input name="price2" type="text" size="6"></p>
              <p><input type="button" value=">" onclick="sz2.addItem(false, 'add_group_goods', goodsId, this.form.elements['price2'].value)" class="button"></p>
              <p><input type="button" value="<" onclick="sz2.dropItem(false, 'drop_group_goods', goodsId, elements['is_single'][0].checked)" class="button"></p>
              <p><input type="button" value="<<" onclick="sz2.dropItem(true, 'drop_group_goods', goodsId, elements['is_single'][0].checked)" class="button"></p>
            </td>
            <td width="42%">
              <select name="target_select2" size="20" style="width:100%" multiple="" ondblclick="sz2.dropItem(false, 'drop_group_goods', goodsId, elements['is_single'][0].checked)">
                              </select>
            </td>
          </tr>
        </tbody></table>

        <!-- 鍏宠仈鏂囩珷 -->
        <table width="90%" id="article-table" style="display:none" align="center">
          <!-- 鏂囩珷鎼滅储 -->
          <tbody><tr>
            <td colspan="3">
              <img src="images/icon_search.svg" width="26" height="22" border="0" alt="SEARCH">
              文章标题 <input type="text" name="article_title">
              <input type="button" value=" 搜索 " onclick="searchArticle()" class="button">
            </td>
          </tr>
          <!-- 鏂囩珷鍒楄〃 -->
          <tr>
            <th>可选文章</th>
            <th>操作</th>
            <th>跟该商品关联的文章</th>
          </tr>
          <tr>
            <td width="45%">
              <select name="source_select3" size="20" style="width:100%" multiple="" ondblclick="sz3.addItem(false, 'add_goods_article', goodsId, this.form.elements['price2'].value)">
              </select>
            </td>
            <td align="center">
              <p><input type="button" value=">>" onclick="sz3.addItem(true, 'add_goods_article', goodsId, this.form.elements['price2'].value)" class="button"></p>
              <p><input type="button" value=">" onclick="sz3.addItem(false, 'add_goods_article', goodsId, this.form.elements['price2'].value)" class="button"></p>
              <p><input type="button" value="<" onclick="sz3.dropItem(false, 'drop_goods_article', goodsId, elements['is_single'][0].checked)" class="button"></p>
              <p><input type="button" value="<<" onclick="sz3.dropItem(true, 'drop_goods_article', goodsId, elements['is_single'][0].checked)" class="button"></p>
            </td>
            <td width="45%">
              <select name="target_select3" size="20" style="width:100%" multiple="" ondblclick="sz3.dropItem(false, 'drop_goods_article', goodsId, elements['is_single'][0].checked)">
                              </select>
            </td>
          </tr>
        </tbody></table>
        <input type="hidden" name="act" value="update">
      </form>
    </div>
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


