<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/18
 * Time: 11:14
 */
namespace App\Http\Controllers;
use App\Library\IdWorker;
use Illuminate\Http\Request;
use \App\Library\OpAdmin;

class Admin extends Controller
{
    public function __construct()
    {

    }

    /**
     * 展示添加一个管理员页面
     */
    public function showAddAdmin()
    {
        $roleConfig = config('role.list');
        return view('admin/showAddAdmin')->with('role_config', $roleConfig);
    }

    public function doAddAdmin(Request $request)
    {
        /*$validateResult = $this->validate($request,array(
            'name' => 'required',
            'nickname' => 'required',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'mail' => 'required',
            'phone' => 'required',
        ));*/

        $requestParams = $request->all();
        $adminId = IdWorker::getId(array());
        $requestParams['id'] = $adminId['id'];
        $requestParams['encode_id'] = $adminId['encode_id'];

        $addResult = OpAdmin::addAdmin($requestParams);

        echo json_encode(array('error_code' => OpAdmin::getErrorCode(),'id' => $adminId['id'], 'error_msg' => OpAdmin::getErrorMsg()));
        //exit();



        //$idInfo = IdWorker::getId();
        //var_dump($validateResult);die;
    }
}