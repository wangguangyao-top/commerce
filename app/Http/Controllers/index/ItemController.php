<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品model
use App\models\GoodsModel;

class ItemController extends Controller
{
    public function item(){
        //接值
        $goods_id=request()->get('goods_id');
        //查询商品数据
        $goods_info=GoodsModel::where(['goods_id'=>$goods_id])->first();
        //判断是否为空
        if(empty($goods_info)){
            die('该商品不存在');
        }
        //相关分类
<<<<<<< HEAD
        // dd($goods_info->cate_id);
=======
//        dd($goods_info->cate_id);
>>>>>>> c1cbd8eea2ef4f5f9f163ca9c882d4f23c26c69a
        //渲染视图
        return view('index/item',compact('goods_info'));
    }
}
