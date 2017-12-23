<?php

namespace App\Http\Controllers;

use App\Library\AuthClient;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cookie;
use \App\Library\Permission;
use Route;
use Themis\Api\Out;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $requestInstance = null;

    //管理员信息
    public $adminInfo = array();

    //管理员权限
    public $adminPermission = array();

    //不验证token接口 login
    public static $WHITE_INTERFACE = array(
        'App\\Http\\Controllers\\Login'
    );

    //不验证token的uri
    public static $WHITE_URI = array(
        'login',
        'dologin',
    );

    //当前uri
    public static $CURRENT_URI = '';

    //当前控制器
    public static $CURRENT_CLASS = '';

    public function __construct(Request $request)
    {
        self::$CURRENT_URI = strtolower($request->path());

        self::$requestInstance = $request;

        if (empty(self::$CURRENT_CLASS)) {
            self::$CURRENT_CLASS = get_class($this);
        }

        $this->validateToken();
    }

    /**
     * 验证token
     * @return bool
     */
    public function validateToken()
    {
        if (in_array(self::$CURRENT_CLASS, self::$WHITE_INTERFACE) || in_array(self::$CURRENT_URI, self::$WHITE_URI)) {
            //不验证token
            return true;
        }

        $token = self::$requestInstance->input('admin_token');
        $token = empty($token) ? $_COOKIE['deman_club_token'] : $token;

        $validateTokenResult = AuthClient::checkAdminInfo(array('token' => $token));

        if (empty($validateTokenResult)) {
            $this->error(AuthClient::getErrorCode(), AuthClient::getErrorMsg());
        }

        $this->adminInfo = $validateTokenResult;

        view()->share('admin_info', $this->adminInfo);

        $permission = $this->getPermission($this->adminInfo["id"]);

        view()->share('permission_list', $permission);
    }


    /**
     * 输出成功的信息
     * @param $data
     * @param bool $isQuit
     */
    public function success($data, $isQuit = true)
    {
        $returnData = array(
            'error_code'    => 0,
            'error_msg'     =>  'success',
            'data'          =>  $data
        );
        echo json_encode($returnData);
        if ($isQuit) {
            exit(0);
        }

        //完成请求提前返回，但可以继续后续逻辑
        fastcgi_finish_request();
    }

    /**
     * @param $adminId
     * @return array
     * 获取当前管理员权限
     */
    public function getPermission($adminId)
    {
        $permission = Permission::getLeftNav(array());
        $this->adminPermission = $permission;
        return $permission;
    }

    /**
     * 输出错误信息
     * @param $errorCode
     * @param string $errorMsg
     * @param array $errorData
     * @param bool $isQuit
     */
    public function error($errorCode, $errorMsg = '', $errorData = array(), $isQuit = true)
    {
        $errorMsg = empty($errorMsg) ? Out::getErrorMsg($errorCode) : $errorMsg;
        $outData = array(
            'error_code'    =>  $errorCode,
            'error_msg'     =>  $errorMsg,
            'data'          =>  $errorData
        );
        echo json_encode($outData);
        if ($isQuit) {
            exit(0);
        }
        fastcgi_finish_request();
    }
}
