<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/20
 * Time: 20:49
 * id 生成器，生成唯一ID
 */
namespace App\Library;

class IdWorker extends BaseLibrary
{

    public static function getId()
    {
        $requestInfo = self::getRequestUrl('GET_ID');
        return self::curl($requestInfo['url'], $requestInfo['method']);
    }
}

?>