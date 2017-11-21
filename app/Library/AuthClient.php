<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/18
 * Time: 12:10
 */
namespace App\Library;
class AuthClient extends BaseLibrary
{
    public function __construct()
    {

    }

    /**
     * 验证管理员身份
     * @param $params
     * @return string
     */
    public static function checkAdminInfo($params)
    {
        $params = self::formatParams($params);
        $requestInfo = self::getRequestUrl('CHECK_ADMIN_INFO');
        $params['sign'] = self::genSign($params);

        self::curl($requestInfo['url'], $requestInfo['method'], $params);

        return '';
    }


}
