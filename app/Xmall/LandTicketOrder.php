<?php

namespace Xmall;

use Illuminate\Database\Eloquent\Model;

class LandTicketOrder extends Model
{
    protected $table = 'tra_land_ticket_order';

    protected $guarded = [];

    /**
     * 关联景区
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function land()
    {
        return $this->hasOne('Xmall\Land', 'id', 'lid');
    }

    /**
     * 关联景区门票
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function landTicket()
    {
        return $this->hasOne('Xmall\LandTicket', 'id', 'tid');
    }
}
