
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="./layui/css/layui.css" media="all" />
    <link rel="stylesheet" type="text/css" href="/admin/css/login.css" />
</head>
<body class="beg-login-bg">
    <div class="beg-login-box">
        <header>
              <h1><font color="red">登录</font></h1>
        </header>
        <div class="beg-login-main">
             <center><b style="color: red">{{session('msg')}}</b></center>
            <form action="{{url('/admin/logindo')}}" class="layui-form" method="post">
                <div class="layui-form-item">
                    <label class="beg-login-icon">
                        <i class="layui-icon">&#xe612;</i>
                    </label>
                    <input type="text" lay-verify="required" name="admin_name" autocomplete="off" placeholder="这里输入账号" class="layui-input" lay-verType="tips">
                </div>
                <div class="layui-form-item">
                    <label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
                    <input type="password" lay-verify="required" name="pwd" autocomplete="off" placeholder="这里输入密码" class="layui-input" lay-verType="tips">
                </div>
                <div class="layui-form-item">
                    <div class="beg-pull">
                        <button type="submit" class="layui-btn layui-btn-normal" style="width:100%;">
                            登　　录
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <footer>
            <p>power by dw © </p>
        </footer>
    </div>
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="./layui/layui.js"></script>
    <script type="text/javascript" src="/admin/js/login.js"></script>
</body>
</html>

<script type="text/javascript"></script>