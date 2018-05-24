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
    <link rel="stylesheet" href="/plugin/adminlte/plugins/iCheck/all.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="/img/icon/icon3.png" sizes="32x32" type="image/png">

    <script src="/plugin/adminlte/bower_components/jquery/dist/jquery.min.js"></script>

    <style>

    </style>
    @yield('header')
</head>
<body style="background-color: #eff7ff">

@yield('content')

<script src="/plugin/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/plugin/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/plugin/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="/plugin/adminlte/plugins/iCheck/icheck.min.js"></script>
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
