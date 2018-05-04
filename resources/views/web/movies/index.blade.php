@extends('web.layout')

@section('header')
<style type="text/css">
    @keyframes caption-animation
    {
        0%   { color: transparent; bottom: 0px; }
        25%  { color: transparent; bottom: 0px; }
        50%  { color: white; bottom: 100px; }
        100% { color: white; }
    }

    @-webkit-keyframes caption-animation /* Safari 与 Chrome */
    {
        0%   { color: transparent; bottom: 0px; }
        25%  { color: transparent; bottom: 0px; }
        50%  { color: white; bottom: 100px; }
        100% { color: white; }
    }
    .nav-link:hover {
        color: white;
    }
    .carousel-inner .carousel-caption {
        bottom: 100px;
        animation: caption-animation 5s;
        -webkit-animation: caption-animation 5s;
    }
    .movies-container {
        background-color: #eee;
        overflow: hidden;
    }
    .sg-list-item {
        padding-top: 20px;
    }
    .movies-container .card {
        transition-property: left,right,opacity;
        transition-duration: 1s;
    }
    .movies-container .card:hover {
        top: -5px;
    }
    .sg-card-left-hide {
        opacity: 0;
        left: -100%;
    }
    .sg-card-left-show {
        opacity: 1;
        left: 0;
    }
    .sg-card-right-hide {
        opacity: 0;
        right: -100%;
    }
    .sg-card-right-show {
        opacity: 1;
        right: 0;
    }
</style>
@endsection

@section('content')
    <div class="sg-container">
        <div id="index-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#index-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#index-carousel" data-slide-to="1"></li>
                <li data-target="#index-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($carousels as $item)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ $item->cover }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>{{ $item->recommend }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#index-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#index-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="movies-container container text-center">
            @foreach($list as $item)
                @if($loop->iteration % 2 === 1)
                    <div class="row sg-list-item">
                @endif
                <div class="col">
                    <div class="card {{ $loop->iteration % 2 === 1 ? 'sg-card-left-hide' : 'sg-card-right-hide' }}">
                        <img class="card-img-top" src="{{ $item->cover }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">导演：{{ $item->director }}</li>
                            <li class="list-group-item">主演：{{ $item->actor }}</li>
                            <li class="list-group-item">
                                评分：<span class="sg-rating" data-rating="{{ round($item->score / 2, 1) }}"></span>
                                <span>{{ $item->score }}</span>
                            </li>
                            <li class="list-group-item">推荐：{{ $item->recommend }}</li>
                        </ul>
                    </div>
                </div>
                @if($loop->iteration % 2 === 0 || $loop->last)
                    </div>
                @endif
            @endforeach
        </div>

        @include('share.bottom_kit')
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        $('#index-carousel').carousel();

        $('.sg-rating').starRating({
            readOnly: true,
            totalStars: 5,
            starShape: 'rounded',
            starSize: 20,
            emptyColor: 'lightgray',
            activeColor: 'crimson',
            useGradient: false
        });

        $(window).scroll(function () {
            $('.movies-container .card').each(function () {
                if($(this).offset().top + $(this).height() < window.scrollY + window.innerHeight) {
                    if($(this).attr('data-sg-animation') !== 'complete') {
                        if($(this).hasClass('sg-card-left-hide')) {
                            $(this).removeClass('sg-card-left-hide');
                            $(this).addClass('sg-card-left-show');
                        } else {
                            $(this).removeClass('sg-card-right-hide');
                            $(this).addClass('sg-card-right-show');
                        }
                        $(this).attr('data-sg-animation', 'complete');
                    }
                }
            });
        });
    });
</script>
@endsection