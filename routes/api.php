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
    });
});
