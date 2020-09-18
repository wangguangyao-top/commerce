<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_attrval extends Model
{
    //指定表名
    protected $table='shop_attrval';
    //指定主键
    protected $primaryKey='id';
    //关闭时间戳
    public $timestamps=false;

    /** 添加方法
     * @param $data 要添加的数据 类型为：数组
     * @return string  返回的结果类型为：json字符串
     */
    public function insertData($data){
        //调用自身进行添加
        $bol=$this->insert($data);
        //判断结果
        if($bol){
            //成功返回
            return json_encode(['status'=>'00000','msg'=>'商品属性值添加成功。'],JSON_UNESCAPED_UNICODE);
        }else{
            //失败返回
            return json_encode(['status'=>'00003','msg'=>'商品属性值添加失败。'],JSON_UNESCAPED_UNICODE);
        }
    }

    /** 查询方法
     * @param $num 每页显示条数
     * @return mixed  返回数据类型为：结果集
     */
    public function selectData($num){
        //调用自身进行查询
        $data=$this->select('shop_attrval.*','attr_name')
                    ->join('shop_attr','shop_attrval.attr_id','=','shop_attr.id')
                    ->where(['shop_attrval.is_del'=>1])
                    ->paginate($num);
        //返回数据
        return $data;
    }

    /** 修改页面 查询单条
     * @param $id 要修改数据的ID
     * @return mixed 返回结果类型为：结果集
     */
    public function editData($id){
        //调用自身查询单条数据
        $info=$this->where(['id'=>$id])->first();
        //返回数据
        return $info;
    }

    /** 修改方法
     * @param $id 要修改数据的ID
     * @param $data  要修改的数据
     * @return mixed  返回结果为：受影响行数
     */
    public function updateData($id,$data){
        //调用自身进行修改
        $bol=$this->where(['id'=>$id])->update($data);
        //返回结果
        return $bol;
    }

    /** 删除方法（软删除）
     * @param $id 要删除的数据ID
     * @return mixed 返回结果类型为：受影响行数
     */
    public function destroyData($id){
        //调用自身进行删除
        $bol=$this->where(['id'=>$id])->update(['is_del'=>2]);
        //返回结果
        return $bol;
    }
}
