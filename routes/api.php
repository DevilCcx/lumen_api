<?php

$middleware = [];

//dingo
$api = app('Dingo\Api\Routing\Router');

//api版本 v1
$api->version('v1', [
    'namespace' => 'App\Api\V1\Controllers',
    // each route have a limit of 20 of 1 minutes
    'limit' => 20,
    'expires' => 1,
], function ($api) use ($middleware) {
    /**
     * 路由示例
     */
    $api->group([
        'prefix' => 'module',
        'namespace' => 'Module'
    ], function ($api) {
        //获取resource
        $api->get('resources/{id}', [
            'as' => 'resources',
            'uses' => 'ResourceController@getResources'
        ]);

        //curl工具包(Zttp)使用示范接口
        $api->get('curl/{id}', [
            'as' => 'curl',
            'uses' => 'ResourceController@testCurl'
        ]);

        //rabbitMQ使用示范接口
        $api->get('rabbitMQ', [
            'as' => 'rabbitMQ',
            'uses' => 'ResourceController@testRabbitMQ'
        ]);

        //缓存使用示范
        $api->get('cache', [
            'uses' => 'ResourceController@testCache'
        ]);
    });

    /**
     * 订单模块
     */
    $api->group([
        'prefix' => 'orders',
        'namespace' => 'Order'
    ], function ($api) {
        //获取订单
        $api->get('/', [
            'uses' => 'OrderController@getOrders'
        ]);
    });
});
