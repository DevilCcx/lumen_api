<?php

namespace Xmall\Order\Repositories;

use Xmall\Order\Order;

class OrderRepository
{
    private $order;

    /**
     * 注入模型
     *
     * OrderRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * 获取订单列表
     *
     * @param Order $order
     * @return mixed
     */
    public function getOrders(Order $order)
    {
        return $this->order
            ->user($order->user_id)
            ->status($order->status)
            ->with([
                'goodsOrder', 'hotelOrder', 'theatreOrder', 'visitOrder',
                'landTicketOrder.land.landImages' => function ($query) {
                    $query->orderBy('idx', 'desc')->orderBy('id', 'asc')->select('idx', 'img_src', 'id', 'land_id');
                },
                'landTicketOrder.land:id,name',
            ])
            ->select('id')
            ->paginate(10);
    }
}
