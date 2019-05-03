<?php

namespace App\Api\Request;

/**
 * api请求封装
 *
 * Class ApiRequest
 * @package App\Api
 */
class CxtRequest
{
    //请求ID
    private $requestId;

    //客户端IP
    private $clientIp;

    //域名
    private $domain;

    //ajax标志
    private $isAjax;

    //用户信息
    private $user;

    //当前请求url
    private $url;

    //请求参数数组
    private $params = [];

    /**
     * 设置请求参数
     *
     * @param $key
     * @param $val
     */
    public function setParams($key, $val = '')
    {
        //可以全量设置参数
        if (empty($this->params) && is_array($key)) {
            $this->params = $key;
        } else {
            $this->params[$key] = $val;
        }
    }

    /**
     * 获取请求参数
     *
     * @param $key
     * @return mixed|string
     */
    public function getParams($key = '')
    {
        //为空获取整个参数数组
        if (empty($key)) {
            return $this->params;
        }
        return $this->params[$key] ?? '';
    }

    /**
     * 设置请求ID
     *
     * @param $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * 获取请求ID
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * 设置客户端IP
     *
     * @param $clientIp
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;
    }

    /**
     * 获取客户端IP
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * 设置域名
     *
     * @param $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * 获取域名
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * 设置ajax标志
     *
     * @param $isAjax
     */
    public function setIsAjax($isAjax)
    {
        $this->isAjax = $isAjax;
    }

    /**
     * 获取ajax标志
     */
    public function getIsAjax()
    {
        return $this->isAjax;
    }

    /**
     * 设置用户信息
     *
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * 获取用户信息
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * 设置url
     *
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * 获取url
     */
    public function getUrl()
    {
        return $this->url;
    }
}
