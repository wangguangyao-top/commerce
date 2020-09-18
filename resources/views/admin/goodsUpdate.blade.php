@extends('admin/public/layout')
@section('content')
    <!-- 正文区域 -->
    <!--必须引入以下两个文件-->
    <link rel="stylesheet" href="/admin/uploadify/uploadify.css">
    <script src="/admin/uploadify/jquery.uploadify.js"></script>
    <span class="img2" style="display:none"></span>
    <section class="content">
        <div class="box-body">
            <!--tab页-->
            <div class="nav-tabs-custom">
                <!--tab头-->
                <!--tab头/-->
                <!--tab内容-->
                <div class="tab-content">
                    <!--表单内容-->
                    <div class="tab-pane active" id="home">
                        <div class="row data-type">
                            <div class="col-md-2 title">商品分类</div>

                            <div class="col-md-10 data">
                                {{--                            <table>--}}
                                {{--                                <tr>--}}
                                {{--                                    <td>--}}
                                {{--                                        <select class="form-control" >--}}
                                {{--                                        </select>--}}
                                {{--                                    </td>--}}
                                {{--                                    <td>--}}
                                {{--                                        <select class="form-control select-sm" ></select>--}}
                                {{--                                    </td>--}}
                                {{--                                    <td>--}}
                                {{--                                        <select class="form-control select-sm" ></select>--}}
                                {{--                                    </td>--}}
                                {{--                                    <td>--}}
                                {{--                                        模板ID:19--}}
                                {{--                                    </td>--}}
                                {{--                                </tr>--}}
                                {{--                            </table>--}}

                            </div>

                            <div class="col-md-2 title">商品名称</div>
                            <div class="col-md-10 data">
                                <input type="text" class="form-control" value="{{$updateShow->goods_name}}" id="goods_name"  placeholder="商品名称" >
                            </div>

                            <div class="col-md-2 title">商品货号</div>
                            <div class="col-md-10 data">
                                <input type="text" class="form-control" value="{{$updateShow->goods_sn}}" id="goods_sn"  placeholder="商品货号" >
                            </div>

                            <div class="col-md-2 title">品牌</div>
                            <div class="col-md-10 data">
                                {{--                            <select class="form-control" ></select>--}}
                            </div>

                            <div class="col-md-2 title">商品价格</div>
                            <div class="col-md-10 data">
                                <div class="input-group">
                                    <span class="input-group-addon">¥</span>
                                    <input type="text" class="form-control" value="{{$updateShow->goods_price}}" id="goods_price" placeholder="价格">
                                </div>
                            </div>

                            <div class="col-md-2 title">商品图片</div>
                            <div class="col-md-10 data" >
                                <input type="file" multiple name="goods_img" id="goods_img">
                                <input type="hidden" value="" class="img">
                            </div>
                            <div class="col-md-2 title rowHeight2x">商品库存</div>
                            <div class="col-md-10 data rowHeight2x">
                                <input type="text" class="form-control" id="goods_store" value="{{$updateShow->goods_store}}"  placeholder="商品库存" >
                            </div>

                            <div class="col-md-2 title rowHeight2x">是否展示</div>
                            <div class="col-md-10 data rowHeight2x">
                                是<input type="radio" name="is_show" {{$updateShow->is_show==1?'checked':''}} id="is_show" value="1">
                                否<input type="radio" name="is_show" {{$updateShow->is_show==2?'checked':''}} id="is_show" value="2">
                            </div>

                            <div class="col-md-2 title rowHeight2x">是否热门</div>
                            <div class="col-md-10 data rowHeight2x">
                                是<input type="radio" name="is_hot" {{$updateShow->is_hot==1?'checked':''}} id="is_hot" value="1">
                                否<input type="radio" name="is_hot"  {{$updateShow->is_hot==2?'checked':''}} id="is_hot" value="2">
                            </div>

                            <div class="col-md-2 title rowHeight2x">是否上架</div>
                            <div class="col-md-10 data rowHeight2x">
                                是<input type="radio" name="is_up" {{$updateShow->is_up==1?'checked':''}} id="is_up" value="1">
                                否<input type="radio" name="is_up" {{$updateShow->is_up==2?'checked':''}} id="is_up" value="2">
                            </div>
                            <div class="col-md-2 title rowHeight2x">是否新品</div>
                            <div class="col-md-10 data rowHeight2x">
                                是<input type="radio" name="is_new" {{$updateShow->is_new==1?'checked':''}} id="is_new" value="1">
                                否<input type="radio" name="is_new" {{$updateShow->is_new==2?'checked':''}}  id="is_new" value="2">
                            </div>

                            <div class="col-md-2 title rowHeight2x">购买积分奖励</div>
                            <div class="col-md-10 data rowHeight2x">
                                <input type="text" class="form-control" id="goods_score" value="{{$updateShow->goods_score}}" placeholder="购买积分奖励" value="">
                            </div>
                            <div class="col-md-2 title editer">商品简介</div>
                            <div class="col-md-10 data editer">
                                <textarea type="text" name="content" id="goods_desc" placeholder="请输入内容">{{$updateShow->goods_desc}}</textarea>
                            </div>
                            <div class="col-md-2 title rowHeight2x">商品包装简介</div>
                            <div class="col-md-10 data rowHeight2x">
                                <textarea type="text" name="content" id="goods_content" class="form-control" placeholder="请输入内容">{{$updateShow->goods_content}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!--图片上传-->
                </div>
                <!--tab内容/-->
                <!--表单内容/-->
            </div>
        </div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" ng-click="setEditorValue();save()" type="button"><i class="fa fa-save"></i>保存</button>
            <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
        </div>

    </section>
    <!-- 自定义规格窗口 -->
    <!-- 正文区域 /-->
    <script type="text/javascript" charset="utf-8">//初始化编辑器
        window.UEDITOR_HOME_URL = "/ueditor/";//配置路径设定为UEditor所放的位置
        window.onload=function(){
            window.UEDITOR_CONFIG.initialFrameHeight=200;//编辑器的高度
            window.UEDITOR_CONFIG.initialFrameWidth=400;//编辑器的宽度
            var editor = new UE.ui.Editor({
                imageUrl : '',
                fileUrl : '',
                imagePath : '',
                filePath : '',
                imageManagerUrl:'', //图片在线管理的处理地址
                imageManagerPath:'__ROOT__/'
            });
            editor.render("goods_desc");//此处的EditorId与<textarea name="content" id="EditorId">的id值对应 </textarea>
        }
    </script>
    <script>
        $(function (){
            $("#goods_img").uploadify({
                uploader: '/admin/goodsImg/uploader',
                swf: '/admin/uploadify/uploadify.swf',
                buttonText:'上传图片',
                onUploadSuccess: function (file,img,data) {
                    var img1=img+',';
                    $('.img2').append(img1);
                    var img2=$('.img2').text();
                    $('.img').val(img2);
                }
            });
        })
    </script>
    <script>
        $(function (){
            $(document).on('click','.btn',function (){
                var goods_name=$('#goods_name').val();
                var goods_sn=$('#goods_sn').val();
                var goods_price=$('#goods_price').val();
                var goods_img=$('.img').val();
                var goods_desc=UE.getEditor('goods_desc').getContent();
                var is_show=$('#is_show').val();
                var is_hot=$('#is_hot').val();
                var is_up=$('#is_up').val();
                var is_new=$('#is_new').val();
                var goods_score=$('#goods_score').val();
                var goods_content=$('#goods_content').val();
                var goods_store=$('#goods_store').val();
                var url='/admin/goods/update';
                var data={
                    goods_id:{{$updateShow->goods_id}},
                    goods_name:goods_name,
                    goods_sn:goods_sn,
                    goods_price:goods_price,
                    goods_desc:goods_desc,
                    goods_store:goods_store,
                    goods_img:goods_img,
                    is_show:is_show,
                    is_hot:is_hot,
                    is_up:is_up,
                    is_new:is_new,
                    goods_score:goods_score,
                    goods_content:goods_content,
                };
                $.ajax({
                    type:'post',
                    url:url,
                    data:data,
                    dataType:'json',
                    success:function (info){
                        if(info.code){
                            alert(info.msg)
                            location.href='/admin/goods/goodsShow';
                        }else{
                            alert(info.msg)
                        }
                    }
                })
            })
        })
    </script>
@endsection


