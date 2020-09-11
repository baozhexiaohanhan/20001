@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')

<header>
    <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
    <div class="head-mid">
        <h1>会员登录</h1>
    </div>
</header>
<div class="head-top">

</div><!--head-top/-->
<form action="{{url('/admin/logindo')}}" method="post" class="reg-login">
    @csrf
    <b style="color: red">{{session('msg')}}</b>
    <div class="lrBox">
        <div class="lrList">用户名：<input type="text" placeholder="输入用户名" name="admin_name" /></div>
        <div class="lrList">密码：<input type="password" placeholder="输入密码" name="admin_pwd" /></div>
    </div><!--lrBox/-->
    <div class="lrSub">
        <input type="submit" value="立即登录" />
    </div>
</form><!--reg-login/-->
<div class="height1"></div>

</div><!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/index/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/index/js/bootstrap.min.js"></script>
<script src="/static/index/js/style.js"></script>
@endsection