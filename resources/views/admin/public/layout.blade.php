<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <!-- 页面meta /-->
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">



    <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/plugins/raphael/raphael-min.js"></script>
    <script src="/admin/plugins/morris/morris.min.js"></script>
    <script src="/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/admin/plugins/knob/jquery.knob.js"></script>
    <script src="/admin/plugins/daterangepicker/moment.min.js"></script>
    <script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/admin/plugins/daterangepicker/daterangepicker.zh-CN.js"></script>
    <script src="/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/admin/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script src="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="/admin/plugins/fastclick/fastclick.js"></script>
    <script src="/admin/plugins/iCheck/icheck.min.js"></script>
    <script src="/admin/plugins/adminLTE/js/app.min.js"></script>
    <script src="/admin/plugins/treeTable/jquery.treetable.js"></script>
    <script src="/admin/plugins/select2/select2.full.min.js"></script>
    <script src="/admin/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.zh-CN.js"></script>
    <script src="/admin/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
    <script src="/admin/plugins/bootstrap-markdown/locale/bootstrap-markdown.zh.js"></script>
    <script src="/admin/plugins/bootstrap-markdown/js/markdown.js"></script>
    <script src="/admin/plugins/bootstrap-markdown/js/to-markdown.js"></script>
    <script src="/admin/plugins/ckeditor/ckeditor.js"></script>
    

    
    <script type="text/javascript">
   
		 function SetIFrameHeight(){
		  	  var iframeid=document.getElementById("iframe"); //iframe id
		  	  if (document.getElementById){
		  		iframeid.height =document.documentElement.clientHeight;			   	   
			  }
		 }
    
	</script>    

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <!-- 页面头部部分 -->
            @include('admin/public/top')
        <!-- 页面头部部分结束 -->

        <!-- 页面左部侧边栏开始 -->
            @include('admin/public/left')
        <!-- 页面左部侧边栏结束 -->

        <!-- 内容区域 -->
        <div class="content-wrapper">
			{{--<iframe width="100%" id="iframe" name="iframe"	onload="SetIFrameHeight()" frameborder="0" src=""></iframe>--}}
            @section('content')
            @show
 
        </div>
        <!-- 内容区域 /-->

        <!-- 底部导航开始 -->
            @include('admin/public/foot')
        <!-- 底部导航结束 -->
    </div>
</body>

</html>