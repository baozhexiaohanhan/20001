@extends('admin.layout.gong')
@section('title', '注册')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- <center><h1>注册<a style="float:right" href="{{url('/login')}}" type="button" class="btn btn-info">登录</a></h1></center><hr/> -->
<header>
    <!-- <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a> -->
    <a style="float:right" href="{{url('/login')}}" type="button" class="btn btn-info">登录</a>
    <div class="head-mid">
      <h1>会员注册</h1>
    </div>
</header>
<div class="head-top">

</div><!--head-top/-->
<form action="{{url('/admin/Doreg')}}" method="post" class="reg-login" id="myform">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <b style="color: red">{{session('msg')}}</b>
    <div class="lrBox">
    <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">用户名:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="admin_name" id="account" 
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
    <div class="form-group">
    <label for="firstname" class="col-sm-1 control-label">确认密码:</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" name="admin_pwd1" id="firstname" 
           placeholder="请确认密码">
    </div>
    </div>
<hr>
    </div><!--lrBox/-->
    <div class="lrSub">
        <input type="submit" class="btn btn-success" id="reg" value="立即注册" />
    </div>
</form><!--reg-login/-->
<div class="height1"></div>

</div><!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="/layui/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script src="/layui/bootstrap.min.js"></script>
<script src="/layui/style.js"></script> -->
<!-- </body>
</html> -->

<!-- <script src="/static/jquery.js"></script> -->
<script>

</script>
@endsection
