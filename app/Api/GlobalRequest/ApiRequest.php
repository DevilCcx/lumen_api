<?php

namespace App\Api\GlobalRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Psr\SimpleCache\InvalidArgumentException;
use Dingo\Api\Http\Request as DingoRequest;

/**
 * api请求封装
 *
 * Class ApiRequest
 * @package App\Api
 */
class ApiRequest
{
    const global_request_key = 'global_request';

    /**
     * 初始化global_request
     *
     * @param DingoRequest $dingoRequest
     */
    static public function init(DingoRequest $dingoRequest)
    {
        $apiRequest = new Request();
        $apiRequest->setRequestId('request_id');
        $apiRequest->setClientIp($dingoRequest->getClientIp());
        $apiRequest->setDomain($dingoRequest->getHost());
        $apiRequest->setUser('user');
        $apiRequest->setIsAjax($dingoRequest->ajax());
        $apiRequest->setUrl($dingoRequest->fullUrl());
        $apiRequest->setParams($dingoRequest->all());

        Cache::store('array')->put(self::global_request_key, $apiRequest);
    }


    /**
     * 对外提供get静态方法
     *
     * @param $method
     * @param $args
     * @return bool
     * @throws \Exception
     */
    static public function __callStatic($method, $args)
    {
        try {
            $global_request = Cache::store('array')->get(self::global_request_key, '');

            //未启动全局变量下调用抛出异常
            if (empty($global_request)) {
                throw new \Exception('未启用全局请求变量');
            }

            return call_user_func_array([$global_request, $method], $args);
        } catch (InvalidArgumentException $e) {
            Log::error('全局变量错误:'.$e->getMessage().$e->getTraceAsString());
        }
    }
}
