@extends('admin/public/layout')
@section('content')
<div class="box-header with-border">
    <h3 class="box-title">商品属性值管理</h3>
</div>

<div class="box-body" style="background-color: #FFFFFF">
    <!-- 数据表格 -->
    <div class="table-box">
        <div class="box-tools pull-right">
            <div class="has-feedback">
                商品属性值：<input type="text">
                <button class="btn btn-default" >查询</button>
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
                <th class="sorting_asc">商品属性名称ID</th>
                <th class="sorting">商品属性值</th>
                <th class="sorting">所属商品属性名称</th>
                <th class="sorting">添加时间</th>
                <th class="sorting">修改时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attrval_info as $k=>$v)
            <tr>
                <td><input type="checkbox"></td>
                <td>{{$v->id}}</td>
                <td>{{$v->attrval_name}}</td>
                <td>{{$v->attr_name}}</td>
                <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                @if($v->up_time)
                <td>{{date('Y-m-d H:i:s',$v->up_time)}}</td>
                @else
                <td>未修改</td>
                @endif
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs"><a href="/admin/attrval/edit/{{$v->id}}" style="color: #ffffff">修改</a></button>
                    <button type="button" class="btn bg-olive btn-xs"><a href="/admin/attrval/destroy/{{$v->id}}" style="color: #ffffff">删除</a></button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$attrval_info->links()}}
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
@endsection