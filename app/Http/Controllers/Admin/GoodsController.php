<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\GoodsModel;

class GoodsController extends Controller
{
    public function goods(Request $request){
        if($request->ajax() && $request->post()){
            $data=$request->all();
            $data['goods_img']=trim($data['goods_img'],',');
            $data['add_time']=time();
            $data['is_del']=1;
            $goods=new GoodsModel();
            $add=$goods->add($data);
            if($add){
                return ['code'=>200,'msg'=>'OK','data'=>[]];
            }else{
                return ['code'=>1000,'msg'=>'NO','data'=>[]];
            }
        }
        return view('admin/goodsEdit');
    }
    public function goodsShow(){
        $goods=new GoodsModel();
        $info=$goods::where('is_del',1)->get();
        $info1=json_encode($info);
        $info2=json_decode($info1,true);
        foreach ($info2 as &$v) {
            $v['goods_img']=explode(',',$v['goods_img']);
        }
        return view('admin/goodsShow',['info'=>$info2]);
    }
    public function goodsDel(Request $request){
        $goods=new GoodsModel();
        $goods_id=$request->goods_id;
        $del=$goods->del($goods_id);
        if($del){
            return ['code'=>200,'msg'=>'OK','data'=>[]];
        }else{
            return ['code'=>1000,'msg'=>'NO','data'=>[]];
        }
    }
    public function goodsUpdate(Request $request){
        $goods=new GoodsModel();
        $goods_id=$request->goods_id;
        $updateShow=$goods->UpdateShow($goods_id);
        return view('admin/goodsUpdate',['updateShow'=>$updateShow]);
    }
    public function update(Request $request){
        $goods=new GoodsModel();
        $upGoods=$request->all();
        $upGoods['goods_img']=trim($upGoods['goods_img'],',');
        $updateShow=$goods->GoodsUpdate($upGoods);
        if($updateShow!==false){
            return ['code'=>200,'msg'=>'OK','data'=>[]];
        }else{
            return ['code'=>1000,'msg'=>'NO','data'=>[]];
        }
    }
    public function goodsImg(Request $request){
        $file=$_FILES['Filedata'];
        $tmp_name=$file['tmp_name'];
        $imgType=explode('.',$file['name'])[1];
        $img='./images/'.date("Y/m/d/");
        $img2=date('Ymds').uniqid().'.'.$imgType;
        $img3=$img.$img2;
        if(!is_dir($img)){
            mkdir(dirname($img),0777,true);
        }
        if(!file_exists($img3)) {
            move_uploaded_file($tmp_name,$img3);
        }
        return trim($img3,'.');
    }
}
