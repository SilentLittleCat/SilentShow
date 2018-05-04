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
    <link rel="stylesheet" href="/plugin/adminlte/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="/plugin/adminlte/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/plugin/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/plugin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="icon" href="/img/icon/icon3.png" sizes="32x32" type="image/png">

    <script src="/plugin/adminlte/bower_components/jquery/dist/jquery.min.js"></script>

    @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="/guest" class="logo">
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
                <li class="{{ url()->current() == url('/guest') ? 'active' : '' }}">
                    <a href="/guest">
                        <i class="fa fa-bar-chart"></i><span>统计管理</span>
                    </a>
                </li>
                <li class="{{ url()->current() == url('/guest/movies/index') ? 'active' : '' }}">
                    <a href="/guest/movies/index">
                        <i class="fa fa-film"></i><span>电影管理</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<script src="/plugin/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/plugin/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugin/adminlte/bower_components/raphael/raphael.min.js"></script>
<script src="/plugin/adminlte/bower_components/morris.js/morris.min.js"></script>
<script src="/plugin/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="/plugin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugin/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/plugin/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="/plugin/adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="/plugin/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="/plugin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/plugin/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/plugin/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/plugin/adminlte/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            language: 'zh-CN',
            format: 'yyyy-mm-dd'
        });
    });
</script>
@yield('footer')
</body>
</html>
