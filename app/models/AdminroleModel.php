<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AdminroleModel extends Model
{
    // 表名
    public $table = 'shop_admin_user_role';

    // 主键
    public  $primaryKey = 'id';

    // 关闭时间补全
    public  $timestamps = false;
}
