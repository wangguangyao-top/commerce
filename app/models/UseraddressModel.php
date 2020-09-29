<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UseraddressModel extends Model
{
    // 表名
    public $table = 'shop_user_address';

    // 主键
    public  $primaryKey = 'id';

    // 关闭时间补全
    public  $timestamps = false;
}
