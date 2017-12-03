var article = {

    /**
     * 首次载入初始化
     */
    init : function () {
        //注册添加文章事件
        article._addArticle();
        var adminToken = Cookie._getCookie('deman_club_token');

        //获取文章列表
        $.ajax({
            type: 'GET',
            url: '/article/getArticleKind',
            data: {
                'admin_token' : adminToken,
            },
            dataType: "json",
            success: function (data) {
                var kindList = data.data;
                article._setParentKind(kindList);
                article._setSonKind(kindList, 1);
                article._selectOnChanged(kindList, 1);
            },
            error : function () {

            }
        });

    },

    /**
     * 设置父类型
     * @private
     */
    _setParentKind : function (kindList) {

        var listLen = kindList.length;
        var option = '';
        for (var index = 0; index < listLen; index++) {
            option += "<option value=\"" + kindList[index]['value'] + "\">" + kindList[index]['name'] + "</option>"
        }

        $("#parent-kind").html(option);

    },

    /**
     * 设置子选项
     * @param parentKindValue
     * @private
     */
    _setSonKind : function (kindList, parentKindValue) {
        var sonList = [];
        var len = kindList.length;
        for (var index = 0; index < len; index++) {
            if (parentKindValue == kindList[index]['value']) {
                sonList = kindList[index]['son'];
                break;
            }
        }

        var sonListLen = sonList.length;
        var option = "";
        for (var sonIndex = 0; sonIndex < sonListLen; sonIndex++) {
            option += "<option value=\"" + sonList[sonIndex]['value'] + "\">" + sonList[sonIndex]['name'] + "</option>"
        }

        $("#son-kind").html(option);
    },

    /**
     * 父选项发生变化时触发事件
     * @private
     */
    _selectOnChanged : function (kindList) {
        $("#set-parent-kind").change(function(){
            var parentKindValue = $("#parent-kind").val();
            article._setSonKind(kindList, parentKindValue);
        });
    },

    /**
     * 点击添加文章时触发事件
     * @private
     */
    _addArticle : function () {
        $("#add-article").click(function () {

            //获取token
            var adminToken = Cookie._getCookie('deman_club_token');
            if ('' == adminToken || undefined == adminToken || null == adminToken) {
                article._setAddArticleErrorMsg('alert-danger', '登录已过期，请登录后操作');
                return false;
            }

            var _token = $("#csrf_token").val();

            var isHasContent = UE.getEditor('container').hasContents();
            if (false == isHasContent) {
                //正文内容为空
                return false;
            }
            var title = $("#article-title").val();
            var parentKind = $("#parent-kind").val();
            var sonKind = $("#son-kind").val();
            var htmlContent = UE.getEditor('container').getContent();
            var textContent = UE.getEditor('container').getContentTxt();
            //获取文章列表
            $.ajax({
                headers: { 'X-CSRF-TOKEN' : _token },
                type: 'POST',
                url: '/article/addArticle',
                data: {
                    "title" : title,
                    "parent_kind" : parentKind,
                    "son_kind"  : sonKind,
                    "plain_content" : htmlContent,
                    "text_content" : textContent,
                    "admin_token"   : adminToken
                },
                dataType: "json",
                success: function (data) {
                    var kindList = data.data;
                    article._setParentKind(kindList);
                    article._setSonKind(kindList, 1);
                    article._selectOnChanged(kindList, 1);
                },
                error : function () {

                }
            });
        });
    },

    /**
     * 参数验证是设置错误信息／ 请求结果设置错误信息
     * @param level
     * @param msg
     */
    _setAddArticleErrorMsg : function(level, msg) {
        $("#show-op-result").removeClass('hidden');
        $("#show-op-result").html("<div class=\"alert " + level + "\">\n" + msg + ".</div>");
    },
};

//首次载入初始化
article.init();
