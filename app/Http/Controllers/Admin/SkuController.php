<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品属性名称 model
use App\Model\Shop_attrModel;
//引入商品属性值 model
use App\Model\Shop_attrval;
//引入商品 model
use App\models\GoodsModel;
//引入商品属性表 model
use App\Model\Shop_skuModel;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     * 商品属性展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化 model
        $sku=new Shop_skuModel();
        //调用查询
        $sku_info=$sku->selectData();
        dd($sku_info);
    }

    /**
     * Show the form for creating a new resource.
     * 商品属性添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取商品名称
        $goods_info=GoodsModel::select('goods_id','goods_name')->where(['is_del'=>1])->get();
        //查询商品属性名称
        $attr=new Shop_attrModel();
        //调用查询商品属性名称
        $attr_info=$attr->selectData();
        //循环获取属性值
        foreach($attr_info as $k=>$v){
            $attrval_info=Shop_attrval::where(['attr_id'=>$v->id])->get();
            $v['attrval_info']=$attrval_info->Toarray();
        }
        //渲染视图

        return view('admin/sku/add',compact('attr_info','goods_info'));
    }

    /**
     * Store a newly created resource in storage.
     * 商品属性执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($goods_id,Request $request)
    {

            $data=$request->all();
            //添加时间戳
            $data1=array();
            foreach($data as $k=>$v){
                $data1[]=$v;
            };
            $cart=$this->CartesianProduct($data1);
            $count=count($cart);
            $data2=[];
            $arr=[];
            foreach($cart as $K1=>$v1){
                $data2[$K1]['sku']=$v1;
                $data2[$K1]['goods_id']=$goods_id;
                $data2[$K1]['add_time']=time();
            }
            //实例化 model
            $sku=new Shop_skuModel();
            //调用model进行添加
            $info=$sku::where('is_del',1)->orderBy('add_time','desc')->limit($count)->get()->toArray();
            foreach($info as $vv3){
                $arr3[]=explode(',',$vv3['sku']);
            }

            $attrval=new Shop_attrval;
            foreach($arr3 as $vv4){
                $arr4[]=$attrval::select('attr_id','attrval_name')->whereIn('id',$vv4)->get()->toArray();
            }
            $Shop_attrModel=new Shop_attrModel;
            $attrInfo=$Shop_attrModel::where('is_del',1)->get()->toArray();
                foreach($arr4 as $kkk1=>&$vvv1){
                    foreach($vvv1 as $kkk2=>&$vvv2){
                        $arr5=($Shop_attrModel::where(['is_del'=>1,'id'=>$vvv2['attr_id']])->get('attr_name'));
                        foreach($arr5 as $kkk3=>$vvv3){
                            $vvv2['attr_id']=$vvv3->attr_name;
                        }
                    }
                }
        dump($arr4);

        dd($arr4);
            return ['code'=>200,'msg'=>'OK','data'=>$info];
            $bol=$sku->insertData($data2);
            if($bol){
            }else{
                return ['code'=>1000,'msg'=>'NO'];
            }

        //返回结果
    }

    /**
     * @param $sets
     * @return arrayd
     * 笛卡尔积
     */
    public  function CartesianProduct($sets){
        // 循环遍历集合数据
        $result = array();
        for($i=0,$count=count($sets); $i<$count-1; $i++){
            // 初始化
            if($i==0){
                $result = $sets[$i];
            }
            // 保存临时数据
            $tmp = array();
            // 结果与下一个集合计算笛卡尔积
            foreach($result as $res){
                foreach($sets[$i+1] as $set){
                    $tmp[] =    $res.','.$set;
                }
            }
//            // 将笛卡尔积写入结果
            $result = $tmp;

        }
        return $result;
    }

    /**
     * Display the specified resource.
     * 预览详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 商品属性修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //‘
        echo "修改页面";
    }

    /**
     * Update the specified resource in storage.
     * 商品属性执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo "执行修改";
    }

    /**
     * Remove the specified resource from storage.
     * 商品属性执行删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo "执行删除";
    }
}
