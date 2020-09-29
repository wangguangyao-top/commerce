<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入导航model
use App\models\NavModel;
//引入商品model
use App\models\GoodsModel;
//引入cookie
use Illuminate\Support\Facades\Cookie;
//引入浏览记录model
use App\Model\HistoryModel;

class HistoryController extends Controller
{
    public function index(){
        //获取用户ID
        $user=json_decode(session('user'));
        //判断是否登录
        if(empty($user)){
            //未登录 取cookie数据
            $historyList=Cookie::get('history');
            //判断cookie中是否有值
            if(!empty($historyList)){
                //反序列化
                $historyList=unserialize($historyList);
                //数组反转
                $historyList=array_reverse($historyList);
                //获取商品ID
                $historyList=array_column($historyList,'goods_id');
                //数组去重
                $historyList=array_unique($historyList);
                //数组截取一段
                $historyList=array_slice($historyList,0,10);
                //查询
                $historyList=GoodsModel::whereIn('goods_id',$historyList)->orderBy(\DB::raw('FIND_IN_SET(goods_id, "' . implode(",", $historyList) . '"' . ")"))->get();
            }
        }else{
            //登录取数据库
            //根据用户ID获取该用户的浏览记录
            $goods_id=HistoryModel::where(['user_id'=>$user->user_id])->orderBy('hi_time','desc')->get(['goods_id'])->Toarray();
            //数组截取一段
            $goods_id=array_slice($goods_id,0,10);
            //空变量
            $historyList=[];
            //判断是否有浏览记录
            if(!empty($goods_id)){
                //循环获取商品数据
                foreach($goods_id as $k=>$v){
                    $historyList[$k]=GoodsModel::where(['goods_id'=>$v])->first()->Toarray();
                }
            }
        }
        //个数
        $historyCount='';
        if(!empty($historyList)){
            $historyCount=count($historyList);
        }

        //查询导航数据
        $navdata = NavModel::where('is_del',1)->get();
        //渲染视图
        return view('index/history',compact('navdata','historyList','historyCount'));
    }
}
