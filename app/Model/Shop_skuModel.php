<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop_skuModel extends Model
{
    //指定表名
    protected $table='shop_sku';
    //指定主键
    protected $primaryKey='id';
    //关闭时间戳
    public $timestamps=false;

    /**
     * @param $data 要添加的数据
     * @return string  返回结果类型为：json字符串
     */
    public function insertData($data){
        //调用自身进行添加
        $bol=$this->insert($data);
        //判断结果
        if($bol){
            //成功返回
            return json_encode(['status'=>'00000','msg'=>'商品属性添加成功。'],JSON_UNESCAPED_UNICODE);
        }else{
            //失败返回
            return json_encode(['status'=>'00005','msg'=>'商品属性添加失败。'],JSON_UNESCAPED_UNICODE);
        }
    }

    public function selectData(){
        //调用自身进行查询
        $data=$this->leftjoin('shop_goods','shop_sku.goods_id','=','shop_goods.goods_id')
                    ->select('shop_sku.*','goods_name')
                    ->where(['shop_sku.is_del'=>1])
                    ->get()
                    ->Toarray();
        $arr=[];
        $str='';
        foreach($data as $k=>$v){
            $v['sku']=json_decode($v['sku']);
            foreach($v['sku'] as $key=>$value){
//                echo strpos($value,':');
                if(substr($value,0,strpos($value,':'))==substr($value,0,strpos($value,':'))){
                    $str.=substr($value,strpos($value,':')+1).',';
                    $arr[substr($value,0,strpos($value,':'))]=$str;
                    dump($value);
                }
            }
        }
        dd($arr);
        //循环获取属性名称 属性值
        dd($data);
    }
}
