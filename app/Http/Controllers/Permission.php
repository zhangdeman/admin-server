<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/15
 * Time: 23:07
 */
namespace App\Http\Controllers;
use App\Library\IdWorker;
use App\Library\PermissionLib;
use Illuminate\Http\Request;
use Themis\Admin\Admin;
use App\Library\AuthClient;

class Permission extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function permissionList(Request $request)
    {
        $getParentPermissionWhere = array(
            'current_page'  =>  1,
            'page_limit'    =>  20,
        );

        $permissionList = PermissionLib::getPermissionList($getParentPermissionWhere);
        var_dump($permissionList);
    }

    public function doAddPermission(Request $request)
    {
        $idInfo = IdWorker::getId();
        if (empty($idInfo)) {

        }
        $requestParams = array(
            'id'    =>  $idInfo['id'],
            'create_admin_id'   =>  $this->adminInfo['id'],
            'parent_id' =>  trim($request->input('parent_id')),
            'name'  =>  trim($request->input('name')),
            'desc'  =>  trim($request->input('desc')),
            'real_controller'   =>  strtolower(trim($request->input('real_controller'))),
            'real_action'       =>  strtolower(trim($request->input('real_action'))),
            'request_uri'       =>  strtolower(trim($request->input('request_uri')))
        );
        $result = PermissionLib::addPermission($requestParams);
        return $this->permissionList($request);
    }


    /**
     * 显示添加权限页面
     * @param Request $request
     * @return $this
     */
    public function showAddPermission(Request $request)
    {
        $getParentPermissionWhere = array(
            'status'    =>  \Themis\Permission\Permission::PERMISSION_STATUS_NORMAL,
            'parent_id' =>  0,
            'current_page'  =>  1,
            'page_limit'    =>  500,
        );

        $permissionList = PermissionLib::getPermissionList($getParentPermissionWhere);
        $parentPermission = $permissionList['list'];
        $parentPermission[] = array(
            'id'    =>  0,
            'name'  =>  '根结点',
        );
        return view('permission/addPermission')->with('request_param', $request->all())->with('parent_permission', $parentPermission);
    }
}