<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引入商品属性名称model
use App\Model\Shop_attrModel;

class Attrcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     * 展示页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //实例化model
        $attr=new Shop_attrModel();
        //调用查询方法
        $data=$attr->selectData();
        //渲染视图
        return view('admin/attr/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * 添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //渲染视图
        return view('admin/attr/add');
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
        //实例化model
        $attr=new Shop_attrModel();
        //调用添加方法
        return $attr->insertData($data);
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
        //实例化model
        $attr=new Shop_attrModel();
        //调用添加方法
        $attr_info=$attr->editData($id);
        //渲染视图
        return view('admin/attr/edit',compact('attr_info'));
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
        //组合数据
        $data['up_time']=time();
        //实例化model
        $attr=new Shop_attrModel();
        //调用修改方法
        return $attr->updateData($id,$data);
    }

    /**
     * Remove the specified resource from storage.
     * 执行删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //实例化model
        $attr=new Shop_attrModel();
        //调用修改方法
        $bol=$attr->destroyData($id);
        //判断是否删除成功
        if($bol!==false){
            //删除成功
            return redirect('admin/attr');
        }else{
            //删除失败
            return redirect('admin/attr');
        }
    }
}
