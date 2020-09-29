<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    //指定表名
    protected $table='shop_history';
    //指定主键
    protected $primaryKey='hi_id';
    //关闭时间戳
    public $timestamps=false;
}
