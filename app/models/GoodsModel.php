<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = 'shop_goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    public function add($data)
    {
        return $this->insertGetId($data);
    }

    public function del($goods_id)
    {
        $where = [
            ['is_del', '=', 1],
            ['goods_id', '=', $goods_id]
        ];
        $del = $this->where($where)->update(['is_del' => 2]);
        return $del;
    }

    public function UpdateShow($goods_id){
        $where = [
            ['is_del', '=', 1],
            ['goods_id', '=', $goods_id]
        ];
        $info = $this->where($where)->first();
        return $info;
    }

    public function GoodsUpdate($upGoods){
        $where = [
            ['is_del', '=', 1],
            ['goods_id', '=', $upGoods['goods_id']]
        ];
        $update = $this->where($where)->update($upGoods);
        return $update;
    }
}
