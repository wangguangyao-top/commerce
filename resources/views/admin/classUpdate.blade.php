@extends('admin/public/layout')
@section('content')
<!-- 正文区域 -->
<!--必须引入以下两个文件-->
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
                        <div class="col-md-2 title">分类名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  value="{{$data->cate_name}}" id="cate_name"  placeholder="分类名称" >
                        </div>

                        <div class="col-md-2 title rowHeight2x">是否显示</div>
                        <div class="col-md-10 data rowHeight2x">
                            是<input type="radio" name="cate_show" {{$data->cate_show==1?'checked':''}} id="cate_show" value="1">
                            否<input type="radio" name="cate_show" {{$data->cate_show==2?'checked':''}} id="cate_show" value="2">
                        </div>

                        <div class="col-md-2 title">分类等级</div>
                        <div class="col-md-10 data">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="p_id">
                                            <option value="0">--顶级分类--</option>
                                            @foreach($class2 as $v)
                                            <option value="{{$v->cate_id}}" {{$v->cate_id==$data->p_id?'selected':''}}>{{str_repeat('--',$v->level)}}{{$v->cate_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>
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
<script>
    $(function (){
        $(document).on('blur','#cate_name',function (){
            var cate_name=$('#cate_name').val();
            if(cate_name==''){
                alert('分类名称必填');
                return false;
            }
            var cate_id={{$data->cate_id}}
            var data={cate_id:cate_id,cate_name:cate_name};
            var url='/admin/category/classVerify2';
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function (info){
                    if(info.code==1000){
                        alert(info.msg);
                    }
                }
            })
            return false;
        });
        $(document).on('click','.btn',function (){
            var cate_name=$('#cate_name').val();
            var cate_show=$('#cate_show:checked').val();
            var p_id=$('[name="p_id"]').val();
            var url='/admin/category/ClassUpdate';
            var data={
                cate_id:{{$data->cate_id}},
                cate_name:cate_name,
                cate_show:cate_show,
                p_id:p_id,
            };
            $.ajax({
                type:'post',
                url:url,
                data:data,
                dataType:'json',
                success:function (info){
                    if(info.code==200){
                        alert(info.msg)
                        location.href='/admin/category';
                    }else{
                        alert(info.msg)
                    }
                }
            })
        })
    })
</script>
@endsection

