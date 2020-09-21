<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PerssionModel extends Model
{
    // 表名
    public $table = 'shop_admin_purview';

    // 主键
    public  $primaryKey = 'p_id';

    // 关闭时间补全
    public  $timestamps = false;
}
