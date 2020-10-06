
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
            <li class="layui-nav-item"><a href="/admin/index">用户</a></li>
            <li class="layui-nav-item"><a href="/reg">注册</a></li>
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
                <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1599902556704&di=fa116b4c08cb736842708c803e9b95d0&imgtype=0&src=http%3A%2F%2Fcdn.u2.huluxia.com%2Fg3%2FM02%2F75%2FB4%2FwKgBOVu5PQWAOMlbAAQmCKTTqVQ694.jpg" class="layui-nav-img">
                    {{session('admin')->admin_name}}
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <!-- <li class="layui-nav-item"><a href="">退了</a></li> -->
            <li class="layui-nav-item"><a href="{{url('/login')}}">退了</a></li>

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
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">商品管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/goods/create">添加商品</a></dd>
                        <dd><a href="/goods/index">商品列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/cate/create">添加分类</a></dd>
                        <dd><a href="/cate">分类列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">管理员管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/create">添加管理员</a></dd>
                        <dd><a href="/admin/index">管理员列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">菜单管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/menu/create">添加菜单</a></dd>
                        <dd><a href="/menu">菜单列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">角色管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/role/create">添加角色</a></dd>
                        <dd><a href="/role">角色列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">属性管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/type/create">添加属性</a></dd>
                        <dd><a href="/type">属性列表</a></dd>
                    </dl>
                </li>
                 <li class="layui-nav-item">
                    <a href="javascript:;">广告管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/create">添加广告位置</a></dd>
                        <dd><a href="/list">广告列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">广告</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/creates">添加广告</a></dd>
                        <dd><a href="/ad">广告列表</a></dd>
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
