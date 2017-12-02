<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/12
 * Time: 16:00
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Themis\Admin\Admin;
use App\Library\AuthClient;
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
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

    public function doLogin(Request $request)
    {
        $account = trim($request->input('account'));
        if (is_numeric($account)) {
            $accountType = Admin::LOGIN_TYPE_PHONE;
        } else {
            $accountType = Admin::LOGIN_TYPE_MAIL;
        }

        $requestParam = array(
            'login_type'    =>  $accountType,
            'account'       =>  $account,
            'password'      =>  trim($request->input('password'))
        );

        $loginResult = AuthClient::adminLogin($requestParam);

        if (false == $loginResult) {
            $this->error(AuthClient::getErrorCode(), AuthClient::getErrorMsg());
        }

        $this->success($loginResult);
    }
}