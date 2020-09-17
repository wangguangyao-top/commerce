<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Shop_attrval;
use Illuminate\Http\Request;
//引入商品属性名称model
use App\Model\Shop_attrModel;

class AttrvalController extends Controller
{
    /**
     * Display a listing of the resource.
     * 展示页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化 属性值model
        $attrval=new Shop_attrval();
        //调用自身进行查询
        $attrval_info=$attrval->selectData(5);
        //渲染视图
        return view('admin/attrval/index',compact('attrval_info'));
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //实例化商品属性名称model
        $attr=new Shop_attrModel();
        //调用查询方法
        $attr_info=$attr->selectData();
        //渲染视图
        return view('admin/attrval/add',compact('attr_info'));
    }

    /**
     * Store a newly created resource in storage.
     * 执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接值
        $data=$request->all();
        //组合数据
        $data['add_time']=time();
        //实例化商品属性值model
        $attrval=new Shop_attrval();
        //调用添加方法
        $bol=$attrval->insertData($data);
        //返回结果
        return $bol;
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
     * 修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //实例化 商品属性值 model
        $attrval=new Shop_attrval();
        //调用查询单条数据方法
        $info=$attrval->editData($id);
        //实例化商品属性名称model
        $attr=new Shop_attrModel();
        //调用查询方法
        $attr_info=$attr->selectData();
        //渲染视图
        return view('admin/attrval/edit',compact('attr_info','info'));
    }

    /**
     * Update the specified resource in storage.
     * 执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接值
        $data=$request->post();
        //组合修改时间
        $data['up_time']=time();
        //实例化 商品属性值 model
        $attrval=new Shop_attrval();
        //调用修改方法
        $bol=$attrval->updateData($id,$data);
        //判断结果
        if($bol!==false){
            //成功返回
            return json_encode(['status'=>'00000','msg'=>'商品属性值修改成功。'],JSON_UNESCAPED_UNICODE);
        }else{
            //失败返回
            return json_encode(['status'=>'00004','msg'=>'商品属性值修改失败。'],JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //实例化 商品属性值 model
        $attrval=new Shop_attrval();
        //调用删除方法进行删除
        $bol=$attrval->destroyData($id);
        //判断类型
        if($bol!==false){
            //删除成功
            return redirect('admin/attrval');
        }else{
            //删除失败
            return redirect('admin/attrval');
        }
    }
}
