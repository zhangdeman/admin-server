<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/15
 * Time: 23:07
 */
namespace App\Http\Controllers;
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
    {}

    public function doAddPermission(Request $request)
    {}

    public function showAddPermission(Request $request)
    {
        $permission = \App\Library\Permission::getLeftNav();
        return view('permission/addPermission')->with('permission_list',$permission)->with('admin_info', $this->adminInfo);
    }
}