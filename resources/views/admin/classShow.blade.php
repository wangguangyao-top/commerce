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
                    商品名称：<input>
                    <button class="btn btn-default">查询</button>
                </div>
            </div>
            <!--工具栏/-->

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th>分类ID</th>
                    <th>分类名称</th>
                    <th>分类级别</th>
                    <th>是否展示</th>
                    <th>创建时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($info as $k=>$v)
                    <tr>
                        <td>{{$v['cate_id']}}</td>
                        <td>{{str_repeat('--',$v->level)}}{{$v->cate_name}}</td>
                        <td>{{$v['p_id']}}</td>
                        <td>{{$v['cate_show']}}</td>
                        <td>{{$v['goods_price']}}</td>
                        <td>
                            {{date('Y-m-d H:i:s',$v['add_time'])}}
                        </td>
                        <td class="text-center">
                            <button type="button" id="del" data-id="{{$v['cate_id']}}" class="btn bg-olive btn-xs">删除</button>
                            <a href="/admin/category/ClassShow?cate_id={{$v['cate_id']}}" class="btn bg-olive btn-xs">修改</a>
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
        $(function (){
            $(document).on('click','#del',function (){
                var cate_id=$(this).data('id');
                var url='/admin/category/createDel';
                var data={
                    cate_id:cate_id
                }
                $.ajax({
                    type:'post',
                    url:url,
                    data:data,
                    dataType:'json',
                    success:function (info){
                        if(info.code){
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

