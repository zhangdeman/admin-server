<?php
/**
 * Created by PhpStorm.
 * User: zhangdeman
 * Date: 2017/11/20
 * Time: 22:38
 */
namespace App\Library;
use Curl\Curl;

class BaseLibrary
{
    public static $instance = null;
    public function __construct()
    {
    }

    /**
     * @return BaseLibrary|null
     * 获取当前类实例
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 生成请求签名
     * @param $params 请求参数
     * @return string
     */
    public static function genSign($params)
    {
        $signKey = env('REQUEST_BASE_SERVICE_KEY');
        ksort($params);
        $str = http_build_query($params).'&'.$signKey;
        return md5($str);
    }

    /**
     * 格式化请求参数
     * @param $params
     * @return mixed
     */
    public static function formatParams($params)
    {
        foreach ($params as $key => $value) {
            if (is_bool($value)) {
                $params[$key] = intval($value);
            }
            $params[$key] = strval($value);
        }
        return $params;
    }

    /**
     * 获取请求的URL
     * @param string $requestUri
     * @return string
     */
    public static function getRequestUrl($requestUri='')
    {
        $requestUrl = env('BASE_PROTOCOL').'://'.env('BASE_INTERFACE_IP').':'.env('BASE_INTERFACE_PORT').env($requestUri.'_URL');
        $requestMethod = env($requestUri.'_METHOD');
        $curlInfo = array(
            'url'   =>  $requestUrl,
            'method'=>  $requestMethod
        );
        return $curlInfo;
    }

    /**
     * @param $requestUrl
     * @param $method
     * @param array $params
     * @return bool
     * 发送curl请求
     */
    public static function curl($requestUrl, $method, $params = array())
    {
        $curlInstance = new Curl($requestUrl);
        if ('post' == strtolower($method)) {
            $re = $curlInstance->post($requestUrl, $params);
        } else {
            $re = $curlInstance->get($requestUrl, $params);
        }
        if ($re) {
            $returnData = json_decode($re, true);
            if ($returnData['error_code'] == 0) {
                return $returnData['data'];
            }
            return false;
        } else {
            return false;
        }
    }
}