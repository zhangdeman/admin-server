var articleKind = {

    init : function () {

        $("table tbody tr td button").click(function () {

            var thisInfo = $($("table tbody"));
            var hang = thisInfo.parent("tr").prevAll(); //prevAll()表示这个tr前面有多少个tr
            var lie = thisInfo.prevAll().length + 1;
            alert(lie);

            //期望弹出的模态框
            var model = $("table tbody tr td button").attr("href");

            //类型的ID
            var kindId = $("table tbody tr:nth-child(2) td:nth-child(1)").html();

            if ("#kindDetail" == model) {
                articleKind.kindDetail(model, kindId);
            } else if("#editKind" == model) {
                articleKind.editKind(model, kindId);
            } else if ("#deleteKind" == model) {
                articleKind.deleteKind(model, kindId);
            }

            lie = 0;
        });


    },

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
        alert(model)
    },

    deleteKind : function (model, kindId) {

    }
};

articleKind.init();