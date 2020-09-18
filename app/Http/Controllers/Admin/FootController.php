<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FootModel;
class FootController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	 $foot=FootModel::where(['is_del'=>1])->get();
        return view('admin.footlist',['foot'=>$foot]);

    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foot');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
 	{
      $data=request()->all();
      $data['add_time']=time();
      $data['is_del']=1;
      $info = FootModel::insert($data);
      if($info){
      	$arr=[
      		"success"=>200,
      		"msg"=>"添加成功",
      		"url"=>"/admin/foot/list",
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
     *修改
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$foot=FootModel::where('id','=',$id)->first();
    	// print_r($foot);
    	return view('admin.footedit',['foot'=>$foot]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行修改
    public function update(Request $request)
    {
    	$id= request()->id;
        $data = request()->except('id');
        $info = FootModel::where('id','=',$id)->update($data);
        // $foot_name = request()->post('foot_name');
         if($info!==false){
      	$arr=[
      		"success"=>200,
      		"msg"=>"修改成功",
      		"url"=>"/admin/foot/list",
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
    public function destroy($id)
    {
        //
    }

    // 删除
    public function Fdel(Request $request){
        $id = $request->all();
        $res = FootModel::where($id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
   
}
