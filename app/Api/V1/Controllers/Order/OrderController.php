<?php

namespace App\Api\V1\Controllers\Order;

use App\Api\ApiBaseController;
use Dingo\Api\Http\Request;
use Xmall\Order\Services\OrderQuery;
use Dingo\Api\Routing\Helpers;

/**
 * 订单控制器
 *
 * Class OrderController
 * @package App\Api\V1\Controllers\Order
 */
class OrderController extends ApiBaseController
{
    use Helpers;

    //订单查询业务
    public $orderQuery;

    /**
     * 业务模块注入
     *
     * OrderController constructor.
     * @param OrderQuery $orderQuery
     */
    public function __construct(OrderQuery $orderQuery)
    {
        $this->orderQuery = $orderQuery;
    }


    /**
     * 获取订单列表
     *
     * @param Request $request
     * @return mixed
     */
    public function getOrders(Request $request)
    {
        //启用全局变量
        $this->globalRequest($request);

        return $this->response->array($this->orderQuery->getOrders())->setStatusCode(200);
    }
}
