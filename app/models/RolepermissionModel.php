<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RolepermissionModel extends Model
{
    // 表名
    public $table = 'shop_admin_role_purview';

    // 主键
    public  $primaryKey = 'id';

    // 关闭时间补全
    public  $timestamps = false;
}
