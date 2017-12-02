var article = {

    /**
     * 首次载入初始化
     */
    init : function () {

        //获取文章列表
        $.ajax({
            type: 'GET',
            url: '/article/getArticleKind',
            data: {

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
    }
};

//首次载入初始化
article.init();
