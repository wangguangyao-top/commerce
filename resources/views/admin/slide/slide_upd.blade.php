@extends('admin/public/layout')
@section('content')
    <link rel="stylesheet" href="/uploadify/uploadify.css">
    <script src="/uploadify/jquery.uploadify.js"></script>
<div>
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">轮播图修改</h3>
		</div>
{{--		<form action="{{url('/admin/slide/slide_upddo/'.$res->slide_id)}}" method="post" enctype="multipart/form-data">--}}
{{--<div class="modal-body">--}}
    <table class="table table-bordered table-striped"  width="800px">
        <input type="hidden" name="slide_id" value="{{$res->slide_id}}">
        <tr>
            <td>轮播图</td>
            <td>
                <img src="{{$res->slide_url}}"  width="150px" height="100px" >
                <input type="file" id="img_path">
                <div class="showimg"></div>
                <input type="hidden" name="slide_url" id="slide_url">
            </td>
        </tr>
        <tr>
            <td>权重</td>
            <td><input type="text" id="fileupload" name="slide_weight" value="{{$res->slide_weight}}" class="form-control" >  </td>
        </tr>
        <tr>
            <td>是否展示</td>
            <td>
                <input type="radio" id="fileupload"  name="is_show" {{$res->is_show==1?"checked":""}} value="1"> 是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" id="fileupload"  name="is_show" {{$res->is_show==2?"checked":""}} value="2" >  否

            </td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="保存">
    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
{{--</div>--}}
{{--</form>--}}
</div>
</div>
<script>
    $(document).ready(function(){

        $("#img_path").uploadify({

            uploader: "/admin/slide/slide_img",
            swf: "/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath  = data;
                var imgstr = "<img src='"+imgPath+"' style='width: 50px;height: 50px;'>";
                $("input[name='slide_url']").val(imgPath);
                $(".showimg").append(imgstr);

            }
        });

        $(document).on("click",".btn",function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = {};
            // data.img_path= $("#img_path").val();
            data.slide_url = $("input[name = 'slide_url']").val();
            data.slide_weight = $("input[name='slide_weight']").val();
            data.slide_id = $("input[name='slide_id']").val();
            var url = "/admin/slide/slide_upddo";
            $.ajax({
                type: "post",
                data: data,
                url: url,
                dataType: "json",
                success: function (msg) {
                    if (msg.success == true) {
                        window.location.href = "/admin/slide/slide_show";
                    }
                }
            })
        })
    });
</script>
@endsection
