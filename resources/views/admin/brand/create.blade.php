@extends('admin/public/layout')
@section('content')
    <link rel="stylesheet" href="/uploadify/uploadify.css">
    <script src="/uploadify/jquery.uploadify.js"></script>
<center>
	<h2>品牌添加</h2>
</center>
<div class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="品牌名称">
			<span id="span_name" color=red></span>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌url</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="brand_url" placeholder="品牌url">
			<span id="span_url"></span>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo</label>
		<div class="col-sm-8">
			<input type="file" id="brand_log" name="imgs">
			<div class="showimg"></div>
			<input type="hidden" name='img_path' id='log_path'>
			<span id="span_log"></span>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否展示</label>
		<div class="col-sm-8">
			<input type="radio" id="brand_show" name="brand_show" value="1">是
			<input type="radio" id="brand_show" name="brand_show" value="2">否
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit"  class="btn tj btn-default">添加</button>
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
        	$("#span_name").html("<font color=red>品牌名称必填</font>")
        	return false;
        }
        //验证唯一性
        $.ajax({
        	url:"/admin/brand/brand_name",
        	type:"post",
        	data:{brand_name:brand_name},
        	async:false,
        	success: function(ked){
        		if(ked.code==1){
        			$("#span_name").html("<font color=red>品牌名称已存在，请重新输入~嘻嘻</font>")
        			return
        		}else{
        			$("#span_name").html("")
        		}
        	}
        })
        if(brand_url==''){
        	$("#span_url").html("<font color=red>品牌网址必填</font>")
        	return false;
        }
        $("#span_url").html("")
        if(brand_log==''){
        	$("#span_log").html("<font color=red>请为该品牌选择logo哦</font>")
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
