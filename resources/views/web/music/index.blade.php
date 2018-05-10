@extends('web.layout')

@section('header')
    <style type="text/css">
        .sg-full-screen-container {
            width: 100%;
            height: 100%;
            position: relative;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .sg-footer {
            display: none;
        }
        .sg-full-screen-item {
            width: 100%;
            height: 100%;
            border-width: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="sg-full-screen-container">
        <div class="sg-full-screen-item sg-background-teal">afd</div>
        <div class="sg-full-screen-item sg-background-blue">asfd</div>
        <div class="sg-full-screen-item sg-background-red">asdffsd</div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        $(function () {
            $('.sg-full-screen-item').css('height', window.innerHeight);
            $('.sg-full-screen-container').css('height', window.innerHeight).slick({
                vertical: true,
                autoplaySpeed: 1000,
                autoplay: true,
                verticalSwiping: true
            });
        });
    </script>
@endsection