<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'shop_class';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    public function add($data){
        return $this->insertGetId($data);
    }
}
