@extends('admin/public/layout')
@section('content')
<center>	
	<h2>品牌修改</h2>
</center>
<script src="/uploadify/jquery.js"></script>
<link rel="stylesheet" href="/uploadify/uploadify.css">
<script src="/uploadify/jquery.uploadify.js"></script>
<div class="form-horizontal">
	<input type="hidden" id="brand_id" value="{{$brand->brand_id}}">
	<div class="form-group">
		
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="brand_name" value="{{$brand->brand_name}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌url</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="brand_url"  value="{{$brand->brand_url}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo</label>
		<div class="col-sm-8">
			<input type="file" id="brand_log" name="imgs">
			<div class="showimg"></div>
			<input type="hidden" name='img_path' id='log_path'>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否展示</label>
		<div class="col-sm-8">
			<input type="radio" id="brand_show" name="brand_show" value="1" checked>是
			<input type="radio" id="brand_show" name="brand_show" value="2">否
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" ="" class="btn tj btn-default">修改</button>
		</div>
	</div>
</div>


<script  type="text/javascript">
	   $(document).on("click",".tj",function(){
		    var brand_name = $("#brand_name").val();
	        var brand_url = $("#brand_url").val();
	        var brand_log = $("#log_path").val();
	        var brand_show = $("#brand_show:checked").val();
	         if(brand_name==''){
        	alert('品牌名称必填');
        	return false;
        }
        if(brand_url==''){
        	alert('品牌网址必填');
        	return false;
        }
        if(brand_log==''){
        	alert('请为该品牌选择logo哦');
        	return false;
        }
	        // console.log(brand_show);
	        var url = "/admin/brand/update";
	        var data={};
	        data.brand_name = brand_name;
	        data.brand_url =brand_url;
	        data.brand_log=brand_log;
	        data.brand_show=brand_show;
	        data.brand_id=$('#brand_id').val()
	        // console.log(data.brand_log);
	        false
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