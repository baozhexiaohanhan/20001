<meta name="csrf-token" content="{{ csrf_token() }}">
<header>
    <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
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
        <div class="lrList">用户名：<input type="text"placeholder="用户名" name="admin_name" id="account"/></div>
        <div class="lrList">密码：<input type="password" placeholder="设置密码" name="admin_pwd" /></div>
        <div class="lrList">确认密码<input type="password" placeholder="确认密码" name="admin_pwd1"/></div>
    </div><!--lrBox/-->
    <div class="lrSub">
        <input type="submit" id="reg" value="立即注册" />
    </div>
</form><!--reg-login/-->
<div class="height1"></div>

</div><!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/index/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/index/js/bootstrap.min.js"></script>
<script src="/static/index/js/style.js"></script>
</body>
</html>

<script src="/static/jquery.js"></script>
<script>

</script>
