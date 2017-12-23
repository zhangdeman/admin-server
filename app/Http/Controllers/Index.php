<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/15
 * Time: 21:42
 */
namespace App\Http\Controllers;

use App\Library\PermissionLib;
use Illuminate\Http\Request;
use Route;
use Themis\Api\Out;

class Index extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index(Request $request)
    {
        $permission = PermissionLib::getLeftNav();
        return view('index/index')->with('permission_list', $permission)->with('admin_info', $this->adminInfo);
    }
}
