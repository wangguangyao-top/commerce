<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入订单表 model
use App\Model\Shop_order as order;

class PayController extends Controller
{
    /**
     * 支付页面
     */
    public function pay()
    {
        //接值
        $order_on=request()->order_on;
        //查询订单总价
        $money=order::where(['order_sn'=>$order_on])->value('order_amount');
        // 订单付款页
        return view('index/pay',compact('order_on','money'));
    }
}
