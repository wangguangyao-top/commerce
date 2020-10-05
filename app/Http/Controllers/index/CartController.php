<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入cookie类
use Illuminate\Support\Facades\Cookie;
//引入商品model
use App\models\GoodsModel;
//引入商品属性model
use App\Model\Shop_skuModel;
//引入商品购物车model
use App\Model\Shop_cart;
//引入商品属性值model
use App\Model\Shop_attrval as Attrval;
//引入商品属性名称 model
use App\Model\Shop_attrModel as attr;

class CartController extends Controller
{
    /**
     * 加入购物车
     */
    public function addCart(){
        //获取用户id
        $user=session('user');
        //接值
        $data=request()->all();
        //判断是否登录
        if(!empty($user)){
            //登录 存入数据库
            //判断是否有sku
            if(empty($data['sku'])){
                //没有sku 从商品表中获取库存
                $nums=GoodsModel::where(['goods_id'=>$data['goods_id']])->value('goods_store');
            }else{
                //有sku 则查询该对应的库存信息
                $nums=Shop_skuModel::where(['goods_id'=>$data['goods_id'],'sku'=>$data['sku']])->value('goods_store');
            }
            //查询是否加入过购物车
            $is_cart=Shop_cart::where(['user_id'=>$user['user_id'],'goods_id'=>$data['goods_id'],'sku'=>$data['sku']])->first();
            //判断是否加入过购物车
            if(!empty($is_cart)){
                //不为空 加入过购物车 修改购买数量
                //判断库存
                if(($is_cart->cart_nums+$data['nums'])>$nums){
                    $data['nums']=$nums;
                }else{
                    $data['nums']=$is_cart->cart_nums+$data['nums'];
                }
                //修改购买数量
                $bol=Shop_cart::where(['user_id'=>$user['user_id'],'goods_id'=>$data['goods_id'],'sku'=>$data['sku']])->update(['cart_nums'=>$data['nums']]);
            }else{
                //为空 没有加入过购物车 直接添加
                //判断库存
                if($data['nums']>$nums){
                    //大于库存 则修改购买数量为库存值
                    $data['nums']=$nums;
                }
                //组合数据
                $cart_info=[
                    'goods_id'=>$data['goods_id'],
                    'user_id'=>$user['user_id'],
                    'sku'=>$data['sku'],
                    'cart_nums'=>$data['nums'],
                    'add_time'=>time()
                ];
                //添加入库
                $bol=Shop_cart::insert($cart_info);
            }
            //判断 返回结果
            if($bol!==false){
                //成功 返回
                return json_encode(['status'=>'200','msg'=>'加入购物车成功。']);
            }else{
                //失败 返回
                return json_encode(['status'=>'400012','msg'=>'加入购物车失败。']);
            }
        }else{
            //未登录 返回登录
            return json_encode(['status'=>'400011','msg'=>'请先登录。']);
        }
    }

    public function cartList(){
        //获取用户ID
        $user=session('user');
        //判断是否登录
        if(!empty($user)){
            //获取当前用户下的加入购物车的商品
            $cart_info=Shop_cart::select('shop_cart.*','goods_name','goods_img','goods_price')
                                ->leftjoin('shop_goods','shop_cart.goods_id','=','shop_goods.goods_id')
                                ->where(['user_id'=>$user['user_id']])
                                ->get();
            //循环判断
            foreach($cart_info as $k=>$v){
                //判断是否是sku商品
                if(!empty($v->sku)){
                    //查询该sku商品的价格
                    $v->goods_price=Shop_skuModel::where(['goods_id'=>$v->goods_id,'sku'=>$v->sku])->value('goods_price');
                    //sku转换数组
                    $sku=explode(',',$v->sku);
                    //清空
                    $v->sku='';
                    //循环找属性名称
                    foreach($sku as $k1=>$v1){
                        $attrval=Attrval::where(['id'=>$v1])->first();
                        $attr=attr::where(['id'=>$attrval->attr_id])->first();
                        //拼接商品属性名称
                        $v->sku.=$attr->attr_name.':'.$attrval->attrval_name.',';
                    }
                    //去除多余字符
                    $v->sku=trim($v->sku,',');
                }
                //求小计
                $v->subtotal=$v->cart_nums*$v->goods_price;
            }
        }else{
            //未登录
        }
        //渲染视图
        return view('index/cart',compact('cart_info'));
    }
}
