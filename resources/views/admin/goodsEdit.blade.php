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
                           <table>
                               <select class="form-control" id="cate_id" name="cate_id">
                                <option value="">请选择商品分类...</option>
                                @foreach($category as $k=>$v)
                                    <option value="{{$v->cate_id}}">{{str_repeat('--',$v->level)}}{{$v->cate_name}}</option>
                                    @endforeach
                            </select>
                           </table>

                        </div>
                        <div class="col-md-2 title">商品名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  id="goods_name"  placeholder="商品名称" >
                            <span style="color:red" class="span_name">*</span>
                        </div>

                        <div class="col-md-2 title">商品货号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  id="goods_sn"  placeholder="商品货号" >
                            <span style="color:red" class="span_sn">*</span>
                        </div>

                        <div class="col-md-2 title">品牌</div>
                        <div class="col-md-10 data">
                            <select class="form-control" id="brand_id" name="brand_id">
                                <option value="">请选择商品品牌...</option>
                                @foreach($brand as $k=>$v)
                                    <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 title">商品价格</div>
                        <div class="col-md-10 data">
                            <div class="input-group">
                                <span class="input-group-addon">¥</span>
                                <input type="text" class="form-control"  id="goods_price" placeholder="价格">
                                <span style="color:red" class="span_price">*</span>
                            </div>
                        </div>

                        <div class="col-md-2 title">商品图片</div>
                        <div class="col-md-10 data" >
                            <input type="file" multiple name="goods_img" id="goods_img">
                            <input type="hidden" value="" class="img">
                        </div>
                        <div class="col-md-2 title rowHeight2x">商品库存</div>
                        <div class="col-md-10 data rowHeight2x">
                            <input type="text" class="form-control" id="goods_store"  placeholder="商品库存" value="">
                            <span style="color:red" class="span_store">*</span>
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否展示</div>
                        <div class="col-md-10 data rowHeight2x">
                            是<input type="radio" name="is_show" checked id="is_show" value="1">
                            否<input type="radio" name="is_show" id="is_show" value="2">
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否热门</div>
                        <div class="col-md-10 data rowHeight2x">
                            是<input type="radio" name="is_hot" checked id="is_hot" value="1">
                            否<input type="radio" name="is_hot" id="is_hot" value="2">
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否上架</div>
                        <div class="col-md-10 data rowHeight2x">
                            是<input type="radio" name="is_up" checked id="is_up" value="1">
                            否<input type="radio" name="is_up" id="is_up" value="2">
                        </div>
                        <div class="col-md-2 title rowHeight2x">是否新品</div>
                        <div class="col-md-10 data rowHeight2x">
                            是<input type="radio" name="is_new" checked id="is_new" value="1">
                            否<input type="radio" name="is_new" id="is_new" value="2">
                        </div>

                        <div class="col-md-2 title rowHeight2x">购买积分奖励</div>
                        <div class="col-md-10 data rowHeight2x">
                            <input type="text" class="form-control" id="goods_score" placeholder="购买积分奖励">
                            <span style="color:red" class="span_score">*</span>
                        </div>
                        <div class="col-md-2 title editer">商品简介</div>
                        <div class="col-md-10 data editer">
                            <textarea type="text" name="content" id="goods_desc"  placeholder="请输入内容"></textarea>
                            <span style="color:red" class="span_desc">*</span>
                        </div>
                        <div class="col-md-2 title rowHeight2x">商品包装简介</div>
                        <div class="col-md-10 data rowHeight2x">
                            <textarea type="text" name="content" id="goods_content" class="form-control" placeholder="请输入内容"></textarea>
                            <span style="color:red" class="span_content">*</span>
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
        window.UEDITOR_CONFIG.initialFrameHeight=300;//编辑器的高度
        window.UEDITOR_CONFIG.initialFrameWidth=600;//编辑器的宽度
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
        $(document).on('blur','#goods_name',function (){
            var goods_name=$('#goods_name').val();
            if(goods_name==''){
                $('.span_name').text('商品名称必填');
                return false;
            }else{
                $('.span_name').text('');
            }
            var data={goods_name:goods_name};
            var url='/admin/goodsVerify';
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function (info){
                    if(info.code==1000){
                        $('.span_name').text(info.msg);
                    }
                }
            })
            return false;
        });
        $(document).on('click','.btn',function (){
            var fls=true;
            var goods_name=$('#goods_name').val();
            if(goods_name==''){
                $('.span_name').text('商品名称必填');
                fls=false;
            }else{
                $('.span_name').text('');
            }
            var goods_sn=$('#goods_sn').val();
            if(goods_sn==''){
                $('.span_sn ').text('商品货号必填');
                fls=false;
            }else{
                $('.span_sn').text('');
            }
            var goods_price=$('#goods_price').val();
            var reg=/((^[1-9]\d*)|^0)(\.\d{0,2}){0,1}$/
            if(!reg.test(goods_price)){
                $('.span_price').text('商品价格格式不正确');
                fls=false;
            }else{
                $('.span_price').text('*');
            }
            var goods_img=$('.img').val();
            var goods_desc=UE.getEditor('goods_desc').getContent();
            var is_show=$('#is_show').val();
            var is_hot=$('#is_hot').val();
            var is_up=$('#is_up').val();
            var is_new=$('#is_new').val();
            var cate_id=$('#cate_id').val();
            var brand_id=$('#brand_id').val();
            var goods_score=$('#goods_score').val();
            if(goods_score==''){
                $('.span_score').text('商品积分奖励必填');
                fls=false;
            }else{
                $('.span_price').text('');
            }
            var reg2=/^[1-9]*[1-9][0-9]*$/
            if(!reg2.test(goods_score)){
                $('.span_score').text('商品积分格式不正确');
                fls=false;
            }else{
                $('.span_score').text('');
            }
            var goods_content=$('#goods_content').val();
            var goods_store=$('#goods_store').val();
            if(goods_store==''){
                $('.span_store').text('商品库存必填');
                fls=false;
            }else{
                $('.span_store').text('');
            }
            if(!reg2.test(goods_store)){
                $('.span_store').text('商品库存格式不正确');
                fls=false;
            }else{
                $('.span_store').text('');
            }
            if(fls==false){
                return false;
            }
            var url='/admin/goods/goodsEdit';
            var data={
                goods_name:goods_name,
                goods_sn:goods_sn,
                goods_price:goods_price,
                goods_desc:goods_desc,
                goods_store:goods_store,
                goods_img:goods_img,
                cate_id:cate_id,
                brand_id:brand_id,
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
                    if(info.code==200){
                        alert(info.msg)
                        location.href='/admin/goods/goodsShow';
                    }else{
                        alert(info.msg)
                    }
                }
            })
        })
        return false;
    })
</script>
@endsection

