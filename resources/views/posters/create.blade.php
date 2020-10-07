@extends('layout.layout')
@section('title', '广告位列表')
@section('content')
<form action="{{url('/posters/store')}}" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">

{{--        <form class="layui-form layui-form-pane" action="/adver/store" method="POST" enctype="multipart/form-data">--}}
            @if (session('msg'))
                <div class="layui-form" style="color:red">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="layui-form-item">
                <label class="layui-form-label">广告名称</label>
                <div class="layui-input-block">
                    <input type="text" name="ad_name" autocomplete="off" placeholder="请输入广告名称" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">广告位置</label>
                <div class="layui-input-inline">
                    <select name="position_id" lay-verify="required" lay-search="">
                        <option value="0">请选择</option>
                        @foreach($position as $k=>$v)
                            <option value="{{$v->position_id}}">{{$v->position_name}}</option>
                        @endforeach
                        </select>
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">媒介类型</label>
                <div class="layui-input-inline">
                    <select name="media_type" lay-verify="required" lay-search="">
                        <option value="0">请选择</option>
                        <option value="1">图片</option>
                        <option value="2">Flash</option>
                        <option value="3">代码</option>
                        <option value="4">文字</option>
                        </select>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">开始时间</label>
                    <div class="layui-input-block">
                        <input type="text" name="start_time" id="date1" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>


            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">结束时间</label>
                    <div class="layui-input-block">
                        <input type="text" name="end_time" id="date" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">广告链接</label>
                <div class="layui-input-block">
                    <input type="text" name="ad_link" autocomplete="off" placeholder="请输入广告链接" class="layui-input">
                </div>
            </div>


            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">广告图片</label>
                <div class="layui-upload-drag" id="test1">
                    <input type="hidden" id="fileview1" name="ad_imgs" value="">
                    <i class="layui-icon"></i>
                    <p>点击上传，或将文件拖拽到此处</p>
                    <div class="layui-hide" id="uploadDemoView1">
                        <hr>
                        <img src="" alt="上传成功后渲染" style="max-width: 196px">
                    </div>
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">是否开启</label>
                <div class="layui-input-block">
                    <input type="radio" name="enabled" value="1" title="开启" checked="">
                    <input type="radio" name="enabled" value="0" title="关闭">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">联系人姓名</label>
                <div class="layui-input-inline">
                    <input type="text" name="link_man" lay-verify="required" placeholder="请输入联系人姓名" autocomplete="off" class="layui-input">
                </div>
            </div>


            <div class="layui-form-item">
                <label class="layui-form-label">联系人email</label>
                <div class="layui-input-inline">
                    <input type="text" name="link_email" lay-verify="required" placeholder="请输入联系人email" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">联系人手机号</label>
                <div class="layui-input-inline">
                    <input type="text" name="link_phone" lay-verify="required" placeholder="请输入联系人手机号" autocomplete="off" class="layui-input">
                </div>
            </div>

            <center><div>
                    <button type="submit" class="layui-btn">添加</button>
                            <button type="reset" class="layui-btn layui-btn-danger">重置</button>
                </div></center>
</form>

@endsection
