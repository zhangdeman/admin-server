var dealAddAdmin = {
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
    _setAddAdminErrorMsg : function(level, msg) {
        $("#show-op-result").removeClass('hidden');
        $("#show-op-result").html("<div class=\"alert " + level + "\">\n" + msg + ".</div>");
    },


    /**
     * 点击提交表单，触发事件
     */
    submitClick : function () {
        $("#add-admin-button").click(function () {
            var adminRealName = $("#admin-real-name").val();
            var adminNickname = $("#admin-nickname").val();
            var adminRole = $("#admin-role option:selected").val();
            var adminPassword = $("#admin-password").val();
            var adminConfirmPassword = $("#admin-confirm-password").val();
            var adminMail = $("#admin-mail").val();
            var adminPhone = $("#admin-phone").val();
            var adminRemark = $("#admin-remark").val();
            var _token = $("#csrf_token").val();
            if ("" == _token || undefined == _token) {
                dealAddAdmin._setAddAdminErrorMsg("alert-danger", dealAddAdmin.EXCEPTION_REQUEST);
                return false;
            }
            if (adminPassword != adminConfirmPassword) {
                dealAddAdmin._setAddAdminErrorMsg("alert-warning", dealAddAdmin.DIFF_PASSWORD);
                return false;
            }

            //验证不能为空的数据
            var validate = [
                [adminRealName, dealAddAdmin.REQUIRE_ADMIN_NAME],
                [adminNickname, dealAddAdmin.REQUIRE_ADMIN_NICKNAME],
                [adminRole, dealAddAdmin.REQUIRE_ADMIN_ROLE],
                [adminPassword, dealAddAdmin.REQUIRE_ADMIN_PASSWORD],
                [adminMail, dealAddAdmin.REQUIRE_ADMIN_MAIN],
                [adminPhone, dealAddAdmin.REQUIRE_ADMIN_PHONE]
            ];
            var validateLen = validate.length;
            for (var index = 0; index < validateLen; index++) {
                if ("" == validate[index][0]) {
                    dealAddAdmin._setAddAdminErrorMsg("alert-warning", validate[index][1]);
                    return false;
                }
            }

            $.ajax({
                headers: { 'X-CSRF-TOKEN' : _token },
                type: 'POST',
                url: '/doAddAdmin',
                data: {
                    'name'  : adminRealName,
                    'nickname' : adminNickname,
                    'role' : adminRole,
                    'phone' : adminPhone,
                    'mail' : adminMail,
                    'password' : md5(adminPassword),
                    'confirm_password' : md5(adminConfirmPassword),
                    '_token' : _token,
                    'remark' : adminRemark,
                },
                dataType: "json",
                success: function (data) {
                    if (data.error_code && data.error_code == 0) {
                        dealAddAdmin._setAddAdminErrorMsg("alert-success", dealAddAdmin.REQUEST_SUCCESS);
                    } else {
                        dealAddAdmin._setAddAdminErrorMsg("alert-danger", data.error_msg+data.error_code);
                    }
                },
                error : function () {
                    dealAddAdmin._setAddAdminErrorMsg("alert-danger", dealAddAdmin.REQUEST_ERROR);
                }
            });

        });
    }

}

dealAddAdmin.submitClick();