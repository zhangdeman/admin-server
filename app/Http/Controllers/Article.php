<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/2
 * Time: 15:04
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Article extends Controller
{
    public function __construct()
    {
    }

    /**
     * 显示发布文章页面
     * @param Request $request
     * @return html
     */
    public function showAddArticle(Request $request)
    {
        return view('article/showAddArticle');
    }
}