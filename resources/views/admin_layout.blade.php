<!DOCTYPE html>

<head>
    <title>Why-Tech | @yield('admin_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/morris.css') }}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('backend/css/monthly.css') }}">
    <!-- //calendar -->
    <!-- alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- //alertify -->
    <!-- Ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- //Ui -->
    <!-- datatable -->
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.css') }}" type="text/css" />
    <!-- //datatable -->
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}" type="image/x-icon">
    <!-- //font-awesome icons -->
    <script src="{{ asset('backend/js/jquery3.0.6.min.js') }}"></script>
    <script src="{{ asset('backend/js/raphael-min.js') }}"></script>
    <script src="{{ asset('backend/js/morris.js') }}"></script>

</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="{{ url('/dashboard') }}" class="logo">
                    ADMIN
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            {{-- <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-success">8</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <li>
                                <p class="">You have 8 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Target Sell</h5>
                                            <p>25% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="45">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Product Delivery</h5>
                                            <p>45% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="78">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Payment collection</h5>
                                            <p>87% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="60">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info clearfix">
                                        <div class="desc pull-left">
                                            <h5>Target Sell</h5>
                                            <p>33% , Deadline 12 June’13</p>
                                        </div>
                                        <span class="notification-pie-chart pull-right" data-percent="90">
                                            <span class="percent"></span>
                                        </span>
                                    </div>
                                </a>
                            </li>

                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-important">4</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <li>
                                <p class="red">You have 4 Mails</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('backend/images/3.png')}}"></span>
                                    <span class="subject">
                                        <span class="from">Jonathan Smith</span>
                                        <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('backend/images/1.png')}}"></span>
                                    <span class="subject">
                                        <span class="from">Jane Doe</span>
                                        <span class="time">2 min ago</span>
                                    </span>
                                    <span class="message">
                                        Nice admin template
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('backend/images/3.png')}}"></span>
                                    <span class="subject">
                                        <span class="from">Tasi sam</span>
                                        <span class="time">2 days ago</span>
                                    </span>
                                    <span class="message">
                                        This is an example msg.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('backend/images/2.png')}}"></span>
                                    <span class="subject">
                                        <span class="from">Mr. Perfect</span>
                                        <span class="time">2 hour ago</span>
                                    </span>
                                    <span class="message">
                                        Hi there, its a test
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-warning">3</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <li>
                                <p>Notifications</p>
                            </li>
                            <li>
                                <div class="alert alert-info clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #1 overloaded.</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="alert alert-danger clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #2 overloaded.</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="alert alert-success clearfix">
                                    <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                    <div class="noti-info">
                                        <a href="#"> Server #3 overloaded.</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div> --}}
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img class="admin_avatar" alt="" src="{{ asset(Auth::user()->admin_avatar) }}">
                            <span class="username">{{ Auth::user()->admin_name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Hồ sơ</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> Đăng
                                    xuất</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{ url('/dashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        @hasAnyRoles(['admin', 'author'])
                        <li>
                            <a class="" href=" {{ route('order.manage') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Quản lý đơn hàng </span>
                            </a>
                        </li>
                        @endhasAnyRoles
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fas fa-truck-moving"></i>
                                <span>Vận chuyển</span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu_item">
                                    <a href="{{ route('delivery.all') }}">
                                        <i class="fab fa-shirtsinbulk"></i>
                                        Quản lý phí vận chuyển
                                    </a>
                                </li>
                                @hasAnyRoles(['admin', 'author'])
                                <li class="sub-menu_item">
                                    <a href="{{ route('delivery.create') }}">
                                        <i class="fas fa-plus-square"></i>
                                        Thêm phí vận chuyển
                                    </a>
                                </li>
                                @endhasAnyRoles
                            </ul>
                        </li>
                        @hasAnyRoles(['admin', 'author'])
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-credit-card"></i>
                                <span>Mã giảm giá</span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu_item">
                                    <a href="{{ route('coupon.all') }}">
                                        <i class="fa fa-list-alt"></i>
                                        Quản lý mã
                                    </a>
                                </li>
                                <li class="sub-menu_item">
                                    <a href="{{ route('coupon.create') }}">
                                        <i class="fa fa-plus-circle"></i>
                                        Tạo mã
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endhasAnyRoles
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu_item">
                                    <a href="{{ route('category-product.all') }}">
                                        <i class="fa fa-th-list"></i>
                                        Liệt kê danh mục
                                    </a>
                                </li>
                                @hasAnyRoles(['admin', 'author'])
                                <li class="sub-menu_item">
                                    <a href="{{ route('category-product.create') }}">
                                        <i class="fa fa-plus-square"></i>
                                        Thêm danh mục
                                    </a>
                                </li>
                                @endhasAnyRoles
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Thương hiệu sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu_item">
                                    <a href="{{ route('brand.all') }}">
                                        <i class="fa fa-th-list"></i>
                                        Liệt kê thương hiệu
                                    </a>
                                </li>
                                @hasAnyRoles(['admin', 'author'])
                                <li class="sub-menu_item">
                                    <a href="{{ route('brand.create') }}">
                                        <i class="fa fa-plus-square"></i>
                                        Thêm thương hiệu
                                    </a>
                                </li>
                                @endhasAnyRoles
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-dropbox"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu_item">
                                    <a href="{{ route('product.all') }}">
                                        <i class="fa fa-th-list"></i>
                                        Liệt kê sản phẩm
                                    </a>
                                </li>
                                @hasAnyRoles(['admin', 'author'])
                                <li class="sub-menu_item">
                                    <a href="{{ route('product.create') }}">
                                        <i class="fa fa-plus-square"></i>
                                        Thêm sản phẩm
                                    </a>
                                </li>
                                @endhasAnyRoles
                            </ul>
                        </li>

                        @hasAnyRoles(['admin', 'author'])
                        <li>
                            <a href=" {{ route('comment.all') }}">
                                <i class="fas fa-comment-dots"></i>
                                <span>Bình luận</span>
                            </a>
                        </li>
                        @endhasAnyRoles

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fab fa-slideshare"></i>
                                <span>Slider</span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu_item">
                                    <a href="{{ route('slider.all') }}">
                                        <i class="fas fa-sliders-h"></i>
                                        Quản lý slider
                                    </a>
                                </li>
                                @hasAnyRoles(['admin', 'author'])
                                <li class="sub-menu_item">
                                    <a href="{{ route('slider.create') }}">
                                        <i class="fa fa-plus-square"></i>
                                        Thêm slider
                                    </a>
                                </li>
                                @endhasAnyRoles
                            </ul>
                        </li>
                        @hasRole('admin')
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fas fa-users-cog"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu_item">
                                    <a href="{{ route('user.all') }}">
                                        <i class="fas fa-users"></i>
                                        Quản lý user
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endhasRole
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2021 Admin. All rights reserved | Design by <a href="http://w3layouts.com">WHYTECH
                            ECOMMERCE</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('backend/js/jquery.scrollTo.js') }}"></script>
    <!-- morris JavaScript -->
    <script>
        $(document).ready(function() {
            //BOX BUTTON SHOW AND CLOSE
            jQuery('.small-graph-box').hover(function() {
                jQuery(this).find('.box-button').fadeIn('fast');
            }, function() {
                jQuery(this).find('.box-button').fadeOut('fast');
            });
            jQuery('.small-graph-box .box-close').click(function() {
                jQuery(this).closest('.small-graph-box').fadeOut(200);
                return false;
            });

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#dddddd',
                axes: true,
                resize: true,
                smooth: true,
                pointSize: 0,
                lineWidth: 0,
                fillOpacity: 0.85,
                data: [{
                        period: '2015 Q1',
                        iphone: 2668,
                        ipad: null,
                        itouch: 2649
                    },
                    {
                        period: '2015 Q2',
                        iphone: 15780,
                        ipad: 13799,
                        itouch: 12051
                    },
                    {
                        period: '2015 Q3',
                        iphone: 12920,
                        ipad: 10975,
                        itouch: 9910
                    },
                    {
                        period: '2015 Q4',
                        iphone: 8770,
                        ipad: 6600,
                        itouch: 6695
                    },
                    {
                        period: '2016 Q1',
                        iphone: 10820,
                        ipad: 10924,
                        itouch: 12300
                    },
                    {
                        period: '2016 Q2',
                        iphone: 9680,
                        ipad: 9010,
                        itouch: 7891
                    },
                    {
                        period: '2016 Q3',
                        iphone: 4830,
                        ipad: 3805,
                        itouch: 1598
                    },
                    {
                        period: '2016 Q4',
                        iphone: 15083,
                        ipad: 8977,
                        itouch: 5185
                    },
                    {
                        period: '2017 Q1',
                        iphone: 10697,
                        ipad: 4470,
                        itouch: 2038
                    },

                ],
                lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script>
    <!-- calendar -->
    <script type="text/javascript" src="{{ asset('backend/js/monthly.js') }}"></script>
    <!-- alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <!-- //Alertify -->

    <!-- Delete Confirmation -->
    @yield('scripts')
    <!-- //Delete Confirmation -->
</body>

</html>
