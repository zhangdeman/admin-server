<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/18
 * Time: 11:14
 */
namespace App\Http\Controllers;
use App\Library\ArrayTool;
use App\Library\IdWorker;
use App\Library\PermissionLib;
use Illuminate\Http\Request;
use App\Library\OpAdmin;
use Themis\Api\Out;

class Admin extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
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

        if ($requestParams['password'] != $requestParams['confirm_password']) {
            //两次密码不一致
            $this->error(Out::ERROR_DIFF_PASSWORD);
        }

        $adminId = IdWorker::getId(array());

        if (empty($adminId)) {
            $this->error(Out::ERROR_GET_ID_FAIL);
        }

        $requestParams['id'] = $adminId['id'];
        $requestParams['encode_id'] = $adminId['encode_id'];
        $requestParams['create_ip'] = $request->getClientIp();

        $addResult = OpAdmin::addAdmin($requestParams);

        echo json_encode(array('error_code' => OpAdmin::getErrorCode(),'id' => $adminId['id'], 'error_msg' => OpAdmin::getErrorMsg()));

    }

    public function adminRoleList(Request $request)
    {
        $roleList = config('role.list');
        return view('admin/roleList')->with('adminRole', $roleList);
    }

    public function showAuthPermission(Request $request)
    {
        return view('admin/showAuthPermission');
    }

    /**
     * 获取角色权限列表
     * @param Request $request
     */
    public function adminPermissionList(Request $request)
    {
        $roleId = $request->input('role_id');
        //获取当前权限列表
        $permission = PermissionLib::getPermissionList(array('current_page' => 1, 'page_limit' => 500));
        $permissionList = $permission['list'];

        //获取当前角色拥有的权限
        $adminRolePermission = PermissionLib::getAdminRolePermission(array('role_id' => $roleId));
        $permissionIdList = array();
        foreach ($adminRolePermission as $item) {
            $permissionIdList[] = $item['permission_id'];
        }

        foreach ($permissionList as &$permission) {
            if (in_array($permission['id'], $permissionIdList)) {
                $permission['is_have'] = 1;
            } else {
                $permission['is_have'] = 0;
            }
        }

        $permissionList = ArrayTool::group($permissionList, 'parent_id');

        $this->success($permissionList);
    }
}