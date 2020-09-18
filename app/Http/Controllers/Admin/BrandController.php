<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BrandModel;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = BrandModel::where(['is_del'=>1])->get();
        return view('admin.brand.index',['brand'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.brand.create');
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
      $data['add_time']=time();
      $data['is_del']=1;
      $info = BrandModel::insert($data);
      if($info){
        $arr=[
            "success"=>200,
            "msg"=>"成功喽！",
            "url"=>"/admin/brand",
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
   //
    public function update(Request $request)
    {
        $brand_id= request()->brand_id;
        $data = request()->except('brand_id');
        $info = BrandModel::where('brand_id','=',$brand_id)->update($data);
        // dd($info);
       
         if($info!==false){
        $arr=[
            "success"=>200,
            "msg"=>"修改成功",
            "url"=>"/admin/brand/",
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

   public function addimg(){
        $arr = $_FILES["Filedata"];
        $tmpName = $arr['tmp_name'];
        $ext  = explode(".",$arr['name'])[1];
        $newFileName = md5(time()).".".$ext;
        $newFilePath = "./uploads/".$newFileName;
        move_uploaded_file($tmpName, $newFilePath);
        $newFilePath = trim($newFilePath,".");
        echo $newFilePath;
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
    public function edit($brand_id)
    {
        $brand=BrandModel::where('brand_id',$brand_id)->first();
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        //
    }
     // 删除
    public function Fdel(Request $request){
        $brand_id = $request->all();
        // dd($brand_id);
        $res = BrandModel::where($brand_id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
}
