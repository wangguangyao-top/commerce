<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_order_goods extends Model
{
    //指定表名
    protected $table='shop_order_goods';
    //指定主键
    protected $primaryKey='order_goods_id';
    //关闭时间戳
    public $timestamps=false;
}
