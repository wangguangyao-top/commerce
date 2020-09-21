<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\NavModel;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //搜索        
        $name=request()->name ? request()->name : '';
        // $nav_name = $data['nav_name'];
        // dd($data);
            $where=[['is_del','=',2]];
        if(!empty($name)){
          $where=[['nav_name','like',"%$name%"],['is_del','=',2]];
        }
        $nav = NavModel::where($where)->paginate(3);
        //判断ajax分页请求
        if(Request()->Ajax()){
            return view('admin/cate/ajaxnav',['data'=>$nav,'nav_name'=>$name]);
        }else{
             return view('admin/cate/nav',['data'=>$nav,'nav_name'=>$name]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->all();
        $data['is_del']=2;
        $data['add_time']=time();
        // dd($data);
        $info = NavModel::insert($data);
        if($info){
            $arr=[
                "success"=>200,
                "msg"=>"添加成功",
                "url"=>"index",
            ];
        }else{
            $arr=[
                "success"=>1000,
                "msg"=>"添加失败",
                "url"=>"",
            ];
        }
      echo json_encode($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->all();
        $res = NavModel::where($id)->update(['is_del'=>1]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upda($id)
    {
        $foot=NavModel::where('nav_id','=',$id)->first();
        // print_r($foot);
        return view('admin.cate.update',['data'=>$foot]);
    }

    public function updata(Request $request)
    {
        $id   = request()->id;
        $data = request()->except('id');
        $info = NavModel::where('nav_id','=',$id)->update($data);
        print_r($info);die;
        // $foot_name = request()->post('foot_name');
         if($info!==false){
            $arr=[
                "success"=>200,
                "msg"=>"修改成功",
                "url"=>"/admin/nav/index",
            ];
          }else{
            $arr=[
                "success"=>1000,
                "msg"=>"修改失败",
                "url"=>"",
            ];
        }
        echo json_encode($arr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        $nav_name = request()->nav_name;
        $res=NavModel::where("nav_name",$nav_name)->first();
        if($res){
            return $message = [
                "code"=>1,
            ];
        }
    }
}
