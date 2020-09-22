@extends('admin/public/layout')
@section('content')
    <link rel="stylesheet" href="/uploadify/uploadify.css">
    <script src="/uploadify/jquery.uploadify.js"></script>
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <div class="box-header with-border">
        <h3 class="box-title">轮播图管理
        </h3>
    </div>

    <div class="box-body">
        <ol class="breadcrumb">
            <li>
                <th>轮播图</th>
            </li>
            <li>
                <th>查看</th>
            </li>

        </ol>

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" title="添加" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();" ><i class="fa fa-check"></i> 刷新</button>

                    </div>
                </div>
            </div>


            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>

                    <th class="sorting_asc">id</th>
                    <th class="sorting">图片</th>
                    <th class="sorting">是否展示</th>
                    <th class="sorting">权重</th>
                    <th class="sorting">时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k=>$v)
                    <tr>
                        <td>{{$v->slide_id}}</td>
                        <td>
                            <img src="{{$v->slide_log}}" width="150px" height="100px">
                        </td>
                        <td>
                            @if($v->is_show==1)
                                是
                            @endif
                            @if($v->is_show==2)
                                否
                            @endif
                        </td>
                        <td>{{$v->slide_weight}}</td>
                        <td>{{date("Y-m-d",$v->add_time)}}</td>
                        <td class="text-center">
                            <button type="button" slide_id="{{$v->slide_id}}" class="btn bg-olive btn-xs del" >删除</button>
                            <a href="{{url('/admin/slide/slide_upd/'.$v->slide_id)}}" class="btn bg-olive btn-xs">修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <p>{{$res->links()}}</p >
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->
    <!-- 编辑窗口 -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">轮播图添加</h3>
                </div>
                <form action="{{url('/admin/slide/slide_add')}}" method="post" enctype="multipart/form-data">

                    <div class="modal-body">

                        <table class="table table-bordered table-striped"  width="800px">
                            <tr>
                                <td>轮播图</td>
                                <td><input type="file" id="img_path">
                                    <div class="showimg"></div>
                                    <input type="hidden" name="slide_log" id="slide_url"></td>
                            </tr>
                            <tr>
                                <td>轮播图路径</td>
                                <td><input type="text" id="fileupload" name="slide_url" class="form-control" >  </td>
                            </tr>
                            <tr>
                                <td>权重</td>
                                <td><input type="text" id="fileupload" name="slide_weight" class="form-control" >  </td>
                            </tr>

                        </table>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="保存">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){

            $("#img_path").uploadify({

                uploader: "/admin/slide/slide_img",
                swf: "/uploadify/uploadify.swf",
                onUploadSuccess:function(res,data,msg){
                    var imgPath  = data;
                    var imgstr = "<img src='"+imgPath+"' style='width: 50px;height: 50px;'>";
                    $("input[name='slide_log']").val(imgPath);
                    $(".showimg").append(imgstr);

                }
            });
        });
        $(document).on("click",".del",function(){
            var slide_id = $(this).attr("slide_id");
            var data = {};
            data.slide_id = slide_id;
            var url = "{{url('/admin/slide/slide_del')}}";
            if(window.confirm("是否删除")){
                $.ajax({
                    type:"post",
                    data:data,
                    url:url,
                    dateType:"json",
                    success:function(res){
                        if(res.success==true){
                            alert(res.message);
                            //页面刷新
                            // history.go(0);
                            window.location.reload();
                        }
                    }
                })

            }
        })
        $(document).on("click",".btn",function(){
            var data = {};
            // data.img_path= $("#img_path").val();
            data.slide_log = $("input[name = 'slide_log']").val();
            data.slide_weight = $("input[name='slide_weight']").val();
            data.slide_url = $("input[name = 'slide_url']").val();
            // data.slide_id = slide_id;
            var url = "admin/slide/slide_add";
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dataType:"json",
                success:function (msg) {
                    if(msg.success == true){
                        window.location.href = "admin/slide/slide_show";
                    }
                }
            })
        })
    </script>
@endsection
