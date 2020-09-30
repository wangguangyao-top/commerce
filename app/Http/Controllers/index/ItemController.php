<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品model
use App\models\GoodsModel;
use App\Model\Shop_skuModel as SKU;
use App\Model\Shop_attrval as SKU2;
use App\Model\Shop_attrModel as SKU3;
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
//        dd($goods_info->cate_id);
        //渲染视图
        $goods=SKU::where('goods_id',$goods_id)->get()->toArray();
        foreach ($goods as $k=>&$v) {
            $arr3[]=explode(',',$v['sku']);
//            $v['sku1']=SKU2::select('attrval_name','attr_id')->whereIn('id',$v['sku'])->get()->toArray();
            $v['sku2']=SKU2::whereIn('id',$arr3)->get('attr_id')->toArray();
            $arr=SKU3::select('shop_attr.id','shop_attr.attr_name')->whereIn('shop_attr.id', $v['sku2'])->get()->toArray();

        }
        foreach ($arr as $k1=>&$v1) {
            $arr2=SKU2::select('id','attr_id','attrval_name')->where('attr_id',$v1['id'])->get()->toarray();
            $v1['att']=$arr2;
            foreach ($arr3 as $k2=>$v2) {
                foreach ($v2 as $v4) {
                    foreach ($v1['att'] as $k3=>&$v3) {
                        if($v4==$v3['id']){
                            $v1['att2'][$k3]=$v3;
                        }
                    }
                }
            }
        }
        return view('index/item',compact('goods_info'),['sku'=>$arr]);
    }
    public function item_sku(Request $request){
        $id=$request->id;
        $goods_id=$request->goods_id;
        if(empty($goods_id)){
            return ['code'=>1000,'msg'=>'缺少必要参数'];
        }
        $where=[];
        if(empty($id)){
            return ['code'=>1000,'msg'=>'属性必选'];
        }
        $id=implode(',',$id);
        $where[]=['goods_id','=',$goods_id];
        $where[]=['sku','=',$id];
        $where[]=['is_del','=',1];
        $info=SKU::where($where)->first();
        $info=json_decode($info,true);
        return ['code'=>200,'msg'=>'OK','data'=>$info];
    }
}
