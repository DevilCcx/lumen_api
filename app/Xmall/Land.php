<?php

namespace Xmall;

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
        return $this->hasMany('Xmall\LandImages', 'land_id', 'id');
    }
}
