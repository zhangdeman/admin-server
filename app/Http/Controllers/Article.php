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
     * 添加文章
     * @param Request $request
     */
    public function addArticle(Request $request)
    {
        $idInfo = IdWorker::getId();

        if (empty($idInfo)) {
            $this->error(IdWorker::getErrorCode(), IdWorker::getErrorMsg());
        }

        $requestParams = array(
            'id'    =>  $idInfo['id'],
            'plain_content' => $request->input('plain_content'),
            'text_content'  => $request->input('text_content'),
            'parent_kind'   => $request->input('parent_kind'),
            'son_kind'      => $request->input('son_kind'),
            'create_ip'     => $request->getClientIp(),
            'admin_id'      => $this->adminInfo['id'],
        );

        $addArticleResult = ArticleLib::addArticle($requestParams);
        if (empty($addArticleResult)) {
            $this->error(ArticleLib::getErrorCode(), ArticleLib::getErrorMsg());
        }
        $this->success($addArticleResult);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddArticleKind(Request $request)
    {
        $articleList = ArticleLib::getArticleKind();
        $showList = array(
            array(
                'id'    =>  0,
                'title' =>  '根分类'
            ),
        );
        foreach ($articleList as $item) {
            $tmp = array(
                'id'    =>  ''
            );
        }
        return view('article/showAddArticleKind')->with('article_kind', $showList);
    }

    /**
     * 添加文章类别
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addArticleKind(Request $request)
    {
        $idInfo = IdWorker::getId();

        if (empty($idInfo)) {
            $this->error(IdWorker::getErrorCode(), IdWorker::getErrorMsg());
        }

        $params = $request->all();
        $params['id'] = $idInfo['id'];
        $params['create_admin_id'] = $this->adminInfo['id'];
        $addResult = ArticleLib::addArticleKind($params);
        if ($addResult) {
            $this->getArticleKindList($request);
        } else {
            return view('article/showAddArticleKind')->with('error_msg', ArticleLib::getErrorMsg());
        }
    }

    public function getKindList(Request $request)
    {
        $kindList = ArticleLib::getArticleKind(array('page_size' => 1, 'current_page' => 1));
        $kindList = empty($kindList) ? array() : $kindList;
        $this->success($kindList);
    }
}