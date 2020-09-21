@extends('admin/public/layout')
@section('content')
        <!-- 正文区域 -->
<div class="box-header with-border">
    <h3 class="box-title">商品属性添加</h3>
</div>
<!--扩展属性-->
<section class="content">
    <div class="box-body">
        <!--tab页-->
        <div class="nav-tabs-custom">
            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;">属性添加</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content" id="sx">

                <!--表单内容-->
                <div class="tab-pane active">
                    <div class="row data-type">
                        <div class="col-md-2 title"><b>商品名称：</b></div>
                        <div class="col-md-10 data">
                            <select class="form-control" id="attr_id">
                                <option value="">请选择商品。</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active">
                    @foreach($attr_info as $k=>$v)
                    <div class="row data-type">
                        <div class="col-md-2 title"><b>商品{{$v->attr_name}}：{{$v->id}}</b></div>
                        <div class="col-md-10 data attr" data-id="{{$v->id}}">
                            @foreach($v->attrval_info as $kk=>$vv)
                            <input type="checkbox" name="attr_id" id="attr_id" class="sku_{{$vv['attr_id']}}" data-attr="{{$vv['attr_id']}}" value="{{$vv['id']}}">{{$vv['attrval_name']}}
                            @endforeach
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="sub">提交</button>
        <button class="btn btn-danger"><a href="{{url('admin/attrval')}}" style="color: #ffffff">返回列表页面</a></button>
    </div>

</section>
<!-- 正文区域 /-->

<script>
    $(document).ready(function(){
        function unique(arr) {
            return Array.from(new Set(arr))
        }
        //提交事件

        $(document).on('click','#sub',function(){
            //获取商品属性名称ID
            $('[name=attr_id]:checked').each(function(i){
                alert($(this).data('attr'));
            });
            return;
            var sku=[];
            var sku2=[];
            $('.sku:checked').each(function(){
            $(this).parent().attr('attr_id');
                sku.push($(this).parent().data('id'));
                sku2.push($(this).val());
            })
            var sku3=[];
            $.each(sku,function(i){
                $.each(sku2,function(ii){
                    sku3.push((sku[i]+':'+sku2[ii]));
                })
            });
            console.log(unique(sku3));

            //获取商品属性名称id
            //var attr_id=$('#attr_id').val()
            //获取属性值
            //var attrval_name=$('#attrval_name').val( )

//            $('.sku:checked')
//             var a=$(this).parents('#sx').find('.attr').data('id');
//            console.log(a);




































            //通过ajax传送值
//            $.ajax({
//                //请求路径
//                url:"/admin/attrval/store",
//                //请求方式
//                type:"post",
//                //请求数据
//                data:{attr_id:attr_id,attrval_name:attrval_name},
//                //预期返回数据类型
//                dataType:'json',
//                //回调函数
//                success:function(res){
//                    //判断返回结果
//                    if(res.status=='00000'){
//                        alert(res.msg)
//                        location.href='/admin/attrval'
//                    }
//                }
//            })
        })
    })
</script>
@endsection