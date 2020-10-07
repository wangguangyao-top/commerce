<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品属性model
use App\Model\Shop_skuModel as sku;
//引入收货地址 model
use App\models\UseraddressModel as address;
//引入DB类
use Illuminate\Support\Facades\DB;
//引入订单表 model
use App\Model\Shop_order as order;
//引入订单商品表 model
use App\Model\Shop_order_goods as order_goods;
//引入订单地址表 model
use App\Model\Shop_order_address as order_address;
//引入商品购物车model
use App\Model\Shop_cart as cart;

class OrderController extends Controller
{
    const EPOCH = 1479533469598;//开始时间,固定一个小于当前时间的毫秒数
    const max12bit = 4095;
    const max41bit = 1099511627775;
    static $machineId = null;

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
                $v=sku::select('shop_sku.goods_id','shop_sku.sku','shop_sku.goods_price','goods_name','goods_img','cart_nums')
                                ->leftjoin('shop_goods as goods','shop_sku.goods_id','=','goods.goods_id')
                                ->leftjoin('shop_cart as cart',function($join){
                                    $join->on('shop_sku.goods_id','=','cart.goods_id')->on('shop_sku.sku','=','cart.sku');
                                })
                                ->where(['shop_sku.goods_id'=>$goods[0],'shop_sku.sku'=>$goods[1]])
                                ->first()
                                ->Toarray();
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
            //总价
            $money=0;
            //计算总价 购买商品的数量  并且取出商品图片
            foreach($goods_info as $k=>&$v){
                //求总价
                $money+=$v['cart_nums']*$v['goods_price'];
                //取出商品图片
                $v['goods_img']=substr($v['goods_img'],0,strpos($v['goods_img'],','));
            }
        }
        //判断收货地址
        if(empty($address)){
            //返回
            return json_encode(['status'=>'500003','msg'=>'请选择收货地址。']);
        }else{
            $user=json_decode($user,true);
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
        //***********************开启事务******************************
        DB::beginTransaction();
        //***********************订单表***************************
        //调用生成订单号的方法
        $order_on=$this->createOnlyId();
        //组合数据
        $order_info=[
            'user_id'=>$user['user_id'],
            'order_sn'=>$order_on,
            'pay_type'=>$pay_type,
            'order_amount'=>$money,
            'add_time'=>time(),
            'take_name'=>$address_info->take_name,
        ];
        //添加订单
        $order_id=order::insertGetId($order_info);
        //***********************订单商品表********************************
        //循环拼接数据
        foreach($goods_info as $k=>&$v){
            //拼接用户id
            $v['user_id']=$user['user_id'];
            $v['order_id']=1;
            $v['buy_number']=$v['cart_nums'];
            $v['goods_integral']='';
            unset($v['cart_nums']);
        }
        //添加订单商品
        $bol2=order_goods::insert($goods_info);
        //************************订单收货地址*******************************
        //转换为数组
        $address_info=$address_info->Toarray();
        //组合数据
        $order_address_info=[];
        $order_address_info['order_id']=1;
        $order_address_info['take_name']=$address_info['take_name'];
        $order_address_info['take_tel']=$address_info['is_tel'];
        $order_address_info['area']=$address_info['area'];
        $order_address_info['city']=$address_info['city'];
        $order_address_info['province']=$address_info['province'];
        $order_address_info['address_detail']=$address_info['adddress_detail'];
        //添加订单收货地址
        $bol3=order_address::insert($order_address_info);
        //**************************删除购物车********************************
        //空数组 存放修改后的状态值
        $order_cart_status=[];
        //循环修改状态值
        foreach($goods_info as $k=>&$v){
            //修改删除状态
            $bol4=cart::where(['goods_id'=>$v['goods_id'],'user_id'=>$v['user_id'],'sku'=>$v['sku']])->update(['is_del'=>2]);
            //判断是否修改
            if($bol4!==false){
                //存状态值
                $order_cart_status[]='1';
            }else{
                //失败
                $order_cart_status[]='0';
            }
        }
        //***************************商品库存减少***********************************
        //空数组 存放修改库存后的状态值
        $order_nums_status=[];
        //循环修改库存
        foreach($goods_info as $k=>&$v){
            //查询sku的库存
            $sku_nums=sku::where(['goods_id'=>$v['goods_id'],'sku'=>$v['sku']])->first();
            //减少库存
            $sku_nums=$sku_nums->goods_store-$v['buy_number'];
            //修改库存
            $bol5=sku::where(['goods_id'=>$v['goods_id'],'sku'=>$v['sku']])->update(['goods_store'=>$sku_nums]);
            //判断是否修改成功
            if($bol5!==false){
                //存状态值
                $order_nums_status[]='1';
            }else{
                //失败
                $order_nums_status[]='0';
            }
        }
        //***************************事务判断***********************************
        if(empty($order_id) || !$bol2 || !$bol3 || in_array('0',$order_cart_status) || in_array('0',$order_nums_status)){
            //事务回滚
            DB::rollBack();
            //失败返回
            return json_encode(['status'=>'500010','msg'=>'提交失败。']);
        }else{
            //事务提交
            DB::commit();
            //成功返回
            return json_encode(['status'=>'200','msg'=>'提交成功。','data'=>$order_on]);
        }
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

