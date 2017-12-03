<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/2
 * Time: 15:04
 */
namespace App\Http\Controllers;

use App\Library\IdWorker;
use Illuminate\Http\Request;
use App\Library\ArticleLib;

class Article extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
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

    /**
     * 获取文章类型列表
     * 请求失败返回空列表
     */
    public function getKindList(Request $request)
    {
        $kindList = ArticleLib::getArticleKind();
        $kindList = empty($kindList) ? array() : $kindList;
        $this->success($kindList);
    }

    /**
     * 添加文章
     * @param Request $request
     */
    public function addArticle(Request $request)
    {
        $idInfo = IdWorker::getId();
        $id = $idInfo['id'];
        $params = array();
        $this->success($request->all());
    }
}