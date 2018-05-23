<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Silent Show</title>

    <link rel="stylesheet" href="/plugin/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugin/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/plugin/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="/plugin/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/plugin/adminlte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="/img/icon/icon3.png" sizes="32x32" type="image/png">

    <script src="/plugin/adminlte/bower_components/jquery/dist/jquery.min.js"></script>

    <style>
        .content-wrapper {
            height: 100% !important;
        }
    </style>
    @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini" style="overflow: hidden">
<div class="wrapper">
    <header class="main-header">
        <a href="index2.html" class="logo">
            <span class="logo-mini"><b>SS</b></span>
            <span class="logo-lg"><b>Silent Show</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <p>Alexander Pierce - Web Developer<small>Member since Nov. 2012</small></p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <ul class="sidebar-menu" data-widget="tree" id="sg-sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i><span>知</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="/friends/learn/fun/index"><i class="fa fa-angle-right"></i>趣闻列表</a>
                        </li>
                        <li>
                            <a href="/friends/hot-talks/index"><i class="fa fa-angle-right"></i>热谈列表</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-plane"></i><span>行</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="/friends/travels/index"><i class="fa fa-angle-right"></i>难忘旅途</a>
                        </li>
                        <li>
                            <a href="/friends/go-now/index"><i class="fa fa-angle-right"></i>说走就走</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper" style="height: 100%; overflow: hidden">
        <iframe id="main-iframe" src="/friends/learn/fun/index" frameborder="0" width="100%" height="100%"></iframe>
    </div>
</div>

<script src="/plugin/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/plugin/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="/plugin/adminlte/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            language: 'zh-CN',
            format: 'yyyy-mm-dd'
        });
        $('#main-iframe').css('height', $('.content-wrapper').height());
        $('#sg-sidebar-menu').on('click', '.treeview-menu a', function () {
           event.preventDefault();
           $('.sidebar-menu .active').removeClass('active');
           $(this).parent().addClass('active');
           $(this).parent().parent().parent().addClass('active');
           $('#main-iframe').attr('src', $(this).attr('href'));
        });
    });
</script>
@yield('footer')
</body>
</html>
