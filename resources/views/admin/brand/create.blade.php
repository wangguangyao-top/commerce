@extends('admin/public/layout')
@section('content')
    <link rel="stylesheet" href="/uploadify/uploadify.css">
    <script src="/uploadify/jquery.uploadify.js"></script>

	<!-- 正文区域 -->
	<div class="box-header with-border">
		<h3 class="box-title">商品品牌添加</h3>
	</div>
	<!--扩展属性-->
	<section class="content">
		<div class="box-body">
			<!--tab页-->
			<div class="nav-tabs-custom">
				<!--tab头-->
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="javascript:;">商品品牌添加</a>
					</li>
				</ul>
				<!--tab头/-->

				<!--tab内容-->
				<div class="tab-content">

					<!--表单内容-->
					<div class="tab-pane active">
						<div class="row data-type">
							<div class="col-md-2 title"><b>品牌名称：</b></div>
							<div class="col-md-10 data">
								<input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="品牌名称">
							</div>
						</div>
					</div>
					<div class="tab-pane active">
						<div class="row data-type">
							<div class="col-md-2 title"><b>品牌url：</b></div>
							<div class="col-md-10 data">
								<input type="text" class="form-control" id="brand_url" placeholder="品牌url">
							</div>
						</div>
					</div>
					<div class="tab-pane active">
						<div class="row data-type">
							<div class="col-md-2 title"><b>品牌logo：</b></div>
							<div class="col-md-10 data">
								<input type="file" id="brand_log" name="imgs">
								<div class="showimg"></div>
								<input type="hidden" name='img_path' id='log_path'>
							</div>
						</div>
					</div>
					<div class="tab-pane active">
						<div class="row data-type">
							<div class="col-md-2 title"><b>是否展示：</b></div>
							<div class="col-md-10 data">
								<input type="radio" id="brand_show" name="brand_show" value="1">是
								<input type="radio" id="brand_show" name="brand_show" value="2">否
							</div>
						</div>
					</div>
				</div>
				<!--tab内容/-->
				<!--表单内容/-->
			</div>
		</div>
		<div class="btn-toolbar list-toolbar">
			<button class="btn btn-primary" id="sub">提交</button>
			<button class="btn btn-danger"><a href="{{url('admin/brand')}}" style="color: #ffffff">返回列表页面</a></button>
		</div>

	</section>
	<!-- 正文区域 /-->


<script type="text/javascript">
	   	$(document).on("click","#sub",function(){
			var brand_name = $("#brand_name").val();
			var brand_url = $("#brand_url").val();
			var brand_log = $("#log_path").val();
			var brand_show = $("#brand_show:checked").val();
			if(brand_name==''){
				alert('品牌名称必填')
				return false;
			}
			//状态值
			var brand_status=true
			//验证唯一性
			$.ajax({
				url:"/admin/brand/brand_name",
				type:"post",
				data:{brand_name:brand_name},
				async:false,
				success: function(ked){
					if(ked.code==1){
						alert('品牌名称已存在，请重新输入~嘻嘻')
						brand_status=false;
					}
				}
			})
			if(!brand_status){
				return brand_status
			}
			if(brand_url==''){
				alert('品牌网址必填')
				return false;
			}
			if(brand_log==''){
				alert('请为该品牌选择logo哦')
				return false;
			}
			$("#span_log").html("")
			// console.log(brand_show);
			var url = "/admin/brand/store";
			var data={};
			data.brand_name = brand_name;
			data.brand_url =brand_url;
			data.brand_log=brand_log;
			data.brand_show=brand_show;
			data.brand_show=brand_show;
			// console.log(data.brand_log);
			$.ajax({
				url:url,
				data:data,
				type:"post",
				dataType:"json",
				success: function(res){
				  if(res.success == 200){
						alert(res.msg);
						var url = res.url;
						window.location.href = url;
				  }
				}
			});
		});

		$("#brand_log").uploadify({
			uploader: "/admin/brand/addimg",
			swf: "/uploadify/uploadify.swf",
			onUploadSuccess:function(res,data,msg){
				var imgPath  = data;
				var imgstr = "<img src='"+imgPath+"'>";
				$("input[name='img_path']").val(imgPath);
				$(".showimg").append(imgstr);
				// var video_str = "<video src='"+imgPath+"' controls='controls' style='width:400px;height:200px;'>";
				// $(".showimg").append(video_str);
			}
		});

</script>
 @endsection
