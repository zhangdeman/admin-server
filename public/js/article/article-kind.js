var articleKind = {

    init : function (kindId, type) {

        var model = "";
        switch (type) {
            case "detail" :
                model = "#kindDetail";
                break;
            case "edit":
                model = "#editKind";
                break;
            case "delete":
                model = "#deleteKind";
                break;
            default:
        }
        if ("#kindDetail" == model) {
            articleKind.kindDetail(model, kindId);
        } else if("#editKind" == model) {
            articleKind.editKind(model, kindId);
        } else if ("#deleteKind" == model) {
            articleKind.deleteKind(model, kindId);
        }

    },

    //类别详情
    kindDetail : function (model, kindId) {
        $.ajax({
            type: 'GET',
            url: '/article/articleKindDetail',
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

    editKind : function (model, kindId) {
        $.ajax({
            type: 'GET',
            url: '/article/articleKindDetail',
            data: {
                'id'  : kindId
            },
            dataType: "json",
            success: function (data) {
                var code = data.error_code;
                var detail = data.data;
                if (code == 0) {
                    var htmlContent = "<div class=\"modal-dialog\">\n" +
                        "<h4 class=\"mb\"><i class=\"fa fa-angle-right\"></i>类别</h4>\n" +
                        "                        <form class=\"form-horizontal style-form\" method=\"post\" action=\"/article/addArticleKind\">\n" +
                        "                            <div class=\"form-group\">\n" +
                        "                                <label class=\"col-sm-2 col-sm-2 control-label\">标题</label>\n" +
                        "                                <div class=\"col-sm-10\">\n" +
                        "                                    <input type=\"text\" name=\"title\" class=\"form-control\">\n" +
                        "                                </div>\n" +
                        "                            </div>\n" +
                        "\n" +
                        "                            <div class=\"form-group\">\n" +
                        "                                <label class=\"col-sm-2 col-sm-2 control-label\">父分类</label>\n" +
                        "                                <div class=\"col-sm-10\">\n" +
                        "                                    <select name=\"parent_id\" class=\"form-control col-sm-10\">\n" +
                        "                                        <option value=\"{{$article_kind['id']}}\">{{$article_kind['title']}}</option>\n" +
                        "                                        @foreach($article_kind['module'] as $item)\n" +
                        "                                            <option value=\"{{$item['id']}}\">{{$item['title']}}</option>\n" +
                        "                                            @foreach($item['type'] as $single)\n" +
                        "                                                <option value=\"{{$single['id']}}\">{{$single['title']}}</option>\n" +
                        "                                            @endforeach\n" +
                        "                                        @endforeach\n" +
                        "                                    </select>\n" +
                        "                                </div>\n" +
                        "                            </div>\n" +
                        "                            <input type=\"hidden\" name=\"_token\" value=\"{{csrf_token()}}\">\n" +
                        "                            <button type=\"submit\" class=\"btn btn-theme\">发布</button>\n" +
                        "                        </form>"+
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

    deleteKind : function (model, kindId) {

    }
};

function kindOnclickEvent(kindId, type) {
    articleKind.init(kindId, type);
}
