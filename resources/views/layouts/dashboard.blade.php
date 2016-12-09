<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CMS - Nhóm 8</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/multistep.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/timeline.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/sb-admin-2.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/jquery-te-1.4.0.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <p class="navbar-brand">
            Xin chào <?= (Session::has('user_id')) ? Session::get('user_id') : '' ?></p>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <?php if (isset($comm_noti)): ?>
                <?php foreach ($comm_noti as $comm):?>
                    <li>
                    <a href="#">
                        <div>
                            <strong><?= $comm->comm_name ?></strong>
                            <span class="pull-right text-muted">
                                            <em><?= $comm->comm_created_at?></em>
                                        </span>
                        </div>
                        <div><?= substr($comm->comm_content,0,160)?>...</div>
                    </a>
                </li>
                <li class="divider"></li>
                    <?php endforeach;?>
                    <?php endif; ?>
                <li>
                    <a class="text-center" href="#">
                        <strong>Xem tất cả bình luận</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
       <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{url('admin/account')}}"><i class="fa fa-gear fa-fw"></i> Tài khoản</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url ('admin/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                    <a href="{{ url ('admin') }}"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                </li>
                <li {{ (Request::is('*posts*') ? 'class="active"' : '') }}>
                    <a href="{{ url ('admin/post') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý bài đăng</a>
                    <ul class="nav" id="side-menu">
                        <li><a href="{{url('admin/post')}}">Thống kê</a></li>
                        <li><a href="{{url('admin/post/create')}}">Viết bài</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*category*') ? 'class="active"' : '') }}>
                    <a href="{{ url ('admin/category') }}"><i class="fa fa-archive fa-fw"></i> Quản lý chuyên mục</a>
                    <ul class="nav" id="side-menu">
                        <li><a href="{{url('admin/category')}}">Thống kê</a></li>
                        <li><a href="{{url('admin/category/create')}}">Thêm chuyên mục</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*comment*') ? 'class="active"' : '') }}>
                    <a href="{{ url ('admin/category') }}"><i class="fa fa-comment fa-fw"></i> Quản lý bình luận</a>
                    <ul class="nav" id="side-menu">
                        <li><a href="{{url('admin/comment')}}">Thống kê</a></li>
                        <li><a href="{{url('admin/comment/status/0')}}">Bình luận chưa duyệt</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*setting') ? 'class="active"' : '') }}>
                    <a href="{{ url ('admin/setting') }}"><i class="fa fa-adjust fa-fw"></i> Cài đặt website</a>
                    <!-- /.nav-second-level -->
                </li>
                <li {{ (Request::is('*account') ? 'class="active"' : '') }}>
                    <a href="{{ url ('admin/account') }}"><i class="fa fa-adjust fa-fw"></i> Cài đặt tài khoản</a>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<div id="wrapper">
    <!-- Navigation -->

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@yield('page_heading')</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            @yield('section')

        </div>
        <!-- /#page-wrapper -->
    </div>
</div>
<div class="bottom">
    <nav class="bottom" role="navigation" style="margin-bottom: 0">
        <div class="bottom">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <p class="navbar-brand">
               PHÁT TRIỂN PHẦN MỀM MÃ NGUỒN MỞ
            </p></br>
            Mai Huỳnh - Võ Huy Kha - Trần Đại Phúc
            </ul>
        </div>
        </nav>
</div>
</body>
<footer>
    <!-- JavaScripts -->
    <script src="{{URL::asset('js/jquery.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}}"></script>
    <script src="{{URL::asset('js/multistep.js')}}"></script>
    <script src="{{URL::asset('js/sb-admin-2.js')}}"></script>
    <script src="{{URL::asset('js/Chart.js')}}"></script>
    <script src="{{URL::asset('js/metisMenu.js')}}"></script>
    <script src="{{URL::asset('js/frontend.js')}}"></script>
    <script src="{{URL::asset('js/jquery-te-1.4.0.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</footer>
</html>
