<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/15
 * Time: 22:31
 */
namespace App\Library;
class PermissionLib extends BaseLibrary
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

                    array(
                        'title' =>  '角色列表',
                        'href'  =>  '/admin/adminRoleList',
                    ),

                    array(
                        'title' =>  '角色授权',
                        'href'  =>  '/permission/showAuthAdminPermission',
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

                    array(
                        'title' =>  '类型列表',
                        'href'  =>  '/article/articleKindList',
                    ),

                    array(
                        'title' =>  '添加类型',
                        'href'  =>  '/article/showAddArticleKind',
                    ),
                ),
            ),
        );
        return $nav;
    }

    /**
     * 获取权限列表
     * @param $params
     * @return bool
     */
    public static function getPermissionList($params)
    {
        $list = self::curl('get_permission_list', $params);
        if (empty($list)) {
            return array();
        }

        foreach ($list['list'] as &$item) {
            $item['create_time'] = date('Y-m-d H:i:s', $item['create_time']);
            $item['update_time'] = date('Y-m-d H:i:s', $item['update_time']);
        }

        return $list;
    }

    /**
     * 添加权限
     * @param $params
     * @return bool
     */
    public static function addPermission($params)
    {
        $result = self::curl('add_permission', $params);
        return $result;
    }

    /**
     * 获取角色权限列表
     * @param $params
     * @return array|bool
     */
    public static function getAdminRolePermission($params)
    {
        $permissionList = self::curl('admin_role_permission', $params);
        if (empty($permissionList)) {
            return array();
        }

        return $permissionList;
    }
}