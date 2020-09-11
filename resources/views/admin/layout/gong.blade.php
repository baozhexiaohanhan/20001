
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="/brand/index">商品管理</a></li>
            <li class="layui-nav-item"><a href="/user/index">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">品牌管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/brand/brand">添加品牌</a></dd>
                        <dd><a href="/brand/index">品牌列表</a></dd>
                        <dd><a href="/student/create">添加商品</a></dd>
                        <dd><a href="/student/index">商品列表</a></dd>
                        <dd><a href="/cate/create">添加分类</a></dd>
                        <dd><a href="/cate">分类列表</a></dd>
                        <dd><a href="">超链接</a></dd>

                        {{--<dd><a href="">超链接</a></dd>--}}
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">商品管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/student/create">添加商品</a></dd>
                        <dd><a href="/student/index">商品列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/cate/create">添加分类</a></dd>
                        <dd><a href="/cate">分类列表</a></dd>
                    </dl>
                </li>
               
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">@yield('content')</div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>
