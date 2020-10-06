<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>结算页</title>

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-getOrderInfo.css" />
</head>

<body>
<!--head-->
<div class="top">
    <div class="py-container">
        <div class="shortcut">
            <ul class="fl">
                <li class="f-item">品优购欢迎您！</li>
                @php
                $user=session('user');
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
        <div class="fl logo"><span class="title">结算页</span></div>
        <div class="fr search">
            <form class="sui-form form-inline">
                <div class="input-append">
                    <input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
                    <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                </div>
            </form>
        </div>
    </div>
    <!--主内容-->
    <div class="checkout py-container">
        <div class="checkout-tit">
            <h4 class="tit-txt">填写并核对订单信息</h4>
        </div>
        <div class="checkout-steps">
            <!--收件人信息-->
            <div class="step-tit">
                <h5>收件人信息<span><a data-toggle="modal" data-target=".edit" data-keyboard="false" class="newadd">新增收货地址</a></span></h5>
            </div>
            <div class="step-cont">
                <div class="addressInfo">
                    <ul class="addr-detail">
                        <li class="addr-item">
                            @if(!empty($user_address))
                            @foreach($user_address as $k=>$v)
                            <div class="user_address">
                                <div @if($v['is_default']==2) class="con name selected" @else class="con name" @endif address_id="{{$v['id']}}" style="width: 120px;"><a href="javascript:;" >{{$v['take_name']}}<span title="点击取消选择">&nbsp;</a></div>
                                <div class="con address">{{$v['take_name']}} {{$v['area']}}{{$v['city']}}{{$v['province']}} {{$v['adddress_detail']}} <span>{{substr_replace($v['is_tel'],'****',3,4)}}</span>
                                    @if($v['is_default']==2)<span class="base">默认地址</span>@endif
                                    <span class="edittext"><a data-toggle="modal" data-target=".edit" data-keyboard="false" >编辑</a>&nbsp;&nbsp;<a href="javascript:;">删除</a></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            @endif
                        </li>


                    </ul>
                    <!--添加地址-->
                    <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                    <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="sui-form form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">邮箱：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">地址别名：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                            <div class="othername">
                                                建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
                                    <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--确认地址-->
                </div>
                <div class="hr"></div>

            </div>
            <div class="hr"></div>
            <!--支付和送货-->
            <div class="payshipInfo">
                <div class="step-tit">
                    <h5>支付方式</h5>
                </div>
                <div class="step-cont">
                    <ul class="payType">
                        <li class="selected" pay_type="1">微信付款<span title="点击取消选择"></span></li>
                        <li pay_type="2">货到付款<span title="点击取消选择"></span></li>
                        <li pay_type="3">支付宝<span title="点击取消选择"></span></li>
                    </ul>
                </div>
                <div class="hr"></div>
                <div class="step-tit">
                    <h5>送货清单</h5>
                </div>
                <div class="step-cont">
                    <ul class="send-detail">
                        @foreach($goods_info as $k=>$v)
                        <li>
                            <div class="sendGoods">

                                <ul class="yui3-g">
                                    <li class="yui3-u-1-6">
                                        @php
                                            $img=explode(',',$v['goods_img']);
                                            $v['goods_img']=array_shift($img);
                                        @endphp
                                        <span><img src="{{$v['goods_img']}}" width="80px;"/></span>
                                    </li>
                                    <li class="yui3-u-7-12">
                                        <div class="desc">{{$v['goods_name']}}</div>
                                        <div class="seven">7天无理由退货</div>
                                    </li>
                                    <li class="yui3-u-1-12">
                                        <div class="price">￥{{$v['goods_price']}}</div>
                                    </li>
                                    <li class="yui3-u-1-12">
                                        <div class="num">X{{$v['cart_nums']}}</div>
                                    </li>
                                    <li class="yui3-u-1-12">
                                        <div class="exit">有货</div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li></li>
                        <li></li>
                            @endforeach
                    </ul>
                </div>
                <div class="hr"></div>
            </div>
            <div class="linkInfo">
                <div class="step-tit">
                    <h5>发票信息</h5>
                </div>
                <div class="step-cont">
                    <span>普通发票（电子）</span>
                    <span>个人</span>
                    <span>明细</span>
                </div>
            </div>
            <div class="cardInfo">
                <div class="step-tit">
                    <h5>使用优惠/抵用</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="order-summary">
        <div class="static fr">
            <div class="list">
                <span><i class="number">{{$nums}}</i>件商品，总商品金额</span>
                <em class="allprice">¥{{$money}}.00</em>
            </div>
            <div class="list">
                <span>返现：</span>
                <em class="money">0.00</em>
            </div>
            <div class="list">
                <span>运费：</span>
                <em class="transport">0.00</em>
            </div>
        </div>
    </div>
    <div class="clearfix trade">
        <div class="fc-price">应付金额:　<span class="price">¥{{$money}}.00</span></div>
        <div class="fc-receiverInfo">寄送至:{{$user_address_info['area']}}{{$user_address_info['city']}}{{$user_address_info['province']}} {{$user_address_info['adddress_detail']}} 收货人：{{$user_address_info['take_name']}} {{substr_replace($user_address_info['is_tel'],'****',3,4)}}</div>
    </div>
    <div class="submit">
        <a class="sui-btn btn-danger btn-xlarge" href="javascript:;" id="submitOrder">提交订单</a>
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
<script type="text/javascript" src="/index/js/pages/getOrderInfo.js"></script>
</body>

</html>

<script>
    $(function(){
        //收货地址
        $(document).on('click','.user_address',function(){
            //获取当前点击对象
            var _this=$(this)
            //移除其他的样式
            _this.siblings('.user_address').find('.name').removeClass('selected')
            //给当前点击对象加样式
            _this.find('.name').addClass('con name selected')
        })

        //提交订单点击事件
        $(document).on('click','#submitOrder',function(){
            //获取商品id 和 sku
            var goods_info="{{request()->goods_info}}"
            //获取收货地址
            var user_address_info=$('.user_address>.selected').attr('address_id')
            //获取付款方式
            var pay_type=$('.payType>.selected').attr('pay_type')
            //ajax发送请求
            $.ajax({
                //提交地址
                url:'/index/confirmOrder',
                //请求方式
                type:'post',
                //发送数据
                data:{goods_info:goods_info,user_address_info:user_address_info,pay_type:pay_type},
                //预期返回数据类型
                dataType:'json',
                //回调函数
                success:function(res){
                    console.log(res)
                }
            })
        })
    })
</script>
