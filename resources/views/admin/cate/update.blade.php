@extends('admin/public/layout')
@section('content')
<div class="form-horizontal">
		<input type="hidden" id="nav_id" value="{{$data->nav_id}}">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导航名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="Nav_name" value="{{$data->nav_name}}" placeholder="请输入导航名">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导航跳转</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="Nav_url" value="{{$data->nav_url}}" placeholder="导航跳转">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">权重</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="is_weigh" value="{{$data->is_weigh}}" placeholder="请输入权重">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否展示</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show" class="is_show" value="1">是
			<input type="radio" name="is_show" class="is_show" value="2">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否删除</label>
		<div class="col-sm-8">
			<input type="radio" name="is_del" class="is_del" value="1">是
			<input type="radio" name="is_del" class="is_del" value="2">否
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn tj btn-default">修改</button>
		</div>
	</div>
</div>


<script  type="text/javascript">

		//验证唯一性
        
		//ajax添加
		$(document).on("click",".tj",function(){
		    var nav_name = $("#Nav_name").val();
	        var Nav_url  = $("#Nav_url").val();
	        var is_weigh = $("#is_weigh").val();
	        var is_show  = $(".is_show:checked").val();
	        // var is_del  = $(".is_del:checked").val();
	        if(nav_name==''){
	        	$("#span_name").html("<font color='red'>导航名称不能为空</font>");
	        	return false;
	        }
	         $.ajax({
        	url:"/admin/nav/destroy",
        	type:"post",
        	data:{nav_name:nav_name},
        	async:false,
        	success: function(ked){
        		if(ked.code==1){
        			$("#span_name").html("<font color=red>品牌名称已存在，请重新输入~嘻嘻</font>")
        			return
        		}else{
        			$("#span_name").html("")
        		}
        	}
        });
	        var url = "/admin/nav/store";
	        var data={};

	        data.nav_name = Nav_name;
	        data.Nav_url  = Nav_url;
	        data.is_weigh = is_weigh;
	        data.is_show  = is_show;
	        // data.is_del  = is_del;
	       
	        // console.log(Nav_name);
	        // console.log(Nav_url);
	        // console.log(is_weigh);
	        // console.log(is_show);
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