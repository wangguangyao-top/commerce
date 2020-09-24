@extends('admin/public/layout')
@section('content')
    <!-- 正文区域 -->
    <div class="box-header with-border">
        <h3 class="box-title">商品属性添加</h3>
    </div>
    <!--扩展属性-->
    <section class="content">
        <div class="box-body">
            <!--tab页-->
            <div class="nav-tabs-custom">
                <!--tab头-->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;">属性添加</a>
                    </li>
                </ul>
                <!--tab头/-->

                <!--tab内容-->
                <div class="tab-content">

                    <!--表单内容-->
                    <div class="tab-pane active">
                        <div class="row data-type">
                            <div class="col-md-2 title"><b>商品名称：</b></div>
                            <div class="col-md-10 data">
                                <select class="form-control" id="attr_id">
                                    <option value="">请选择商品。</option>
                                    @foreach($goods_info as $k=>$v)
                                        <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane active">
                        @foreach($attr_info as $k=>$v)
                            <div class="row data-type">
                                <div class="col-md-2 title"><b>商品{{$v->attr_name}}：</b></div>
                                <div class="col-md-10 data" attr_id="{{$v->id}}">
                                    @foreach($v->attrval_info as $kk=>$vv)
                                        <input type="checkbox" name="attr_id" attr_id="{{$v->id}}" class="sku"
                                               value="{{$vv['id']}}">{{$vv['attrval_name']}}
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--tab内容/-->
                <!--表单内容/-->
            </div>
        </div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" id="sub">提交</button>
            <button class="btn btn-danger"><a href="{{url('admin/attrval')}}" style="color: #ffffff">返回列表页面</a></button>
        </div>
    </section>
    <center>
        <section class="content">
            <div class="sku">
                <table>
                </table>
            </div>
        </section>
    </center>
    <!-- 正文区域 /-->
    <script>
        $(document).ready(function () {
            //提交事件
            $(document).on('click', '#sub', function () {
                //获取商品ID
                var goods_id = $('#attr_id').val()
                //获取选中的复选框
                var arr = [];
                var arr2 = [];
                var arr3 = [];
                $('.sku:checked').each(function () {
                    if ($(this).attr('attr_id') == 1) {
                        arr.push($(this).val())
                    }
                    if ($(this).attr('attr_id') == 2) {
                        arr2.push($(this).val())
                    }
                    if ($(this).attr('attr_id') == 3) {
                        arr3.push($(this).val())
                    }
                })
                //通过ajax传送值
                $.ajax({
                    //请求路径
                    url: "/admin/sku/store/" + goods_id,
                    //请求方式
                    type: "post",
                    //请求数据
                    data: {sku: arr, sku1: arr2, sku2: arr3},
                    //预期返回数据类型
                    dataType: 'json',
                    //回调函数
                    success: function (res) {
                        if (res.code == 200) {
                            var str = '';
                            str += '<table border="1" class="sku2"><tr><td>商品</td><td>属性</td><td>库存</td><td>价格</td><td>操作</td></tr>'
                            for (var i in res.data) {
                                str += '<tr><td>' + res.data[i]["goods_name"] + '</td><td>' + res.data[i]["sku"] + '</td><td><input type="text" class="goods_store" name="goods_store" ></td><td><input type="text" class="goods_price" name="goods_price"></td><td><button class="but" id="' + res.data[i]["id"] + '">确定</button></td></tr>';
                            }
                            str += '</table>';
                            $('.sku').append(str);

                        } else {

                        }
                    }
                })
            })
            $(document).on('blur', '.goods_price', function () {
                goods_price = $(this).val();
            })
            $(document).on('blur', '.goods_store', function () {
                goods_store = $(this).val();
            })
            $(document).on('focus','.goods_price',function () {
                goods_price = $(this).val();
            })
            $(document).on('focus','.goods_store',function () {
                goods_store = $(this).val();
            })
            $(document).on('click', '.but', function () {
                var id = $(this).attr('id');
                var url = '/admin/sku/addSku';
                var data = {
                    id: id,
                    goods_price: goods_price,
                    goods_store: goods_store
                };
                $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function (info) {
                        alert(info.msg);
                    }
                })
            });
        })
    </script>
@endsection
