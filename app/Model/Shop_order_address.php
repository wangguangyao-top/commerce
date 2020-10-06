<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_order_address extends Model
{
    //指定表名
    protected $table='shop_order_address';
    //指定主键
    protected $primaryKey='order_address_id';
    //关闭时间戳
    public $timestamps=false;
}
