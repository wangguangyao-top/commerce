<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table="shop_brand";
	protected $primarykey='brand_id';
    public $timestamps=false;

     //黑名单
    protected $guarded=[];
}
