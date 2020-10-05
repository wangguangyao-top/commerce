<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\models\NavModel;
use Illuminate\Http\Request;
use App\models\ClassModel;
use App\models\GoodsModel;
use App\models\slideModel;
class IndexController extends Controller
{
    public function index()
    {
        //商品分类导航
        $class = ClassModel::select('cate_id', 'cate_name', 'p_id')->where(['is_del' => 1])->get()->toArray();
        $class = $this->getInfo($class);

        //商品今日推款
        $goods_img = GoodsModel::select('goods_img', 'goods_id')->orderBy('add_time', 'desc')->limit('4')->where('is_del', 1)->get()->toArray();
        $goods_img=$this->goods($goods_img);

        //猜你喜欢
        $goods = GoodsModel::select('goods_id', 'goods_img','goods_price','goods_name')->orderBy('add_time', 'desc')->limit('6')->where('is_del', 1)->get()->toArray();
        $goods=$this->goods($goods);
        //轮播图
        //头部导航
        $navdata = NavModel::where('is_del',1)->get()->toArray();
        $img=slideModel::select('slide_url','slide_log')->where('is_del',1)->limit('3')->get()->toArray();
        return view('index/index', ['info' => $class, 'goods_img' => $goods_img, 'goods' => $goods,'img'=>$img,'navdata'=>$navdata]);
    }

    public function getInfo($arr, $pid = 0)
    {
        $info = [];
        foreach ($arr as $key => $value) {
            if ($value["p_id"] == $pid) {
                $info[$key] = $value;
                $info[$key]['son'] = $this->getInfo($arr, $value["cate_id"]);
            }
        }
        return $info;
    }

    public function getTree($arr, $pid = 0, $level = 0)
    {
        static $list = [];
        foreach ($arr as $key => $value) {
            if ($value["p_id"] == $pid) {
                $value["level"] = $level;
                $list[] = $value;
                unset($arr[$key]); //删除已经排好的数据为了减少遍历的次数，当然递归本身就很费神就是了
                $this->getTree($arr, $value["cate_id"], $level + 1);
            }
        }
        return $list;
    }
//商品图片
    public function goods($goods)
    {
        foreach ($goods as $k => &$v) {
            $v['goods_img'] = explode(',', $v['goods_img'])[0];
        }
        return $goods;
    }

}
