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
//商品表
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
            $data=$request->sku;

            //添加时间戳
            $data1=array();
            foreach($data as $k=>$v){
                $data2=explode(':',$v);
                $data1[$data2[0]][]=$data2[1];
            };
            $data1=array_values($data1);  //把二维数组下标重置0
            $cart=$this->CartesianProduct($data1);
            $cart2=json_encode($cart,JSON_UNESCAPED_UNICODE);
            $count=count($cart);
            $data2=[];
            foreach($cart as $k1=>$v1){
                $data2[$k1]['sku']=$v1;
                $data2[$k1]['goods_id']=$goods_id;
                $data2[$k1]['add_time']=time();
            }
            //实例化 model
            $sku=new Shop_skuModel();
            $bol=$sku->insertData($data2);
            if($bol){
                //调用model进行添加
                $info=$sku::join('shop_goods','shop_goods.goods_id','=','shop_sku.goods_id')->select('shop_sku.id','shop_sku.goods_id','shop_sku.sku','shop_goods.goods_name')->where('shop_sku.is_del',1)->orderBy('shop_sku.add_time','desc')->limit($count)->get()->toArray();
                $attrval=new Shop_attrval;
                $Shop_attrModel=new Shop_attrModel;
                foreach($info as $kk3=>&$vv3){
                    $vv3['sku']=explode(',',$vv3['sku']);
                    $vv3['sku']=$attrval::select('attr_id','attrval_name')->whereIn('id',$vv3['sku'])->get()->toArray();
                    $str='';
                    foreach($vv3['sku'] as $kkk2=>&$vvv2){
                        $arr5=($Shop_attrModel::where(['is_del'=>1,'id'=>$vvv2['attr_id']])->get('attr_name'));
                        foreach($arr5 as $kkk3=>$vvv3){
                            $vvv2['attr_id']=$vvv3->attr_name.'：'.$vvv2['attrval_name'];
                        }
                        $str.=$vvv2['attr_id'].',';
                        $vvv2['attr_id']=$str;
                    }
                    $vv3['sku']=array_pop($vv3['sku']);
                    $vv3['sku']=$vv3['sku']['attr_id'];
                }
                return ['code'=>200,'msg'=>'OK','data'=>$info];
            }else{
                return ['code'=>1000,'msg'=>'NO','data'=>[]];
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

        for($i=0,$count=count($sets); $i<$count-1;$i++){
            // 初始化
            if($i==0){
                $result = $sets[$i];
            }

            // 保存临时数据
            $tmp = array();
            // 结果与下一个集合计算笛卡尔积
            foreach($result as $res){
                foreach($sets[$i+1] as $set){
                    $tmp[] =   $res.','.$set;
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
    public function addSku(Request $request){
        $id=$request->id;
        $data=$request->except('id');
        $shop=Shop_skuModel::where('id',$id)->update($data);
        if($shop!==false){
            return ['code'=>200,'msg'=>'OK','data'=>[]];
        }else{
            return ['code'=>1000,'msg'=>'NO','data'=>[]];
        }
    }
}
