<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/15
 * Time: 21:42
 */
namespace App\Http\Controllers;

use App\Library\AuthClient;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cookie;
use Route;
use Themis\Api\Out;

class Index extends BaseController
{
    public function __construct(Request $request)
    {
    }

    public function index(Request $request)
    {
        return view('index/index');
    }
}
