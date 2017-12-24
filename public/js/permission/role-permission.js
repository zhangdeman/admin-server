var rolePermission = {
    init : function(){

    },

    setPermissionHtml : function () {
        $.ajax({
            type: 'GET',
            url: '/permission/',
            data: {
                'id'  : kindId
            },
            dataType: "json",
            success: function (data) {
                var code = data.error_code;
                var detail = data.data;
                if (code == 0) {
                    var htmlContent = "<div class=\"modal-dialog\">\n" +
                        "<div class=\"modal-header\">\n" +
                        "                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n" +
                        "                <h4 class=\"modal-title\">类别详情</h4>\n" +
                        "            </div>" +
                        "        <div class=\"modal-content\">\n" +
                        "            <table class=\"table table-hover\">\n" +
                        "                <thead>\n" +
                        "                <tr>\n" +
                        "                    <th>属性</th>\n" +
                        "                    <th>值</th>\n" +
                        "                </tr>\n" +
                        "                </thead>\n" +
                        "                <tbody>\n" +
                        "\n" +
                        "                    <tr>\n" +
                        "                        <td>类别ID</td>\n" +
                        "                        <td>"+detail.id+"</td>\n" +
                        "                    </tr>\n" +
                        "                    <tr>\n" +
                        "                        <td>标题</td>\n" +
                        "                        <td>"+detail.title+"</td>\n" +
                        "                    </tr>\n" +
                        "                    <tr>\n" +
                        "                        <td>状态</td>\n" +
                        "                        <td>"+detail.status+"</td>\n" +
                        "                    </tr>\n" +
                        "                    <tr>\n" +
                        "                        <td>父级ID</td>\n" +
                        "                        <td>"+detail.parent_id+"</td>\n" +
                        "                    </tr>\n" +
                        "                    <tr>\n" +
                        "                        <td>创建的管理员ID</td>\n" +
                        "                        <td>"+detail.create_admin_id+"</td>\n" +
                        "                    </tr>\n" +
                        "                    <tr>\n" +
                        "                        <td>创建时间</td>\n" +
                        "                        <td>"+detail.create_time+"</td>\n" +
                        "                    </tr>\n" +
                        "                </tbody>\n" +
                        "            </table>\n" +
                        "        </div>\n" +
                        "\n" +
                        "    </div>";
                    $(model).html(htmlContent);
                } else {

                }
            },
            error : function () {
                dealLoginAdmin._setLoginAdminErrorMsg("alert-danger", dealLoginAdmin.REQUEST_ERROR);
            }
        });
    },

    getListHtml : function () {

    }
};

function runRolePermission(roleId)
{
    alert(roleId);
}
