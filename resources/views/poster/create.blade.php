@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
    <span class="layui-breadcrumb" >
  <a href="/admin/index">首页</a>
  <a href="javascript:;">广告管理</a>
  <a><cite>广告添加</cite></a>
</span>
    @if ($errors->any())
        <div class="alert alert-danger" style=' margin-top:10px;padding-left:20px;padding-top:10px;padding-bottom:10px; background-color:pink;'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:#ff0000; margin-top:6px;">.{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{url('/poster/store')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">广告位名称</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="position_name"
                       placeholder="请输入品牌网址">
            </div>
        </div>

          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">广告位宽度</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="ad_width"
                       placeholder="请输入广告位名称">
            </div>
        </div>
          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">广告位高度</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="ad_height"
                       placeholder="请输入广告位高度">
            </div>
        </div>

           <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">广告位描述</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="position_desc"
                       placeholder="请输入广告位高度">
            </div>
        </div>
         <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">广告模板</label>
            <div class="col-sm-8">
      <textarea type="text" class="form-control" id="firstname" name="position_style"
                      placeholder="请输入广告模板"></textarea>
            </div>
        </div>

        <button type="submit" style="margin-left:35px; margin-top:10px;" class="layui-btn">添加</button>
    </form>

@endsection

