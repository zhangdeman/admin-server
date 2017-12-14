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
    public static function getArticleKind()
    {
        return self::curl('get_article_kind');
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
}