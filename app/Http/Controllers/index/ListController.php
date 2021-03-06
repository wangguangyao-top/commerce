<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;
use App\models\GoodsModel;
use App\Model\BrandModel;
use App\Model\HistoryModel;

class ListController extends Controller
{
    public function list()
    {
        //列表品牌
        $cate_id=request()->cate_id;
        $where=[];
        if(!empty($cate_id)){
            $where[]=['cate_id','=',$cate_id];
        }
        $where[]=['is_del','=',1];
        $bran = BrandModel::select('brand_log', 'brand_id')->where('is_del', 1)->limit('18')->get()->toArray();
        //列表商品数据
        $count=GoodsModel::where($where)->get()->toArray();
        if(!empty($count)){
            $goods = GoodsModel::where($where)->paginate(10);
        }else{
            $goods=GoodsModel::where(['is_del'=>1])->paginate(10);
        }
        foreach ($goods as $v) {
            $v->goods_name = mb_substr($v->goods_name, 0, 12) . "...";
            $v->goods_img = explode(',', $v->goods_img);
        }
        //价格区间
        $goods_price = GoodsModel::where(['is_del'=>1])->max('goods_price');

        $price = ceil($goods_price / 7);
        for ($i = 0; $i <= 7 - 1; $i++) {
            $str = $price * $i;
            $str2 = $price * ($i + 1) - 1;
            $str3 = $str . '-' . $str2;
            $arr[] = $str3;
        }
        $navdata = NavModel::where('is_del', 1)->get()->toArray();
        return view('index/list', ['data' => $goods], compact('navdata', 'bran', 'arr'));
    }

    public function list2(Request $request)
    {
        $data = $request->all();
        $where = [];
        if (isset($data['brand_id'])) {
            if (!empty($data['brand_id'])) {
                $where[] = ['brand_id', '=', $data['brand_id']];
            }
        }
        if (isset($data['goods_price'])) {
            if (!empty($data['goods_price'])) {
                $goods_price = explode('-', $data['goods_price']);
                $where[] = ['goods_price', '>=', $goods_price[0]];
                $where[] = ['goods_price', '<=', $goods_price[1]];
            }

        }
        if (isset($data['class2'])) {
            if (!empty($data['class2'])) {
                switch ($data['class2']) {
                    case 'synthesize';

                        break;
                    default;
                        $where[] = [$data['class2'], '=', 1];
                }
            }
        }
        $where[] = ['is_del', '=', 1];
        $goods = GoodsModel::where($where)->get()->toarray();
        foreach ($goods as &$v) {
            $v['goods_name'] = mb_substr($v['goods_name'], 0, 12) . "...";
            $v['goods_img'] = explode(',', $v['goods_img']);
        }
        return ['code' => 200, 'msg' => 'OK', 'data' => $goods];
    }
}
