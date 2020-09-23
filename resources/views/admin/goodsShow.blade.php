@extends('admin/public/layout')
@section('content')
<div class="box-header with-border">
    <h3 class="box-title">商品管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建"><i class="fa fa-file-o"></i> 新建</button>
                    <button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button>
                    <button type="button" class="btn btn-default" title="提交审核"><i class="fa fa-check"></i> 提交审核</button>
                    <button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i
                            class="fa fa-ban"></i> 屏蔽
                    </button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i
                            class="fa fa-refresh"></i> 刷新
                    </button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                状态：<select>
                    <option value="">全部</option>
                    <option value="0">未申请</option>
                    <option value="1">申请中</option>
                    <option value="2">审核通过</option>
                    <option value="3">已驳回</option>
                </select>
                商品名称：<input placeholder="请输入关键字" id="goods_name">
                <button class="btn ss btn-default">查询</button>
            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
            <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
            </th>
                <th>商品ID</th>
                <th>商品名称</th>
                <th>分类ID</th>
                <th>品牌</th>
                <th>商品价格</th>
                <th>商品图片</th>
                <th>商品库存</th>
                <th>商品简介</th>
                <th>是否展示</th>
                <th>是否热门</th>
                <th>是否上架</th>
                <th>是否新品</th>
                <th>购买商品奖励积分</th>
                <th>商品包装简介</th>
                <th>添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody  id='goods_info'>
            @foreach($info as $k=>$v)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>{{$v['goods_id']}}</td>
                    <td>{{$v['goods_name']}}</td>
                    <td>{{$v['cate_id']}}</td>
                    <td>{{$v['brand_id']}}</td>
                    <td>{{$v['goods_price']}}</td>
                    <td>
                        @foreach($v['goods_img'] as $v1)
                            <img src="{{$v1}}" width="60px">
                        @endforeach
                    </td>
                    <td>{{$v['goods_store']}}</td>
                    <td>{!! $v['goods_desc'] !!}</td>
                    <td>{{$v['is_show']==1?'√':'×'}}</td>
                    <td>{{$v['is_hot']==1?'√':'×'}}</td>
                    <td>{{$v['is_up']==1?'√':'×'}}</td>
                    <td>{{$v['is_new']==1?'√':'×'}}</td>
                    <td>
                        {{$v['goods_store']}}
                    </td>
                    <td>w
                        {{$v['goods_content']}}
                    </td>
                    <td>
                        {{$v['add_time']}}
                    </td>
                    <td class="text-center">
                        <button type="button" id="del" data-id="{{$v['goods_id']}}" class="btn bg-olive btn-xs">删除</button>
                        <a href="/admin/goods/goodsUpdate?goods_id={{$v['goods_id']}}" class="btn bg-olive btn-xs">修改</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<!-- /.box-body -->
<script>
     // 搜索
        $(document).on("click",".ss",function(){
            var goods_name = $("#goods_name").val();
            // alert(goods_name);
             var url = "/admin/goods/goodsShow";
             var data={};
             data.goods_name = goods_name;
              $.ajax({
                url:url,
                data:data,
                type:"get",
                success: function(res){
                    $('#goods_info').html(res)
            }
        });
    });
    $(function (){
         //无刷新分页
        $(document).on('click','.page-item a',function(){
            var url = $(this).attr('href');
            //alert(url);
            $.get(url,function(res){
            $('tbody').html(res);
        });
         return false;
    })
        $(document).on('click','#del',function (){
            var goods_id=$(this).data('id');
            var url='/admin/goods/goodsDel';
            var data={
                goods_id:goods_id
            }
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
