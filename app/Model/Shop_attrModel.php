<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_attrModel extends Model
{
    //指定表名
    protected $table='shop_attr';
    //指定主键
    protected $primaryKey='id';
    //关闭时间戳
    public $timestamps=false;

    /**
     * 商品属性名称添加方法
     * @param $data  添加的数据为数组类型
     * @return string 返回类型为：json字符串
     */
    public function insertData($data){
        //调用自身添加
        $bol=$this->insert($data);
        //判断结果
        if($bol){
            //成功返回
            return json_encode(['status'=>'00000','msg'=>'商品属性添加成功。'],JSON_UNESCAPED_UNICODE);
        }else{
            //失败返回
            return json_encode(['status'=>'00001','msg'=>'商品属性添加失败。'],JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * 商品属性展示
     * @return mixed  返回类型为：结果集
     */
    public function selectData(){
        //调用自身进行查询
        $data=$this->where(['is_del'=>1])->get();
        //返回数据
        return $data;
    }

    /**
     * @param $id 要查询的ID值
     * @return mixed 返回数据类型为：结果集
     */
    public function editData($id){
        //调用自身进行查询单条数据
        $find=$this->find($id);
        //返回数据
        return $find;
    }

    /**
     * @param $id 要修改数据的ID
     * @param $data  要修改的数据
     * @return string  返回结果类型为：json字符串
     */
    public function updateData($id,$data){
        //调用自身进行修改数据
        $bol=$this->where(['id'=>$id])->update($data);
        //判断结果
        if($bol!==false){
            //成功返回数据
            return json_encode(['status'=>'00000','msg'=>'商品属性名称修改成功。'],JSON_UNESCAPED_UNICODE);
        }else{
            //修改失败返回数据
            return json_encode(['status'=>'00002','msg'=>'商品属性名称修改失败。'],JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @param $id 要删除数据的ID
     * @return mixed  返回结果为：受影响行数
     */
    public function destroyData($id){
        //调用自身进行删除
        $bol=$this->where(['id'=>$id])->delete();
        //返回结果
        return $bol;
    }
}
