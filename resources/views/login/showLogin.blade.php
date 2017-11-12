<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>管理员登录</title>

        <!-- CSS -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/bootstrap/css/form.css" rel="stylesheet">
        <link href="/bootstrap/css/style.css" rel="stylesheet">
        <link href="/bootstrap/css/animate.css" rel="stylesheet">
        <link href="/bootstrap/css/generics.css" rel="stylesheet">
    </head>
    <body id="skin-blur-violate">
        <section id="login">
            <header>
                <h1>管理员登录</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
            </header>

            <div class="clearfix"></div>

            <!-- Login -->
            <div id="loginCheck">
            <form method="post" action="doLogin" class="box tile animated active" id="box-login">
                <h2 class="m-t-0 m-b-15">登录</h2>
                <input type="text" class="login-control m-b-10" placeholder="手机号或邮箱" v-model="account_value">
                <input type="password" class="login-control" placeholder="密码" v-model="password_value">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox">
                        记住密码
                    </label>
                </div>
                <button class="btn btn-sm m-r-5">登录</button>

                <small>
                    <a class="box-switcher" data-switch="box-register" href="">没有账号?</a> or
                    <a class="box-switcher" data-switch="box-reset" href="">忘记密码?</a>
                </small>
            </form>
            </div>

                <!-- Register -->
                <form class="box animated tile" id="box-register">
                    <h2 class="m-t-0 m-b-15">Register</h2>
                    <input type="text" class="login-control m-b-10" placeholder="Full Name">
                    <input type="text" class="login-control m-b-10" placeholder="Username">
                    <input type="email" class="login-control m-b-10" placeholder="Email Address">
                    <input type="password" class="login-control m-b-10" placeholder="Password">
                    <input type="password" class="login-control m-b-20" placeholder="Confirm Password">

                    <button class="btn btn-sm m-r-5">Register</button>

                    <small><a class="box-switcher" data-switch="box-login" href="">Already have an Account?</a></small>
                </form>


            <!-- Forgot Password -->
            <form class="box animated tile" id="box-reset">
                <h2 class="m-t-0 m-b-15">Reset Password</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
                <input type="email" class="login-control m-b-20" placeholder="Email Address">

                <button class="btn btn-sm m-r-5">Reset Password</button>

                <small><a class="box-switcher" data-switch="box-login" href="">Already have an Account?</a></small>
            </form>
        </section>

        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="/bootstrap/js/jquery.min.js"></script> <!-- jQuery Library -->

        <!-- Bootstrap -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>

        <!--  Form Related -->
        <script src="/bootstrap/js/icheck.js"></script> <!-- Custom Checkbox + Radio -->

        <!-- All JS functions -->
        <script src="/bootstrap/js/functions.js"></script>

        <script src="/bootstrap/js/vue-2.5.2.js"></script>

        <script src="/bootstrap/js/page-/bootstrap/js/md5.js"></script>

        <script src="/bootstrap/js/page-/bootstrap/js/login.js"></script>

    </body>
</html>
