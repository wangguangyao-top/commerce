<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class IndexUserModel extends Model
{
    protected $table = "shop_user";
    protected $primaryKey = "user_id";
    public $timestamps=false;

    //黑名单
    protected $guarded=[];
}
