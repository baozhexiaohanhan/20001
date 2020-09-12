@extends('admin.layout.gong')
@section('title', '登录')
@section('content')

<header>
    <!-- <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a> -->
    <a style="float:right" href="{{url('/reg')}}" type="button" class="btn btn-info">注册</a>
    <div class="head-mid">
        <h1>会员登录</h1>
    </div>
</header>
<div class="head-top">

</div><!--head-top/-->
<form action="{{url('/admin/logindo')}}" method="post" class="reg-login">
    @csrf
    <b style="color: red">{{session('msg')}}</b>
    <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">用户名:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="admin_name" id="firstname" 
           placeholder="请输入用户名">
    </div>
  </div>
  <hr>
  <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">密码:</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" name="admin_pwd" id="firstname" 
           placeholder="请输入密码">
    </div>
    </div>
 <hr>
    <div class="lrSub">
        <input type="submit" class="btn btn-success" value="立即登录" />
    </div>
</form><!--reg-login/-->
<div class="height1"></div>

</div><!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- {{--<script src="/static/index/js/jquery.min.js"></script>--}} -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- {{--<script src="/static/index/js/bootstrap.min.js"></script>--}} -->
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<!-- {{--<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>--}} -->
@endsection