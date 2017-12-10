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
        'uri'   =>  '/api/article/getArticleKind',
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
        'method'=> 'post',
        'connect_time_out'  =>  20,
        'execute_time_out'  =>  30,
        'retry_times'       =>  2,
        'header'            =>  array(),
        'options'           =>  array()
    ),

];