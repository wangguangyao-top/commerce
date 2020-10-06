<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品属性model
use App\Model\Shop_skuModel as sku;
//引入收货地址 model
use App\models\UseraddressModel as address;

class OrderController extends Controller
{
    /**
     * 确认订单
     */
    public function confirmOrder(){
        //获取用户id
        $user=session('user');
        //接值
        $goods_info=request()->goods_info;
        $address=request()->user_address_info;
        $pay_type=request()->pay_type;
        //判断商品
        if(empty($goods_info)){
            //返回
            return json_encode(['status'=>'500001','msg'=>'请选择要下单的商品。']);
        }else{
            //分割
            $goods_info=explode('。',$goods_info);
            //空字符串  计算有多少值
            $noNull=0;
            //循环查询商品
            foreach($goods_info as $k=>&$v){
                //分割商品id sku
                $goods=explode(':',$v);
                $v=sku::leftjoin('shop_goods as goods','shop_sku.goods_id','=','goods.goods_id')
                                ->where(['shop_sku.goods_id'=>$goods[0],'sku'=>$goods[1]])
                                ->first();
                if(!empty($v)){
                    //不为空 加1
                    $noNull+=1;
                }
            }
            //判断商品是否存在
            if($noNull==0 || $noNull!=count($goods_info)){
                //返回 商品不存在
                return json_encode(['status'=>'500002','msg'=>'商品不存在。']);
            }
        }
        //判断收货地址
        if(empty($address)){
            //返回
            return json_encode(['status'=>'500003','msg'=>'请选择收货地址。']);
        }else{
            //查询收货地址
            $address_info=address::where(['id'=>$address,'is_del'=>1,'user_id'=>$user['user_id']])->first();
            //判断是否为空
            if(empty($address_info)){
                //返回
                return json_encode(['status'=>'500004','msg'=>'收货地址不存在']);
            }
        }
    }
}
