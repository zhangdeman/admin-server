<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //管理员信息
    public $adminInfo = array();
    public function __construct()
    {

    }

    public function getAdminInfo(Request $request)
    {
        $adminId = $request->input('admin_id');
        return array();
    }

}
