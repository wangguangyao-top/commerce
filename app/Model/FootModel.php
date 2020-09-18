<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FootModel extends Model
{
    protected $table="shop_foot";
	protected $primarykey='id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
