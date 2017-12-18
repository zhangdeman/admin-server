var articleKind = {

    init : function () {

        $("table tbody tr td button").click(function () {
            var model = $("table tbody tr td button").attr("href");

            //类型的ID
            var kindId = $("table tbody tr td:nth-child(1)").html();

            if ("#kindDetail" == model) {
                articleKind.kindDetail(kindId);
            } else if("#editKind" == model) {
                articleKind.editKind(kindId);
            } else if ("#deleteKind" == model) {
                articleKind.deleteKind(kindId);
            }
        });


    },

    kindDetail : function (kindId) {

    },

    editKind : function (kindId) {

    },

    deleteKind : function (kindId) {

    }
};

articleKind.init();