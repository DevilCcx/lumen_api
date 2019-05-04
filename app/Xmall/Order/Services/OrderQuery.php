<?php

namespace Xmall\Order\Services;

use App\Api\Request\GlobalReq;
use Xmall\Order\Order;
use Xmall\Order\Repositories\OrderRepository;

/**
 * 订单查询业务模块
 *
 * Class OrderQuery
 * @package App\Xmall\Order
 */
class OrderQuery
{
    //订单仓库
    private $orderRepository;

    //订单模型
    private $order;

    /**
     * 注入仓库
     *
     * OrderQuery constructor.
     * @param OrderRepository $orderRepository
     * @param Order $order
     */
    public function __construct(OrderRepository $orderRepository, Order $order)
    {
        $this->orderRepository = $orderRepository;
        $this->order = $order;
    }

    /**
     * 获取订单列表
     */
    public function getOrders()
    {
        $params = GlobalReq::getParams();
        $this->order->user_id = $params['user_id'] ?? '';
        $this->order->status = $params['status'] ?? '';
        return $this->orderRepository->getOrders($this->order);
    }
}
