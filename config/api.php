<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/25
 * Time: 11:32
 * 请求接口的配置文件
 */

return [
    'base'  =>  array(
        'app_id'    =>  '5b82978c16585a7e4ab54d40b6f15089',
        'salt'      =>  'REQUEST_BASE_SERVICE_SALT',
        'protocol'  =>  'http',
        'ip'        =>  '127.0.0.1',
        'port'      =>  '4888',
    ),

    //获取id
    'validate_token' => array(
        'uri'   =>  '/api/passport/validateToken',
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //添加管理员
    'add_admin' =>  array(
        'uri'   =>  '/api/admin/addAdmin',
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //获取id
    'get_id' => array(
        'uri'   =>  '/api/getId',
        'method'=> 'get',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //登录
    'admin_login' => array(
        'uri'   =>  '/api/admin/login',
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //获取文章类别
    'get_article_kind' => array(
        'uri'   =>  '/api/articleKind/list',
        'method'=> 'get',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //获取文章类别
    'add_article' => array(
        'uri'   =>  '/api/article/addArticle',
        'method'=> 'get',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //添加文章类别
    'add_article_kind' => array(
        'uri'   =>  '/api/articleKind/add',
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //添加文章类别
    'article_kind_detail' => array(
        'uri'   =>  '/api/articleKind/detail',
        'method'=> 'get',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //更新文章类别
    'article_kind_update' => array(
        'uri'   =>  '/api/articleKind/update',
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),


    //删除文章类别
    'article_kind_delete' => array(
        'uri'   =>  '/api/articleKind/delete',
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //获取权限列表
    'get_permission_list' => array(
        'uri'   =>  '/api/permission/getList',
        'method'=> 'get',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //获取权限列表
    'add_permission' => array(
        'uri'   =>  '/api/permission/add',
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

    //获取角色权限列表
    'admin_role_permission' => array(
        'uri'   =>  '/api/permission/getRolePermission',
        'method'=> 'get',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

];