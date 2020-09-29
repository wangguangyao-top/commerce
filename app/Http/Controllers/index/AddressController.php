<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\models\AreaModel;
use App\models\UseraddressModel;
class AddressController extends Controller
{
	// 用户收货地址
    public function create(){
        $addressInfo=UseraddressModel::where('is_del','=',1)->get();
        // dd($addressInfo);die;
    	$provinceInfo=AreaModel::where(['pid'=>0])->get();
        // print_r($provinceInfo);die;
        return view('index.address',['data' => $provinceInfo,'addressInfo'=>$addressInfo]);
    }
    // 三级联动
    public function area(Request $request)
    {
        $data = $request->all();
        // print_r($data);die;
        $where = [
            ['pid' => $data]
        ];
        // print_r($where);die;
        $son = AreaModel::where(['pid' => $data])->get()->toArray();

        //空字符串
        $str='<option value="">请选择...</option>';
        //循环
        foreach ($son as $k => $v) {
            $str.='<option value="'.$v['id'].'">'.$v['name'].'</option>';
        }
        
        if($son !== false){
            return json_encode(['status'=>'200','msg'=>'ok','data'=>$str]);   
        }else{
            return json_encode(['status'=>'100','msg'=>'no']);
        }
    }

    
    // 执行添加
    public function store(Request $Request){
    	$data=request()->all();
        // dd($data);die;
        $data['is_del']=1;
        // dd($da);
        $info = UseraddressModel::insert($data);
      if($info){
        $arr=[
            "success"=>200,
            "msg"=>"成功喽！",
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

    // 删除
    public function Fdel(Request $request){
        $id = $request->all();
        // dd($brand_id);
        $res = UseraddressModel::where($id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
     
   
=======

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        return view('index/orderAddress');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
>>>>>>> e91f5634bd63d587c6fc4ee8fff2dc7fb3784fe9
}
