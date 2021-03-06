<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-cart.css" />
</head>

<body>
<!--head-->
<div class="top">
    <div class="py-container">
        <div class="shortcut">
            <ul class="fl">
                <li class="f-item">品优购欢迎您！</li>
                @php
                $user=json_decode(session('user'),true);
                @endphp
                @if(empty($user))
                    <li class="f-item">请先<a href="{{url('index/login')}}">登录</a>　<span><a href="{{url('index/register')}}">免费注册</a></span></li>
                @else
                    <li class="f-item"><span><a>{{$user['user_name']}}</a></span>&nbsp;|&nbsp;<a href="{{url('index/quit')}}">退出</a></li>
                @endif

            </ul>
            <ul class="fr">
                @if(!empty($user))
                    <li class="f-item"><a href="{{url('index/order')}}">我的订单</a></li>
                    <li class="f-item space"></li>
                @endif
                <li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
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

<div class="cart py-container">
    <!--logoArea-->
    <div class="logoArea">
        <div class="fl logo"><span class="title">购物车</span></div>
        <div class="fr search">
            <form class="sui-form form-inline">
                <div class="input-append">
                    <input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
                    <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                </div>
            </form>
        </div>
    </div>
    <!--All goods-->
    <div class="allgoods">
        <h4>全部商品<span>11</span></h4>
        <div class="cart-main">
            <div class="yui3-g cart-th">
                <div class="yui3-u-1-4"><input type="checkbox" name="all_cart_shop" class="cart_shop" id="" value="" /> 全部</div>
                <div class="yui3-u-1-4">商品</div>
                <div class="yui3-u-1-8">单价（元）</div>
                <div class="yui3-u-1-8">数量</div>
                <div class="yui3-u-1-8">小计（元）</div>
                <div class="yui3-u-1-8">操作</div>
            </div>
            <div class="cart-item-list">
                <div class="cart-body">
                    @if(!empty($cart_info))
                        @foreach($cart_info as $k=>$v)
                        <div class="cart-list" goods_id="{{$v->goods_id}}" sku="{{$v->sku}}">
                        <ul class="goods-list yui3-g">
                            <li class="yui3-u-1-24">
                                <input type="checkbox" class="cart_shop cart_goods" name="" id="" value="" />
                            </li>
                            <li class="yui3-u-11-24">
                                <div class="good-item">
                                    @php
                                        $goods_img=explode(',',$v->goods_img);
                                        $v->goods_img=array_shift($goods_img);
                                    @endphp
                                    <div class="item-img"><img src="{{$v->goods_img}}" style="width: 80px;" /></div>
                                    <div class="item-msg">{{$v->goods_name}}<br>{{$v->sku_name}}</div>
                                </div>
                            </li>

                            <li class="yui3-u-1-8"><span class="price">{{$v->goods_price}}</span></li>
                            <li class="yui3-u-1-8">
                                <span class="price">{{$v->cart_nums}}</span>
                                {{--<a href="javascript:void(0)" class="increment mins">-</a>--}}
                                {{--<input autocomplete="off" type="text" value="{{$v->cart_nums}}" minnum="1" class="itxt" />--}}
                                {{--<a href="javascript:void(0)" class="increment plus">+</a>--}}
                            </li>
                            <li class="yui3-u-1-8"><span class="sum">{{$v->subtotal}}</span></li>
                            <li class="yui3-u-1-8">
                                <a type="button" class="btn"  cart_id ="{{$v->cart_id}}">删除</a><br/>
                            </li>
                        </ul>
                    </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="cart-tool">
            <div class="select-all">
                <input type="checkbox" name="all_cart_shop" class="cart_shop" id="" value="" />
                <span>全选</span>
            </div>

            <div class="toolbar">
                <div class="chosed">已选择<span>0</span>件商品</div>
                <div class="sumprice">
                    <span><em>总价（不含运费） ：</em><i class="summoney">¥0.00</i></span>
                    <span><em>已节省：</em><i>-¥20.00</i></span>
                </div>
                <div class="sumbtn">
                    <a class="sum-btn" id="settlement" href="javascript:;">结算</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="liked">
            <ul class="sui-nav nav-tabs">
                <li class="active">
                    <a href="#index" data-toggle="tab">猜你喜欢</a>
                </li>
                <li>
                    <a href="#profile" data-toggle="tab">特惠换购</a>
                </li>
            </ul>
            <div class="clearfix"></div>
            <div class="tab-content">
                <div id="index" class="tab-pane active">
                    <div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul>
                                    <li>
                                        <img src="/index/img/like1.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/index/img/like2.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/index/img/like3.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/index/img/like4.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul>
                                    <li>
                                        <img src="/index/img/like1.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/index/img/like2.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/index/img/like3.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/index/img/like4.png" />
                                        <div class="intro">
                                            <i>Apple苹果iPhone 6s (A1699)</i>
                                        </div>
                                        <div class="money">
                                            <span>$29.00</span>
                                        </div>
                                        <div class="incar">
                                            <a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
                        <a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
                    </div>
                </div>
                <div id="profile" class="tab-pane">
                    <p>特惠选购</p>
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
                        <img src="/index/img/wx_cz.jpg">
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

<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/widget/nav.js"></script>
</body>

</html>

<script>
{{--    软删除--}}
    $(document).on("click",".btn",function(){
        var cart_id = $(this).attr("cart_id");
        var data = {};
        data.cart_id = cart_id;
        // alert(cart_id);
        var url = "{{url('/index/cart_del')}}";
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
    $(function(){
        //全选点击事件
        $(document).on('click','input[name="all_cart_shop"]',function(){
            //获取当前状态
            var status=$(this).prop('checked')
            //给所有复选框状态改变
            $('.cart_shop').prop('checked',status)
            //重新计算总价
            getAllPrice()
        })

        //复选框点击事件
        $(document).on('click','.cart_goods',function(){
            //调用重新获取总价方法
            getAllPrice()
        })

        //结算点击事件
        $(document).on('click','#settlement',function(){
            //获取要结算的商品
            var cart_goods=$('.cart_goods:checked')
            //空字符串 拼接 商品id sku
            var goods=''
            //循环获取商品id sku
            cart_goods.each(function(){
                goods+=$(this).parents('.cart-list').attr('goods_id')+':'+$(this).parents('.cart-list').attr('sku')+'。'
            })
            //去除多余字符
            goods=goods.substr(0,goods.length-1)
            //判断是否有要结算的商品
            if(goods==''){
                alert('请选择要结算的商品')
                return false
            }
            //跳转结算页面
            location.href='/index/cart/settlement?goods_info='+goods
        })

        //重新获取总价方法
        function getAllPrice(){
            //空字符串 拼接商品id sku
            var goods_info=[]
            //获取所选中的商品
            $('.cart_goods:checked').each(function(i){
                goods_info.push($(this).parents('.cart-list').attr('goods_id')+':'+$(this).parents('.cart-list').attr('sku'))
            })
            //ajax发送请求
            $.ajax({
                //请求地址
                url:'/index/getAllPrice',
                //请求方式
                type:'post',
                //发送数据
                data:{goods_info:goods_info},
                //设置同步异步
                //预期返回数据类型
                dataType:'json',
                //回调函数
                success:function(data){
                    $('.summoney').text("￥"+data.data+".00")
                }
            })
        }
    })
//    给加号点击事件
    $(document).on('click','.plus',function(){

    })
</script>
