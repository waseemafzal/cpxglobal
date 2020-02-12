<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <div class="user-panel hidden">

            <div class="pull-left image">

                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            </div>

            <div class="pull-left info">

                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

            </div>

        </div>

        <!-- search form -->

        <form action="#" method="get" class="sidebar-form hidden">

            <div class="input-group">

                <input type="text" name="q" class="form-control" placeholder="Search...">

                <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

            </div>

        </form>

        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">MAIN NAVIGATION</li>

            <li><a href="dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="treeview hidden">

                <a href="#">

                    <i class="fa fa-edit"></i> <span>Freelancer Categories</span>

                    <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

                </a>

                <ul class="treeview-menu">

                    <li><a href="menu"><i class="fa fa-circle-o"></i> <span>Top Menu </span></a></li>

                    <li><a href="childmenu"><i class="fa fa-circle-o"></i> <span>Child Menu </span></a></li>

                </ul>

            </li>

            <li>

                <li class="treeview hidden">

                    <a href="#">

                        <i class="fa fa-laptop"></i>

                        <span>Buyer Management</span>

                        <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="buyerquick"><i class="fa fa-list"></i> <span>Buyer Quick Request</span></a></li>

                        <li><a href="buyerrequest"><i class="fa fa-list"></i> <span>Buyer Purposals</span></a></li>

                    </ul>

                </li>

                <li class="treeview hidden">

                    <a href="#">

                        <i class="fa fa-list"></i> <span>Order Management</span>

                        <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="order"><i class="fa fa-list"></i> <span>Orders </span></a></li>

                        <li><a href="disputedorder"><i class="fa fa-list"></i> <span>Disputed Orders </span></a></li>

                        <li><a href="orderStatusTitles"><i class="fa fa-list"></i> <span>Status Titles</span></a></li>

                    </ul>

                </li>

                <li class="hidden"><a href="sliders"><i class="fa fa-user"></i> <span>Sponsors</span></a></li>

                <li class="treeview">

                    <a href="#">

                        <i class="fa fa-users"></i> <span>Users Management</span>

                        <span class="pull-right-container">

               	 <i class="fa fa-angle-left pull-right"></i>

                </span>

                    </a>

                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>auth/view_users"><i class="fa fa-user"></i> <span>Users</span></a></li>
                        <li><a href="<?php echo base_url();?>auth/view_users_archive"><i class="fa fa-user"></i> <span>Archive Users</span></a></li>
                        <li><a href="auth/admins"><i class="fa fa-user"></i> <span>Admins</span></a></li>
                        <li><a href="auth/create_user"><i class="fa fa-user"></i> <span>Add Admin</span></a></li>
                        <li class="hidden"><a href="services"><i class="fa fa-list"></i> <span>Manage Services</span></a></li>
                    </ul>

                </li>

                <li class="treeview hidden">

                    <a href="#">

                        <i class="fa fa-money"></i> <span>Payment Management</span>

                        <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="paypal_payment_requests"><i class="fa fa-paypal"></i> <span>Paypal Requests</span></a></li>

                        <li><a href="paystack_payment_requests"><i class="fa fa-bank"></i> <span>Paystack Requests</span></a></li>
                        <li><a href="seller_account_balance"><i class="fa fa-money"></i> <span>Seller SS Balance</span></a></li>

                    </ul>

                </li>

                <li class="treeview hidden">

                    <a href="#">

                        <i class="fa fa-list"></i> <span>Companies Management</span>

                        <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="companies_categories"><i class="fa fa-home"></i> <span>Companies categories</span></a></li>

                    </ul>

                </li>

               
                <li><a href="cms"><i class="fa fa-list"></i> <span>Pages</span></a></li>

                <li><a href="blogpost"><i class="fa fa-th"></i> <span>News/Articles</span></a></li>

                <li class="hidden"><a href="product"><i class="fa fa-list"></i> <span>Products</span></a></li>

                <li><a href="faqs"><i class="fa fa-search"></i> <span>Faqs</span></a></li>

                <li><a href="testimonial"><i class="fa fa-th"></i> <span> Testimonial</span></a></li>

                <li class="hidden"><a href="course"><i class="fa fa-search"></i> <span>Courses</span></a></li>

                <li><a href="setting/edit"><i class="fa fa-pencil"></i> <span>Footer Setting</span></a></li>

                <li><a href="subscribers"><i class="fa fa-users"></i> <span>Subscribers</span></a></li>

                <li><a href="setting/edit"><i class="fa fa-pencil"></i> <span>Setting</span></a></li>

                <!--

<li><a href="extras" ><i class="fa fa-th"></i> <span>Extras</span></a></li>

<li ><a href="order" ><i class="fa fa-th"></i> <span>Order</span></a></li>

<li><a href="order/completed" ><i class="fa fa-th"></i> <span>completed Order</span></a></li>

<li><a href="slider"  ><i class="fa fa-th"></i> <span>Slider</span></a></li>

<li><a href="urls" ><i class="fa fa-th"></i> <span>Urls</span></a></li>

<li><a href="coupon" ><i class="fa fa-th"></i> <span>Coupon</span></a></li> -->

        </ul>

    </section>

    <!-- /.sidebar -->

</aside>