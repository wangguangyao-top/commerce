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
        //判断是否选择支付方式
        if(empty($pay_type)){
            //返回
            return json_encode(['status'=>'500005','msg'=>'请选择支付方式。']);
        }
    }

    const EPOCH = 1479533469598;//开始时间,固定一个小于当前时间的毫秒数
    const max12bit = 4095;
    const max41bit = 1099511627775;
    static $machineId = null;
    public function order(){
        return view('index.getOrderInfo');
    }
    public function paysuccess(){
        return view('index.paysuccess');
    }
    public function payfail(){
        return view('index.payfail');
    }
    //生成订单
    public static function createOnlyId()
    {
        // 时间戳 42字节
//        dd(floor(microtime(938751132)*1000));
        $time = floor(microtime(true) * 1000);
        // 当前时间 与 开始时间 差值
        $time -= self::EPOCH;
        // 二进制的 毫秒级时间戳
//        dd($time);
        $base = decbin(self::max41bit + $time);
        // 机器id  10 字节
        if (!self::$machineId) {
            $machineid = self::$machineId;
        } else {
            $machineid = str_pad(decbin(self::$machineId), 10, "0", STR_PAD_LEFT);
        }
        // 序列数 12字节
//        dd($machineid);
        $random = str_pad(decbin(mt_rand(0, self::max12bit)), 12, "0", STR_PAD_LEFT);
        // 拼接
        $base = $base . $machineid . $random;
        // 转化为 十进制 返回
        return "JF" . bindec($base);
    }
}

