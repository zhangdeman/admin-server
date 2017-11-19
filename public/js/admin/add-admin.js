$("#add-admin-button").click(function () {
    var adminRealName = $("#admin-real-name").val();
    var adminNickname = $("#admin-nickname").val();
    var adminRole = $("#admin-role option:selected").val();
    var adminPassword = $("#admin-password").val();
    var adminConfirmPassword = $("#admin-confirm-password").val();
    var adminMail = $("#admin-mail").val();
    var adminPhone = $("#admin-phone").val();
    var adminRemark = $("#admin-remark").val();
    if (adminPassword != adminConfirmPassword) {
        alert("两次输入密码不一致");
        return false;
    }

    //验证不能为空的数据
    var validate = [
        [adminRealName, "管理员真实姓名必须填写"],
        [adminNickname, "管理员昵称必须填写"],
        [adminRole, "管理员角色必须填写"],
        [adminPassword, "密码必须填写"],
        [adminMail, "管理员邮箱必须填写"],
        [adminPhone, "管理员手机号必须填写"]
    ];
    var validateLen = validate.length;
    for (var index = 0; index < validateLen; index++) {
        if ("" == validate[index][0]) {
            alert(validate[index][1]);
            return false;
        }
    }

});