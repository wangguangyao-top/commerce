<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_order extends Model
{
    //指定表名
    protected $table='shop_order';
    //指定主键
    protected $primaryKey='order_id';
    //关闭时间戳
    public $timestamps=false;
}
