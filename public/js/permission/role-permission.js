var rolePermission = {
    init : function(){

    },

    setPermissionHtml : function (roleId) {
        $.ajax({
            type: 'GET',
            url: '/permission/adminPermissionList',
            data: {
                'role_id'  : roleId
            },
            dataType: "json",
            success: function (data) {
                var code = data.error_code;
                var list = data.data;
                console.log(list);
                var htmlContent = rolePermission.getListHtml(roleId, list);
                $("#rolePermissionDetail").html(htmlContent);

            },
            error : function () {

            }
        });
    },

    getListHtml : function (roleId, permissionList) {
        var html = "<div class=\"modal-dialog\">\n" +
            "        <div class=\"modal-content\">\n" +
            "            <div class=\"modal-header\">\n" +
            "                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n" +
            "                <h4 class=\"modal-title\">授权</h4>\n" +
            "            </div>"+
            "<section>\n" +
            "    <div class=\"row mt\">\n" +
            "        <div class=\"col-lg-12\">\n" +
            "            <div class=\"form-panel\">\n" +
            "                <h4 class=\"mb\"><i class=\"fa fa-angle-right\"></i>角色授权</h4>\n";



        var index = permissionList[0];
        var indexLen = index.length;
        for (var len = 0; len < indexLen; len++) {
            html += "                <div class=\"checkbox\">\n" +
                "                    <label>\n" +
                "                        <input type=\"checkbox\" value=\""+index[len].id+"\">\n" + index[len].name +
                "                    </label>\n" +
                "                </div>\n";

                var sonKey = index[len].id;
                var son = permissionList[sonKey];
                html += "                <div class=\"checkbox\">\n";
                if (undefined == son) {
                    //说明没有子权限
                    html += "</div><hr>";
                    continue;
                }
                var sonLen = son.length;
                for (var sonLenTmp = 0; sonLenTmp < sonLen; sonLenTmp++) {
                    html += "                    <label>\n" +
                        "                        <input type=\"checkbox\" value=\""+son[sonLenTmp].id+"\">\n" + son[sonLenTmp].name +
                        "                    </label>\n";
                }

            html += "                </div><hr>\n";
        }

        html += "</div>\n" +
            "    </div> "+
            "<div  class=\"form-panel\">"+
            "                    <label>\n" +
            "                                <button class=\"btn btn-success btn-xs\"  name=\"authPermission\" id=\"authPermission\" onclick=\"authPermission("+roleId+")\">授权</button>\n" +
            "                    </label>\n" +
            "                </div>\n" +
            "        </div><!-- /col-lg-12 -->\n" +


            "</section>" +
            "</div></div><! --/wrapper -->";

        return html;
    }
};

function runRolePermission(roleId)
{
    rolePermission.setPermissionHtml(roleId)
}

function authPermission(roleId) {
    var chk_value =[];
    $('section input[type="checkbox"]:checked').each(function(){
        chk_value.push($(this).val());
    });
    alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value);
}
