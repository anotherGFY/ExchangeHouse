<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>登录奔跑贷</title>
        <meta name="description" content="" />
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="shortcut icon" href="assets/images/logo/logo-s.ico">
        <!-- text fonts -->
        <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
        <!-- login page styles -->
        <link href="for-page/login/css/supersized.css" rel="stylesheet" type="text/css"/>
        <link href="for-page/login/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="for-page/login/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="page-container">
            <h1>奔跑贷abc</h1>
            <form action="php/action/login/action-login.php" method="post">
                <input type="text" name="username" class="username" placeholder="手机号码">
                <input type="password" name="password" class="password" placeholder="密码">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
        <div align="center">Collect from <a href="#" target="_blank" title="注册">注册</a></div>
    </div>
    <!-- Javascript -->
    <script src="for-page/login/js/jquery-1.8.2.min.js"></script>
    <script src="for-page/login/js/supersized.3.2.7.min.js"></script>
    <script src="for-page/login/js/supersized-init.js"></script>
    <script src="for-page/login/js/scripts.js"></script>
</body>
</html>