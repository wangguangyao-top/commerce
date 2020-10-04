<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品model
use App\models\GoodsModel;
use App\Model\Shop_skuModel as SKU;
use App\Model\Shop_attrval as SKU2;
use App\Model\Shop_attrModel as SKU3;
//引入导航model
use App\models\NavModel;
//引入cookie类
use Illuminate\Support\Facades\Cookie;
//引入DB类
use Illuminate\Support\Facades\DB;
use App\Model\HistoryModel;

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
        //查询导航数据
        $navdata = NavModel::where('is_del',1)->get();
        //调用展示浏览记录方法
        $historyList=$this->GoodsHistoryList();
        //调用添加浏览记录方法
        $history=$this->GoodsHistory($goods_id,$goods_info);
        //渲染视图
        $goods=SKU::where('goods_id',$goods_id)->get()->toArray();
        $arr=[];
        if(!empty($goods)){
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
            if($info){
                return ['code'=>200,'msg'=>'OK','data'=>$info];
            }
    }

    /** 浏览记录
     * @return array|mixed|null|string
     */
    public function GoodsHistoryList(){
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
        //返回
        return $historyList;
    }

    /** 添加商品浏览记录
     * @param $goods_id 浏览商品ID
     * @param $goods_info 浏览商品信息
     */
    public function GoodsHistory($goods_id,$goods_info){
        //获取用户ID
        $user=json_decode(session('user'));
        //判断是否登录
        if(empty($user)){
            //取出cookie中的数据
            $history=Cookie::get('history');
            $history=unserialize($history);
            //存入cookie
            $history[]=[
                'goods_id'=>$goods_id,
                'goods_name'=>$goods_info->goods_name,
                'look_time'=>time()
            ];
            Cookie::queue('history',serialize($history));
            //返回
            return 'ok';
        }else{
            //登录 存入数据库
            //判断是否有该浏览记录
            $history=HistoryModel::where(['goods_id'=>$goods_id,'user_id'=>$user->user_id])->first();
            if(empty($history)){
                //没有记录添加
                //组合数据
                $history=[
                    'user_id'=>$user->user_id,
                    'goods_id'=>$goods_id,
                    'hi_time'=>time()
                ];
                //添加数据库
                $bol=HistoryModel::insert($history);
                //判断
                if($bol){
                    return 'ok';
                }
            }else{
                //有记录 修改浏览时间
                $bol=HistoryModel::where(['goods_id'=>$goods_id,'user_id'=>$user->user_id])->update(['hi_time'=>time()]);
                //判断
                if($bol!==false){
                    return 'ok';
                }
            }
        }
    }
}
