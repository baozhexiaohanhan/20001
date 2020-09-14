@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')

    <center><h1>添加权限管理<a style="float:right" href="{{url('/rele/index')}}" type="button" class="btn btn-info">列表</a></h1></center><hr/>
    <form action="{{url('/rele/index')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="brand_name"
                       placeholder="请输入权限名称">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">模块</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="firstname" name="brand_url"
                       placeholder="请输入模块">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">控制器</label>
            <div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="brand_desc"
                      placeholder="请输入控制器"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">方法</label>
            <div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="brand_desc"
                      placeholder="请输入方法"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">路由别名</label>
            <div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="brand_desc"
                      placeholder="请输入路由别名"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
    <script src="/layui/layui.js"></script>
    <script src="/layui/layui.all.js"></script>

    <script>
        layui.use('element', function() {
            var element = layui.element;
        });
        layui.use('upload', function(){
            var $ = layui.jquery
                ,upload = layui.upload;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //拖拽上传
            upload.render({
                elem: '#test10'
                ,url: 'http://www.blog.com/brand/uploads' //改成您自己的上传接口
                ,done: function(res){
                    layer.msg(res.msg);
                    layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.data);
                    console.log(res)
                    layui.$('input[name="brand_logo"]').attr('value',res.data);
                }
            });
        });




    </script>



@endsection
