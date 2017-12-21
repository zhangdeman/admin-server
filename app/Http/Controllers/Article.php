<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/2
 * Time: 15:04
 */
namespace App\Http\Controllers;

use App\Library\ArrayTool;
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
        $articleList = ArticleLib::getArticleKind(array());
        $articleList = $articleList['article_kind_list'];
        foreach ($articleList as &$item) {
            $item = ArrayTool::dataFilter($item, array('id', 'title', 'parent_id'));
        }
        $articleList = ArrayTool::group($articleList, 'parent_id');
        $showList = array(
            'id'    =>  0,
            'title' =>  '根分类',
            'module'    =>  array(

            ),
        );
        foreach ($articleList[0] as $parentId => $item) {
            if (empty($articleList[$item['id']])) {
                $tmp = array(
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'type'  => array(),
                );
            } else {
                $tmp = array(
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'type' => $articleList[$item['id']]
                );
            }

            $showList['module'][] = $tmp;

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
            return $this->getKindList($request);
        } else {
            view()->share('error_msg', ArticleLib::getErrorMsg());
            return $this->showAddArticleKind($request);
        }
    }

    /**
     * 获取文章类型列表
     * @param Request $request
     * @return
     */
    public function getKindList(Request $request)
    {
        $kindList = ArticleLib::getArticleKind(array('page_size' => 20, 'current_page' => 1));
        return view('article/articleKindList')->with('list', $kindList);
    }

    /**
     * 获取类别详情接口
     * @param Request $request
     */
    public function getKindDetail(Request $request)
    {
        $id = $request->input('id');
        $detail = ArticleLib::getArticleKindDetail(array('id' => $id));
        $articleList = ArticleLib::getArticleKind(array());
        $articleList = $articleList['article_kind_list'];
        foreach ($articleList as &$item) {
            $item = ArrayTool::dataFilter($item, array('id', 'title', 'parent_id'));
        }
        $articleList = ArrayTool::group($articleList, 'parent_id');
        $showList = array(
            'id'    =>  0,
            'title' =>  '根分类',
            'module'    =>  array(

            ),
        );
        foreach ($articleList[0] as $parentId => $item) {
            if (empty($articleList[$item['id']])) {
                $tmp = array(
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'type'  => array(),
                );
            } else {
                $tmp = array(
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'type' => $articleList[$item['id']]
                );
            }

            $showList['module'][] = $tmp;

        }
        $detail['kind_list'] = $showList;
        $detail['csrf_token'] = csrf_token();
        $this->success($detail);
    }

    public function updateKind(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $parentId = $request->input('parent_id');
        $params = array(
            'id'    =>  $id,
            'title' =>  $title,
            'parent_id' =>  $parentId,
        );
        $result = ArticleLib::updateArticleKind($params);
        return $this->getKindList($request);
    }

    public function deleteKind(Request $request)
    {
        $id = $request->input('id');
    }
}