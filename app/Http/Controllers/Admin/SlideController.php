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
    // 添加
    public function slide_add(Request $request){
        $ta = $request->except('_token');
        // if($request->hasFile('Filename')){ //hasFile 方法判断文件在请求中是否存在
        //     $data['Filename'] = $this->uploads('Filename');
        // }
        // dd($data);
        if($request->hasFile('slide_url')){ //hasFile 方法判断文件在请求中是否存在
            $ta['slide_url'] = $this->Moreupload('slide_url');
        }
        $data = [
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
        $res = slideModel::find($id);
        return view("admin.slide.slide_upd",['res'=>$res]);
    }
    public function slide_upddo($id){
        $data = request()->all();

        if(request()->hasFile('slide_url')){ //hasFile 方法判断文件在请求中是否存在
            $data['slide_url'] = $this->Moreupload('slide_url');
        }

        $res = slideModel::where("slide_id",$id)->update($data);
//        print_r($res);die;
//        状态码未修改是0，修改了是0
        if($res){
            return Redirect("admin/slide/slide_show");
        }
        if($res==0){
            return Redirect("admin/slide/slide_show");
        }

    }
    public function Moreupload($img){
        $file = request()->file($img);
        // dd($file);
        if($file->isValid()){
            $info = $file->store('upload');
        }
        return $info;
    }

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
