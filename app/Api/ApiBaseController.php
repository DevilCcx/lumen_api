<?php

namespace App\Api;

use App\Api\Request\GlobalReq;
use Laravel\Lumen\Routing\Controller as BaseController;
use Dingo\Api\Http\Request;

class ApiBaseController extends BaseController
{


    /**
     * 使用全局请求变量
     *
     * @param Request $request
     */
    protected function globalRequest(Request $request)
    {
        GlobalReq::init($request);
    }
}
