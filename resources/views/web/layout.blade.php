<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Silent Show ee</title>

        <!-- Fonts -->
        {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        <link href="/plugin/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="/plugin/star-rating-svg/star-rating-svg.css" rel="stylesheet" type="text/css">
        <link href="/plugin/slick/slick.css" rel="stylesheet" type="text/css">
        <link href="/plugin/slick/slick-theme.css" rel="stylesheet" type="text/css">
        <link href="/plugin/fullPage/jquery.fullpage.min.css" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/plugin/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="icon" href="/img/icon/icon3.png" sizes="32x32" type="image/png">

        <script src="/plugin/jquery/jquery.js"></script>
        <script src="/plugin/bootstrap/js/bootstrap.js"></script>
        <script src="/plugin/slick/slick.min.js"></script>
        <script src="/plugin/snap.svg/snap.svg-min.js"></script>
        <script src="/plugin/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="/plugin/fullPage/jquery.fullpage.extensions.min.js"></script>
        <style type="text/css">
            .sg-footer {
                height: 50px;
                line-height: 50px;
                text-align: center;
                background-color: black;
                color: white;
                font-size: 1.2em;
                width: 100%;
            }
        </style>
        @yield('header')
    </head>
    <body>
        <div class="sg-app-content">
            @yield('content')
        </div>

        <footer class="sg-footer">Copyright © 2018 Silent Show. All Rights Reserved.</footer>
        <script src="/plugin/star-rating-svg/jquery.star-rating-svg.js"></script>
        @yield('footer')
    </body>
</html>
