<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CodeModel extends Model
{
    protected $table = "shop_code";
    protected $primaryKey = "code_id";
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
}
