@extends('admin/public/layout')
@section('content')
<div class="form-horizontal">
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">友情链接标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="foot_name" placeholder="链接标题">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">跳转地址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="foot_url" placeholder="跳转地址">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">权重</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="is_weight" placeholder="请输入权重">
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