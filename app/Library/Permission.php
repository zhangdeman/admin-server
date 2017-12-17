<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/15
 * Time: 22:31
 */
namespace App\Library;
class Permission extends BaseLibrary
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function getLeftNav($params = array())
    {
        $nav = array(
            array(
                'title' =>  '用户管理',
                'href'  =>  '#',
                'son'   =>  array(
                    array(
                        'title' =>  '用户列表',
                        'href'  =>  '#',
                    ),

                    array(
                        'title' =>  '添加用户',
                        'href'  =>  '#',
                    ),
                ),
            ),
            array(
                'title' =>  '权限管理',
                'href'  =>  '#',
                'son'   =>  array(
                    array(
                        'title' =>  '权限列表',
                        'href'  =>  '#',
                    ),

                    array(
                        'title' =>  '添加权限',
                        'href'  =>  '/permission/showAddPermission',
                    ),
                ),
            ),
            array(
                'title' =>  '文章管理',
                'href'  =>  '#',
                'son'   =>  array(
                    array(
                        'title' =>  '文章列表',
                        'href'  =>  '#',
                    ),

                    array(
                        'title' =>  '添加文章',
                        'href'  =>  '/article/showAddArticle',
                    ),
                ),
            ),
        );
        return $nav;
    }
}