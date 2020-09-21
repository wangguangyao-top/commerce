<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品属性名称 model
use App\Model\Shop_attrModel;
//引入商品属性值 model
use App\Model\Shop_attrval;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     * 商品属性展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "展示页面";
    }

    /**
     * Show the form for creating a new resource.
     * 商品属性添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('admin/sku/add',compact('attr_info'));
    }

    /**
     * Store a newly created resource in storage.
     * 商品属性执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "执行添加";
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
