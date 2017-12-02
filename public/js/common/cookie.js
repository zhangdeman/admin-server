var Cookie = {
    /**
     * 设置cookie
     * @param key
     * @param value
     * @private
     */
    _setCookie : function (key, value) {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days*24*60*60*1000);
        document.cookie = key + "="+ escape (value) + ";expires=" + exp.toGMTString();
    },
    
    _getCookie : function (key) {
        var arr,reg=new RegExp("(^| )"+key+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    },
    
    _delCookie : function (key) {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval=this._getCookie(key);
        if(cval!=null)
            document.cookie= key + "="+cval+";expires="+exp.toGMTString();
    }
}