
<!DOCTYPE html>
<html>                  

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>设置-个人信息</title>
     <!-- <link rel="icon" href="assets/img/favicon.ico"> -->

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-seckillOrder.css" />
</head>

<body>
    <!-- 头部栏位 -->
    <!--页面顶部-->
<div id="nav-bottom">
	<!--顶部-->
	<div class="nav-top">
		<div class="top">
			<div class="py-container">
				<div class="shortcut">
					<ul class="fl">
						<li class="f-item">品优购欢迎您！</li>
						<li class="f-item">请<a href="login.html" target="_blank">登录</a>　<span><a href="register.html" target="_blank">免费注册</a></span></li>
					</ul>
					<ul class="fr">
						<li class="f-item">我的订单</li>
						<li class="f-item space"></li>
						<li class="f-item"><a href="{{url('index/orderHome')}}">我的品优购</a></li>
						<li class="f-item space"></li>
						<li class="f-item">品优购会员</li>
						<li class="f-item space"></li>
						<li class="f-item">企业采购</li>
						<li class="f-item space"></li>
						<li class="f-item">关注品优购</li>
						<li class="f-item space"></li>
						<li class="f-item" id="service">
							<span>客户服务</span>
							<ul class="service">
								<li><a href="cooperation.html">合作招商</a></li>
								<li><a href="shoplogin.html">商家后台</a></li>
								<li><a href="cooperation.html">合作招商</a></li>
								<li><a href="#">商家后台</a></li>
							</ul>
						</li>
						<li class="f-item space"></li>
						<li class="f-item">网站导航</li>
					</ul>
				</div>
			</div>
		</div>

		<!--头部-->
		<div class="header">
			<div class="py-container">
				<div class="yui3-g Logo">
					<div class="yui3-u Left logoArea">
						<a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
					</div>
					<div class="yui3-u Center searchArea">
						<div class="search">
							<form action="" class="sui-form form-inline">
								<!--searchAutoComplete-->
								<div class="input-append">
									<input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
									<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
								</div>
							</form>
						</div>
						<div class="hotwords">
							<ul>
								<li class="f-item">品优购首发</li>
								<li class="f-item">亿元优惠</li>
								<li class="f-item">9.9元团购</li>
								<li class="f-item">每满99减30</li>
								<li class="f-item">亿元优惠</li>
								<li class="f-item">9.9元团购</li>
								<li class="f-item">办公用品</li>

							</ul>
						</div>
					</div>
					<div class="yui3-u Right shopArea">
						<div class="fr shopcar">
							<div class="show-shopcar" id="shopcar">
								<span class="car"></span>
								<a class="sui-btn btn-default btn-xlarge" href="cart.html" target="_blank">
									<span>我的购物车</span>
									<i class="shopnum">0</i>
								</a>
								<div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
									<p>"啊哦，你的购物车还没有商品哦！"</p>
									<p>"啊哦，你的购物车还没有商品哦！"</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="yui3-g NavList">
					<div class="yui3-u Left all-sort">
						<h4>全部商品分类</h4>
					</div>
					<div class="yui3-u Center navArea">
						<ul class="nav">
							<li class="f-item">服装城</li>
							<li class="f-item">美妆馆</li>
							<li class="f-item">品优超市</li>
							<li class="f-item">全球购</li>
							<li class="f-item">闪购</li>
							<li class="f-item">团购</li>
							<li class="f-item">有趣</li>
							<li class="f-item"><a href="seckill-index.html">秒杀</a></li>
						</ul>
					</div>
					<div class="yui3-u Right"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/index/js/widget/nav.js"></script>
<script type="text/javascript" src="pages/userInfo/distpicker.data.js"></script>
<script type="text/javascript" src="pages/userInfo/distpicker.js"></script>
<script type="text/javascript" src="pages/userInfo/main.js"></script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
                <div class="yui3-u-1-6 list">

                    <div class="person-info">
                        <div class="person-photo"><img src="img/_/photo.png" alt=""></div>
                        <div class="person-account">
                            <span class="name">Michelle</span>
                            <span class="safe">账户安全</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-items">
                        <dl>
							<dt><i>·</i> 订单中心</dt>
                        <dd ><a href="{{url('index/orderHome')}}"  >我的订单</a></dd>
                        <dd><a href="{{url('index/orderPay')}}" >待付款</a></dd>
                        <dd><a href="{{url('index/orderSend')}}"  >待发货</a></dd>
                        <dd><a href="{{url('index/orderReceive')}}" >待收货</a></dd>
                        <dd><a href="{{url('index/orderEvaluate')}}" >待评价</a></dd>
						</dl>
						<dl>
							<dt><i>·</i> 我的中心</dt>
                        <dd><a href="{{url('index/orderPerson')}}">我的收藏</a></dd>
                        <dd><a href="{{url('index/orderFootmark')}}">我的足迹</a></dd>
						</dl>
						<dl>
							<dt><i>·</i> 物流消息</dt>
						</dl>
						<dl>
							<dt><i>·</i> 设置</dt>
                        <dd><a href="{{url('index/orderInfo')}}" >个人信息</a></dd>
                        <dd><a href="{{url('index/orderAddress')}}" class="list-active" >地址管理</a></dd>
                        <dd><a href="{{url('index/orderSafe')}}" >安全管理</a></dd>
						</dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">地址管理</span>
                            <a data-toggle="modal" data-target=".edit" data-keyboard="false"   class="sui-btn  btn-info add-new">添加新地址</a>
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>地址</th>
                                        <th>联系电话</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                               <tbody>
                                    @foreach($addressInfo as $k=>$v)
                                    <tr>
                                        <td>{{$v->take_name}}</td>
                                        <td>{{$v->adddress_detail}}</td>
                                        <td>{{$v->is_tel}}</td>
                                        <td>{{date("Y-m-d",$v->add_time)}}</td>
                                        <td>
                                        
                                            <button class="del" id="{{$v->id}}">删除</button>
                                             <a data-toggle="modal" data-target=".hei">编辑</a>
                                            默认地址
                                        </td>
                                    </tr>  
                                    @endforeach
                                </tbody>
                            </table>                          
                        </div>
                        <!--新增地址弹出层-->
                         <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('/index/store')}}" method="post" class="sui-form form-horizontal">
                                            <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="take_name">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                <div class="form-group">
                                                    <select class="area" id="area" name="area">
                                                    	<option value="0">请选择...</option>
                                                    	@foreach($data as $k=>$v)
                                    						<option value="{{$v->id}}">{{$v->name}}</option>
                                    					@endforeach
                                                    </select>
                                               
                                                    <select class="form-control area" id="city" value="" name="city">
                                                        
                                                    	<option>请选择</option>
                                                    </select>
        
                                                    <select class="form-control area" id="province" value="" name="province">
                                                    	<option>请选择</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            </div>									 
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" class="input-large" id="adddress_detail">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="is_tel">
                                            </div>
                                        </div>
                                        
                                        </form>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large" id="sub">确定</button>
                                       
                                        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                    </div>
                                </div>
                            </div>
						</div>
                        <!-- 修改地址弹出 -->
                         <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade hei" style="width:580px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">修改地址</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('/index/store')}}" method="post" class="sui-form form-horizontal">
                                            <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="take_name" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                <div class="form-group">
                                                    <select class="area" id="area" name="area">
                                                        <option value="0">请选择...</option>
                                                        @foreach($data as $k=>$v)
                                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                                        @endforeach
                                                    </select>
                                               
                                                    <select class="form-control area" id="city" value="" name="city">
                                                        
                                                        <option>请选择</option>
                                                    </select>
        
                                                    <select class="form-control area" id="province" value="" name="province">
                                                        <option>请选择</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            </div>                                   
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" class="input-large" id="adddress_detail">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="is_tel">
                                            </div>
                                        </div>
                                        
                                        </form>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large" id="sub">确定</button>
                                       
                                        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        $(function(){
            // 添加
           $(document).on("click","#sub",function(){
                var take_name = $("#take_name").val();
                var city = $("#city").val();
                var area = $("#area").val();
                var province = $("#province").val();
                var adddress_detail = $("#adddress_detail").val();
                var is_tel = $("#is_tel").val();
                var url = "/index/store";
                var data={};
                data.take_name = take_name;
                data.city =city;
                data.area=area;
                data.province=province;
                data.adddress_detail=adddress_detail;
                data.is_tel=is_tel;
                // console.log(data.is_tel);
                $.ajax({
                    url:url,
                    data:data,
                    type:"post",
                    dataType:"json",
                    success: function(res){
                       if(res.success == 200){
                        alert(res.msg);
                        }
                    }
                });
})
            $(document).on('change','.area',function(){
                // alert(123);
                var _this = $(this);

                _this.nextAll('select').html("<option value=''>请选择...</option>");
                var id = _this.val();
                // alert(id);
                $.ajax({
                    url : "/index/area",
                    type : "post",
                    data : {id : id},
                    dataType:'json',
                    success:function(res){
                        if(res.status=='200'){
                            _this.next().html(res.data)
                        }
                    }
                })
            });

            // 删除
            $(document).on("click",".del",function(){
            var id = $(this).attr("id");
            var data = {id:id};
            var url = "{{url('/index/Fdel')}}";
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
        });
    </script>
    <!-- 底部栏位 -->
    <!--页面底部-->
	@include('../index/public.foot');