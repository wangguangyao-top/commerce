@extends('admin/public/layout')
@section('content')
<div class="box-header with-border">
    <h3 class="box-title">角色权限管理</h3>
</div>

<div class="box-body" style="background-color: #FFFFFF">
    <!-- 数据表格 -->
    <div class="table-box">
        <div class="box-tools pull-right">
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">ID</th>
                <th class="sorting">角色</th>
                <th class="sorting">权限</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($role_data as $v)
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>{{$v->id}}</td>
                    <td>
                        {{$v->role_id}}
                    </td>
                    <td class="test">
                        @foreach($v->p_id as $vv)
                            {{$vv->p_name}}
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a class="btn bg-olive btn-xs" href="/admin/rolepermission/edit?id={{$v->id}}">修改</a>
                        <a id="del" class="btn bg-olive btn-xs" data-id="{{$v->id}}">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--数据列表/-->
{{--        <p>{{$data->links()}}</p >--}}
    </div>
    <!-- 数据表格 /-->
</div>

<script>
    $(document).on("click","#del",function(){
        var id = $(this).data("id");
        var data = {};
        data.id = id;
        var url = "{{url('/admin/rolepermission/del')}}";
        if(window.confirm("是否删除")){
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dateType:"json",
                success:function(res){
                    if(res.code==200){
                        alert(res.msg);
                        window.location.href='/admin/rolepermission/show';
                    }
                }
            })

        }
    })
</script>
@endsection
