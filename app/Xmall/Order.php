<?php

namespace Xmall;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tra_order';

    protected $guarded = [];

    /**
     * 关联商品订单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function goodsOrder()
    {
        return $this->hasOne('Xmall\GoodsOrder', 'order_id', 'id');
    }

    /**
     * 关联门票订单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function landTicketOrder()
    {
        return $this->hasOne('Xmall\LandTicketOrder', 'order_id', 'id');
    }

    /**
     * 关联自由行订单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function visitOrder()
    {
        return $this->hasOne('Xmall\VisitOrder', 'order_id', 'id');
    }

    /**
     * 关联酒店订单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hotelOrder()
    {
        return $this->hasOne('Xmall\HotelOrder', 'order_id', 'id');
    }

    /**
     * 关联剧场订单
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function theatreOrder()
    {
        return $this->hasOne('Xmall\TheatreOrder', 'order_id', 'id');
    }

    /**
     * 本地作用域(查询指定用户订单)
     *
     * @param $query
     * @param $user_id
     */
    public function scopeUser($query, $user_id)
    {
        if ($user_id) {
            $query->where('user_id', $user_id);
        }
    }

    /**
     * 本地作用域(查询指定状态订单)
     *
     * @param $query
     * @param $status
     */
    public function scopeStatus($query, $status)
    {
        if ($status && is_array($status)) {
            $query->whereIn('status', $status);
        }
    }
}
