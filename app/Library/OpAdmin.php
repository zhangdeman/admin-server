<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/25
 * Time: 11:10
 */
namespace App\Library;
class OpAdmin extends BaseLibrary
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function addAdmin($adminInfo)
    {
        $adminInfo = self::formatParams($adminInfo);
        return self::curl('add_admin', $adminInfo);
    }
}