<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table = "shop_area";
    protected $primaryKey = "id";
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
}
