<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>设置-个人信息</title>
    <link rel="icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="css/pages-seckillOrder.css" />

    <link rel="stylesheet" href="/uploadify/uploadify.css">
    <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
    <script src="/uploadify/jquery.uploadify.js"></script>
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
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="shoplogin.html" target="_blank">商家后台</a></li>
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
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
                            <li class="f-item"><a href="seckill-index.html" target="_blank">秒杀</a></li>
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>
            </div>
        </div>
    </div>
</div>

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
<script type="text/javascript" src="/index/js/plugins/birthday/birthday.js"></script>
<script type="text/javascript" src="/index/js/plugins/citypicker/distpicker.data.js"></script>
<script type="text/javascript" src="/index/js/plugins/citypicker/distpicker.js"></script>
<script type="text/javascript" src="/index/js/plugins/upload/uploadPreview.js"></script>
<script type="text/javascript" src="/index/js/pages/main.js"></script>
<script>
    $(function() {
        $.ms_DatePicker({
            YearSelector: "#select_year2",
            MonthSelector: "#select_month2",
            DaySelector: "#select_day2"
        });
    });
</script>
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

                        <span class="name">{{json_decode(session('user'),true)['user_name']}}</span>
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
                        <dd><a href="{{url('index/history')}}">我的足迹</a></dd>
                    </dl>
                    <dl>
                        <dt><i>·</i> 物流消息</dt>
                    </dl>
                    <dl>
                        <dt><i>·</i> 设置</dt>
                        <dd><a href="{{url('index/show')}}" class="list-active">个人信息</a></dd>
                        <dd><a href="{{url('index/address')}}"  >地址管理</a></dd>
                        <dd><a href="{{url('index/orderSafe')}}" >安全管理</a></dd>
                    </dl>
                </div>
            </div>
            <!--右侧主内容-->
            <div class="yui3-u-5-6">
                <div class="body userInfo">
                    <ul class="sui-nav nav-tabs nav-large nav-primary ">
                        <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                        <li><a href="#two" data-toggle="tab">头像照片</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="one" class="tab-pane active" >
                            <form id="form-msg" class="sui-form form-horizontal">

                                <input type="hidden" value="{{json_decode(session('user'),true)['user_id']}}" id="user_id">
                                <div class="control-group">
                                    <label for="inputName" class="control-label" >昵称：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" name="user_name" placeholder="昵称" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputGender" class="control-label">性别：</label>
                                    <div class="controls">
                                        <label data-toggle="radio" class="radio-pretty inline">
                                            <input type="radio"  name="my_sex" value="1" ><span>男</span>
                                        </label>
                                        <label data-toggle="radio" class="radio-pretty inline ">
                                            <input type="radio" name="my_sex" value="2"><span>女</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputPassword" class="control-label">生日：</label>
                                    <div class="controls">

                                        <input type ="date" name ="my_birthday" />
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label for="inputPassword" class="control-label">所在地：</label>
                                    <div class="controls">
                                        <select class="form-control" id="province1" name="my_site1">
                                            <option value="">--请选择--</option>
                                            @foreach($area as $k=>$v)
                                                <option  value="{{$v->id}}">{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control" id="city1" name="my_site2">
                                            <option value="">--请选择--</option>
                                        </select>

                                        <select class="form-control" id="district1" name="my_site3">
                                            <option value="">--请选择--</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="sanwei" class="control-label"></label>
                                    <div class="controls">
                                        <button type="button" class="sui-btn btn-primary">立即注册</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="/index/update"><h1>去修改</h1></a>
                        <div id="two" class="tab-pane">

                            <div class="new-photo">
                                <p>当前头像：</p>
                                <div class="upload">
                                    <img id="imgShow_WU_FILE_0" width="100" height="100" src="img/_/photo_icon.png" alt="">
                                    <input type="file" id="img_path">
                                    <div class="showimg"></div>
                                    <input type="hidden" name="my_img" id="my_img">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- 底部栏位 -->
<!--页面底部-->
<div class="clearfix footer">
    <div class="py-container">
        <div class="footlink">
            <div class="Mod-service">
                <ul class="Mod-Service-list">
                    <li class="grid-service-item intro  intro1">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro2">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro  intro3">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro4">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro intro5">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="clearfix Mod-list">
                <div class="yui3-g">
                    <div class="yui3-u-1-6">
                        <h4>购物指南</h4>
                        <ul class="unstyled">
                            <li>购物流程</li>
                            <li>会员介绍</li>
                            <li>生活旅行/团购</li>
                            <li>常见问题</li>
                            <li>购物指南</li>
                        </ul>

                    </div>
                    <div class="yui3-u-1-6">
                        <h4>配送方式</h4>
                        <ul class="unstyled">
                            <li>上门自提</li>
                            <li>211限时达</li>
                            <li>配送服务查询</li>
                            <li>配送费收取标准</li>
                            <li>海外配送</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>支付方式</h4>
                        <ul class="unstyled">
                            <li>货到付款</li>
                            <li>在线支付</li>
                            <li>分期付款</li>
                            <li>邮局汇款</li>
                            <li>公司转账</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>售后服务</h4>
                        <ul class="unstyled">
                            <li>售后政策</li>
                            <li>价格保护</li>
                            <li>退款说明</li>
                            <li>返修/退换货</li>
                            <li>取消订单</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>特色服务</h4>
                        <ul class="unstyled">
                            <li>夺宝岛</li>
                            <li>DIY装机</li>
                            <li>延保服务</li>
                            <li>品优购E卡</li>
                            <li>品优购通信</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>帮助中心</h4>
                        <img src="img/wx_cz.jpg">
                    </div>
                </div>
            </div>
            <div class="Mod-copyright">
                <ul class="helpLink">
                    <li>关于我们<span class="space"></span></li>
                    <li>联系我们<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>商家入驻<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们</li>
                </ul>
                <p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
                <p>京ICP备08001421号京公网安备110108007702</p>
            </div>
        </div>
    </div>
</div>
<!--页面底部END-->

</html>
<script>
    $(document).ready(function(){
        $(document).on("click",".sui-btn",function(){
            var data = {};
            data.user_name = $("input[name = 'user_name']").val();
            data.my_sex = $("input[name='my_sex']").val();
            data.my_img = $("input[name = 'my_img']").val();
            data.my_birthday = $("input[name = 'my_birthday']").val();
            data.my_site1 = $("select[name = 'my_site1']").val();
            data.my_site2 = $("select[name = 'my_site2']").val();
            data.my_site3 = $("select[name = 'my_site3']").val();
            data.user_id = $("#user_id").val();

            // console.log($("select[name = 'my_site1']").val())
            // return false

            var url = "/index/add";
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dataType:"json",
                success:function (msg) {
                    if(msg.success == true){
                        window.location.href = "/index/show";
                    }else{
                        alert(msg.msg);
                    }
                }
            })
        })
        //三级联动
        $(document).on('change','select',function(){
            // alert(123);
            var id = $(this).val();
            var obj = $(this);
            // alert(id);
            if(id =='请选择'){
                var str = '<option>--请选择--</option>';
                obj.siblings('select').html(str);return;
            }
            obj.nextAll('select').html("<option value=''>--请选择--</option>");
            $.get(
                "{{url('/index/area')}}/"+id,
                function(res){
                    if(res.code=='00000'){
                        var str = '<option>--请选择--</option>';
                        $.each(res.data,function(i,k){
                            str+='<option value='+ k.id+'>'+k.name+'</option>';
                        });
                        obj.next('select').html(str);
                    }else{
                        alert(res.msg);
                    }
                },
                'json'
            )
        })
        //图片上传
        $("#img_path").uploadify({
            uploader: "/index/addimg",
            swf: "/uploadify/uploadify.swf",
            onUploadSuccess:function(res,data,msg){
                var imgPath  = data;
                var imgstr = "<img src='"+imgPath+"' style='width: 50px;height: 50px;'>";
                $("input[name='my_img']").val(imgPath);
                $(".showimg").append(imgstr);

            }
        });
    });
</script>
