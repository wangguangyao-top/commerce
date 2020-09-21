<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\slideModel;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    // 展示
    public function slide_show(){
        $res = slideModel::where("is_del",1)->paginate(2);
        return view("admin.slide.slide_show",['res'=>$res]);
    }
    //使用插件图片上传
    public function addimg(Request $request){
        $arr = $_FILES["Filedata"];
        $tmpName = $arr['tmp_name'];
        $ext  = explode(".",$arr['name'])[1];
        $newFileName = md5(time()).".".$ext;
        $newFilePath = "./uploads/".$newFileName;
        move_uploaded_file($tmpName, $newFilePath);
        $newFilePath = trim($newFilePath,".");
        echo $newFilePath;
    }
    // 添加
    public function slide_add(Request $request){
        $ta = $request->all();
//print_r($ta);die;
//        if($request->hasFile('slide_url')){ //hasFile 方法判断文件在请求中是否存在
//            $ta['slide_url'] = $this->Moreupload('slide_url');
//        }
        $data = [
//            "img_path"=>$ta['img_path'],
            "slide_url"=>$ta['slide_url'],
            "is_show"=>1,
            "add_time"=>time(),
            "slide_weight"=>$ta['slide_weight'],
        ];
        //dd($data);
        $res = slideModel::insert($data);
        // dd($res);
        if($res){
            return Redirect("admin/slide/slide_show");
        }
//        return view("admin.slide.slide_show");
    }


    // 修改
    public function slide_upd($id){

        $res = slideModel::where('slide_id',$id)->first();

        return view("admin.slide.slide_upd",['res'=>$res]);
    }
    public function slide_upddo(){
        $id= request()->slide_id;
        $ta = request()->all();
//        dd($ta);
        $data = [
//            "img_path"=>$ta['img_path'],
            "slide_url"=>$ta['slide_url'],
            "is_show"=>1,
            "add_time"=>time(),
            "slide_weight"=>$ta['slide_weight'],
        ];
//        if(request()->hasFile('slide_url')){ //hasFile 方法判断文件在请求中是否存在
//            $data['slide_url'] = $this->Moreupload('slide_url');
//        }

        $res = slideModel::where("slide_id",$id)->update($data);
//        print_r($res);die;
//        状态码未修改是0，修改了是0
        if($res){
            return json_encode(['success'=>true]);
        }
        if($res==0){
            return json_encode(['success'=>false]);
        }

    }
    //普通的图片上传
//    public function Moreupload($img){
//        $file = request()->file($img);
//        // dd($file);
//        if($file->isValid()){
//            $info = $file->store('/uploads');
//        }
//        return $info;
//    }

    // 删除
    public function slide_del(Request $request){
        $slide_id = $request->all();
//        dd($slide_id);
        $res = slideModel::where("slide_id",$slide_id)->update(['is_del'=>2]);
        if($res){
            return $message = [
                "code"=>00002,
                "message"=>"删除成功",
                "success"=>true,
            ];
        }
    }
}
