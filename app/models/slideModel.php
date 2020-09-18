<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class slideModel extends Model
{
     // 表名
    public $table = 'shop_slide';

    // 主键
    public  $primaryKey = 'slide_id';

    // 关闭时间补全
    public  $timestamps = false;
}
