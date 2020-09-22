<!-- 导航侧栏 -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{session('user_name')}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <ul class="sidebar-menu"  >
            <li class="header">菜单</li>
            <li id="admin-index"><a href="{{url('admin/index')}}"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>

            <!-- 菜单 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>基本管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="seller.html">
                            <i class="fa fa-circle-o"></i> 修改资料
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="password.html">
                            <i class="fa fa-circle-o"></i> 修改密码
                        </a>
                    </li>
                </ul>
            </li>

            <!-- 商品管理开始 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>商品管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <!-- 商品开始 -->
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>商品</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                        </a>
                        <ul class="treeview-menu">

                            <li id="admin-login">
                                <a href="goods_edit.html">
                                    <i class="fa fa-circle-o"></i>新增商品
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="goods.html">
                                    <i class="fa fa-circle-o"></i>商品展示
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- 商品结束 -->

                    <!-- 商品属性名称开始 -->
                    <li id="admin-login">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>商品属性名称</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                        </a>
                        <ul class="treeview-menu">

                            <li id="admin-login">
                                <a href="goods_edit.html">
                                    <i class="fa fa-circle-o"></i>新增商品属性名称
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="goods.html">
                                    <i class="fa fa-circle-o"></i>商品属性名称管理
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- 商品属性名称结束 -->

                    <!-- 商品属性值开始 -->
                    <li id="admin-login">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>商品属性值</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                        </a>
                        <ul class="treeview-menu">

                            <li id="admin-login">
                                <a href="goods_edit.html">
                                    <i class="fa fa-circle-o"></i>新增商品属性值
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="goods.html">
                                    <i class="fa fa-circle-o"></i>商品属性值管理
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- 商品属性值结束 -->

                    <!-- 商品属性开始 -->
                    <li id="admin-login">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>商品属性</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                        </a>
                        <ul class="treeview-menu">

                            <li id="admin-login">
                                <a href="goods_edit.html">
                                    <i class="fa fa-circle-o"></i>新增商品属性
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="goods.html">
                                    <i class="fa fa-circle-o"></i>商品属性管理
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- 商品属性值结束 -->
                </ul>
                <!-- 商品管理结束 -->

            </li>

            <!-- 菜单 /-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- 导航侧栏 /-->