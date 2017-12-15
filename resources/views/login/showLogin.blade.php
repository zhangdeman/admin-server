<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="管理后台">

    <title>管理后台</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{URL::asset('assets/js/jquery.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{URL::asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{URL::asset('assets/js/response.js')}}"></script>
    <![endif]-->
    <script src="{{URL::asset('js/admin/login-admin.js')}}"></script>

</head>

<body>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
    <div class="container">

        <form class="form-login">
            <h2 class="form-login-heading">管理员登录</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" id="admin-account" placeholder="手机号/邮箱" autofocus>
                <br>
                <input type="password" id="admin-password" class="form-control" placeholder="密码">
                <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> 忘记密码?</a>

		                </span>
                </label>
                <input type="hidden" value="{{csrf_token()}}" id="csrf_token">
                <button class="btn btn-theme btn-block" id="admin-login" type="button"><i class="fa fa-lock"></i>登录</button>
                <!--hr-->

                <div class="login-social-link centered hidden" id="show-op-result">
                    <!--p></p>
                    <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                    <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button-->
                </div>
                <!--div class="registration">
                    Don't have an account yet?<br/>
                    <a class="" href="#">
                        Create an account
                    </a>
                </div-->

            </div>

            <!-- Modal -->
            <!--div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div-->
            <!-- modal -->

        </form>

    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.backstretch.min.js')}}"></script>
<script>
    $.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script>


</body>
</html>
