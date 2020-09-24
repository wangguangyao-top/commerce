<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;
use App\models\GoodsModel;

class ListController extends Controller
{
    public function list(){
        $navdata = NavModel::where('is_del',1)->get();
        $goods = GoodsModel::where(['is_del'=>1])->paginate(10);
//        dd($goods);
        foreach($goods as $v){
            //mb_substr  中文截取替换字符串
            $v->goods_name = mb_substr($v['goods_name'],0,12)."...";
            $v->goods_img=explode(',',$v->goods_img);
        }
//        dd($goods);
        return view('index/list',['data'=>$goods],compact('navdata'));
    }

}
