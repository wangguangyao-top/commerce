<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NavModel extends Model
{
    protected $table = "shop_nav";
    protected $primaryket = "nav_id";
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
