<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/12
 * Time: 16:00
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class Login extends Controller
{
    public function __construct()
    {

    }

    /**
     * 展示登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLogin()
    {
        csrf_token();
        return view('login/showLogin');
    }

    public function doLogin()
    {
        return "登录验证";
    }
}