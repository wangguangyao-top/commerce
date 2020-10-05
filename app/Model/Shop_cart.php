<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_cart extends Model
{
    //指定表名
    protected $table='shop_cart';
    //指定主键
    protected $primaryKey='cart_id';
    //关闭时间戳
    public $timestamps=false;
}
