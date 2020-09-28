<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;
use App\models\GoodsModel;
use App\Model\BrandModel;
class ListController extends Controller
{
    public function list(){
        //列表品牌
        $bran=BrandModel::select('brand_log','brand_id')->where('is_del',1)->limit('18')->get()->toArray();
        //列表商品数据
        $goods = GoodsModel::where(['is_del'=>1])->paginate(10);
        foreach($goods as $v){
            $v->goods_name = mb_substr($v['goods_name'],0,12)."...";
            $v->goods_img=explode(',',$v->goods_img);
        }
        //价格区间
        $goods_price= GoodsModel::where(['is_del'=>1])->max('goods_price');
        $price=ceil($goods_price/7);
        for ($i=0;$i<=7-1;$i++){
            $str=$price*$i;
            $str2=$price*($i+1)-1;
            $str3=$str.'-'.$str2;
            $arr[]=$str3;
        }
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        return view('index/list',['data'=>$goods],compact('navdata','bran','arr'));
    }
    public function list2(Request $request){
        $brand_id=$request->brand_id;
        $where=[];
        if($brand_id){
            $where[]=['brand_id','=',$brand_id];
        }
        $where[]=['is_del','=',1];
        $goods=GoodsModel::where($where)->get()->toArray();

    }

}
