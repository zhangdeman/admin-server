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
        return self::curl('validate_token', $params);
    }

    /**
     * @param $params
     * @return bool
     * 登录
     */
    public static function adminLogin($params)
    {
        return self::curl('admin_login', $params);
    }

}
