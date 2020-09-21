@extends('admin/public/layout')
@section('content')
<div class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">友情链接标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="foot_name" placeholder="链接标题">
            <span id="span_name" color=red></span>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">跳转地址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="foot_url" placeholder="跳转地址">
            <span id="span_url" color=red></span>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">权重</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="is_weight" placeholder="请输入权重">
            <span id="span_weight" color=red></span>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" ="" class="btn tj btn-default">添加</button>
		</div>
	</div>
</div>


<script  type="text/javascript">
	   $(document).on("click",".tj",function(){
	    var foot_name = $("#foot_name").val();
        var foot_url = $("#foot_url").val();
        var is_weight = $("#is_weight").val();
        if(foot_name==''){
            $("#span_name").html("<font color=red>友情链接标题必填</font>")
            return false;
        }
        //验证唯一性
        $.ajax({
            url:"/admin/foot/foot_name",
            type:"post",
            data:{foot_name:foot_name},
            async:false,
            success: function(ked){
                if(ked.code==1){
                    $("#span_name").html("<font color=red>友情链接标题已存在，请重新输入~嘻嘻</font>")
                    return
                }else{
                    $("#span_name").html("")
                }
            }
        })
        $("#span_name").html("")
        if(foot_url==''){
            $("#span_url").html("<font color=red>友情链接url必填</font>")
        	return false;
        }
        $("#span_url").html("")
        if(is_weight==''){
             $("#span_weight").html("<font color=red>权重必填</font>")
        	return false;
        }
        $("#span_weight").html("")
        var url = "/admin/foot/store";
        var data={};
        data.foot_name = foot_name;
        data.foot_url =foot_url;
        data.is_weight=is_weight;
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
</script>
 @endsection