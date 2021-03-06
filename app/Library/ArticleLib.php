<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/12/2
 * Time: 23:51
 */
namespace App\Library;

class ArticleLib extends BaseLibrary
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取文章类别
     * @return bool
     */
    public static function getArticleKind($params)
    {
        $kindList = self::curl('get_article_kind',$params);
        foreach ($kindList['article_kind_list'] as &$item) {
            $item['create_time'] = date('Y-m-d H:i:s', $item['create_time']);
        }
        return $kindList;
    }

    /**
     * 发布文章
     * @param $params
     * @return bool
     */
    public static function addArticle($params)
    {
        return self::curl('add_article', $params);
    }

    /**
     * 添加文章类别
     * @param $params
     * @return bool
     */
    public static function addArticleKind($params)
    {
        return self::curl('add_article_kind', $params);
    }

    /**
     * 添加文章类别
     * @param $params
     * @return bool
     */
    public static function getArticleKindDetail($params)
    {
        $detail = self::curl('article_kind_detail', $params);
        if (empty($detail)) {
            return $detail;
        }

        $detail['create_time'] = date('Y-m-d H:i:s', $detail['create_time']);
        return $detail;
    }

    /**
     * 更新文章类别
     * @param $params
     * @return bool
     */
    public static function updateArticleKind($params)
    {
        $result = self::curl('article_kind_update', $params);
        return $result;
    }

    /**
     * 删除文章类别
     * @param $params
     * @return bool
     */
    public static function deleteArticleKind($params)
    {
        $result = self::curl('article_kind_delete', $params);
        return $result;
    }

}