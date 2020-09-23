<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\GoodsModel;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\admin\CategoryController;
//引入分类model
use App\models\ClassModel;
//引入品牌model
use App\Model\BrandModel;

class GoodsController extends CategoryController
{
    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品修改页面
     */
    public function goods(Request $request){
        if($request->ajax() && $request->post()){
            $data=$request->all();
            if(empty($data['goods_name']) || empty($data['goods_sn']) || empty($data['goods_store']) || empty($data['goods_score'])){
                return ['code'=>1000,'msg'=>'缺少必要参数','data'=>[]];
            }
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
        //分类
        $category_info=ClassModel::where(['is_del'=>1])->get();
        $category=$this->getTree($category_info);
        //商品
        $brand=BrandModel::where(['is_del'=>1])->get();
        return view('admin/goodsEdit',compact('category','brand'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品展示页面
     */
    public function goodsShow(Request $request)
    {
        //搜索
        $goods_name = request()->goods_name ? request()->goods_name : '';
        $goods = new GoodsModel();
        $where = [
            ['shop_goods.is_del', '=', 1]
        ];
        if (!empty($goods_name)) {
            $where[] = ['goods_name', 'like', "%$goods_name%"];
        }

        $info = $goods::where($where)->paginate(5);
        foreach ($info as $v) {
            $info = $goods::select('shop_goods.*', 'cate_name', 'brand_name')
                ->leftjoin('shop_class', 'shop_goods.cate_id', '=', 'shop_class.cate_id')
                ->leftjoin('shop_brand', 'shop_goods.brand_id', '=', 'shop_brand.brand_id')
                ->where($where)
                ->paginate(5);
            foreach ($info as &$v) {

                $v->goods_img = explode(',', $v->goods_img);
            }
            return view('admin/goodsShow', ['info' => $info, 'goods_name' => $goods_name]);
        }
    }

    /**
     * @param Request $request
     * @return array
     * 商品删除页面
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品执行修改
     */
    public function goodsUpdate(Request $request){
        $goods=new GoodsModel();
        $goods_id=$request->goods_id;
        $updateShow=$goods->UpdateShow($goods_id);
        return view('admin/goodsUpdate',['updateShow'=>$updateShow]);
    }


    /**
     * @param Request $request
     * @return array
     * 商品修改页面
     */
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

    /**
     * @param Request $request
     * @return string
     * 商品文件上传
     */
    public function goodsImg(Request $request){
        $file=$_FILES['Filedata'];
        $tmp_name=$file['tmp_name'];
        $imgType=explode('.',$file['name'])[1];
        $img='./images/'.date("Y/m/d/");
        $img2=date('Ymds').uniqid().'.'.$imgType;
        $img3=$img.$img2;
        if(!is_dir($img)){
            mkdir($img,0777,true);
        }
        if(!file_exists($img3)) {
            move_uploaded_file($tmp_name,$img3);
        }
        return trim($img3,'.');
    }
    public function goodsVerify(){
        $goods_name=request()->goods_name;
        $redis_name=Redis::get($goods_name);
        if(!empty($redis_name)){
            return ['code'=>1000,'msg'=>'商品已存在','data'=>[]];
        }
        $goods=new GoodsModel();
        $goods2=$goods->where('goods_name',$goods_name)->count();
        if($goods2>=1){
            Redis::setex($goods_name,3600,$goods2);
            return ['code'=>1000,'msg'=>'商品已存在','data'=>[]];
        }
        return ['code'=>200,'msg'=>'OK','data'=>[]];
    }
    public function goodsVerify2(){
        $goods_id=request()->goods_id;
        if(empty($goods_id)){
            return ['code'=>1000,'msg'=>'商品ID有误','data'=>[]];
        }
        $goods_name=request()->goods_name;
        $redis_name=Redis::get($goods_name.$goods_id);
        if(!empty($redis_name)){
            return ['code'=>1000,'msg'=>'商品已存在','data'=>[]];
        }
        $goods=new GoodsModel();
        $where=[
            ['goods_id','!=',$goods_id],
            ['goods_name','=',$goods_name]
        ];
        $goods2=$goods->where($where)->count();
        if($goods2>=1){
            Redis::setex($goods_name.$goods_id,3600,$goods2);
            return ['code'=>1000,'msg'=>'商品已存在','data'=>[]];
        }
        return ['code'=>200,'msg'=>'OK','data'=>[]];
    }
}
