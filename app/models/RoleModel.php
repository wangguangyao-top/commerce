<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    // 表名
    public $table = 'shop_admin_role';

    // 主键
    public  $primaryKey = 'role_id';

    // 关闭时间补全
    public  $timestamps = false;
}
