<?php

namespace Xmall\Order;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $table = 'tra_land';

    protected $guarded = [];

    /**
     * 关联景区图片
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function landImages()
    {
        return $this->hasMany('Xmall\Order\LandImages', 'land_id', 'id');
    }
}
