@extends('admin/public/layout')
@section('content')
  <!-- .box-body -->
                    <div class="box-header with-border">
                    	<center>
                        <h1 class="box-title">导航管理     
                       	</h1>
                       	</center>
                    </div>
                    <div class="box-body">
                  			 <ol class="breadcrumb">	                        	
                        		<li>
		                        	<a href="#" >顶级分类列表</a> 
		                        </li>
		                        <li>
		                       		<a href="#" >珠宝</a>
		                        </li>
		                        <li>
		                        	<a href="#" >银饰</a>
		                        </li>
	                        </ol>
                        <!-- 数据表格 -->
                        <div class="table-box">
                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i><a href="{{url('admin/nav/create')}}">新建</a></button>

                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                        <button type="button" class="btn btn-default" title="刷新" ><i class="fa fa-check"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
						        <div class="has-feedback">
						            导航名称:<input placeholder="请输入关键字" id="name">
						            <button class="btn ss btn-danger">点击搜索一下</button>
						        </div>
						    </div>
			                <!--数据列表-->
			                  @include('admin.cate.ajaxnav');
			                  <!--数据列表/-->

                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->

			<script  type="text/javascript">
				

			 		$(function(){
			 			// 搜索
					    $(document).on("click",".ss",function(){
					        var name = $("#name").val();
					        
					         var url = "/admin/nav/index";
					         var data={};
					         data.name = name;

					          $.ajax({
					            url:url,
					            data:data,
					            type:"get",
					            success: function(res){
					            	// alert(res)
					                $('#nav_info').html(res)
					        }
					    });
					});
					    //ajax删除
			 			$(document).on("click",".del",function(){
			            var id = $(this).attr("id");
			            var data = {nav_id:id};
			            var url = "{{url('/admin/nav/edit')}}";
			            console.log(url);
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
			          });
			 			//ajax
			 			//ajax分页
						$(document).on("click",".page-item a",function(){
							var desc_url = $(this).attr("href");
							$.get(desc_url,function(index){
								$("table").html(index);
							});
							return false;
						});
			 			
			 		});
			 </script>


@endsection