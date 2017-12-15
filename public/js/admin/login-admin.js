var dealLoginAdmin = {
    EXCEPTION_REQUEST : "非法请求，请谨慎操作",
    REQUEST_ERROR : "请求出错，联系开发者",
    REQUEST_SUCCESS : "操作成功",
    DIFF_PASSWORD   : "两次输入的密码不一致",
    REQUIRE_ADMIN_NAME : "管理员姓名必须填写",
    REQUIRE_ADMIN_NICKNAME : "管理员昵称必须填写",
    REQUIRE_ADMIN_ROLE : "管理员角色必须填写",
    REQUIRE_ADMIN_PASSWORD : "登录密码必须填写",
    REQUIRE_ADMIN_MAIN : "管理员邮箱必须填写",
    REQUIRE_ADMIN_PHONE : "管理员手机号必须填写",

    /**
     * 参数验证是设置错误信息／ 请求结果设置错误信息
     * @param level
     * @param msg
     */
    _setLoginAdminErrorMsg : function(level, msg) {
        $("#show-op-result").removeClass('hidden');
        $("#show-op-result").html("<p>" + msg + ".</p>");
    },


    /**
     * 点击提交表单，触发事件
     */
    submitClick : function () {
        $("#admin-login").click(function () {
            var account = $("#admin-account").val();
            var password = $("#admin-password").val();

            var _token = $("#csrf_token").val();

            $.ajax({
                headers: { 'X-CSRF-TOKEN' : _token },
                type: 'POST',
                url: '/doLogin',
                data: {
                    'account'  : account,
                    'password' : md5(password),
                    '_token' : _token
                },
                dataType: "json",
                success: function (data) {
                    var code = data.error_code;
                    if (code == 0) {
                        Cookie._setCookie('deman_club_token', data.data.token);
                        window.location.href = '/index';
                    } else {
                        dealLoginAdmin._setLoginAdminErrorMsg("alert-danger", data.error_msg+data.error_code);
                    }
                },
                error : function () {
                    dealLoginAdmin._setLoginAdminErrorMsg("alert-danger", dealLoginAdmin.REQUEST_ERROR);
                }
            });

        });
    }

};

dealLoginAdmin.submitClick();