<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserinfoModel extends Model
{
    // 表名
    public $table = 'shop_myinfo';

    // 主键
    public  $primaryKey = 'my_id';

    // 关闭时间补全
    public  $timestamps = false;
}
