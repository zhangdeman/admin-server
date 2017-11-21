<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/18
 * Time: 11:14
 */
namespace App\Http\Controllers;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use App\Library\IdWorker;
use Curl\Curl;
use App\Library\AuthClient;

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
        return view('admin/showAddAdmin');
    }

    public function doAddAdmin(Request $request)
    {
        $r = $this->validate($request,[
            'name'  =>  'required',
            'phone' =>  'required',
            'mail'  =>  'required',
            'role'  =>  'required',
        ]);
        var_dump($r);die;
    }
}