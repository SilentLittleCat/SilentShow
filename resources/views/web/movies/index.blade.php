@extends('web.layout')

@section('header')
<style type="text/css">
    .movies-container {
        background-color: #eee;
        overflow: hidden;
        padding-top: 70px;
        padding-bottom: 20px;
    }
    .sg-list-item {
        padding-top: 20px;
    }
</style>
@endsection

@section('content')
    <div class="sg-container">
        @include('share.nav_header')
        <div class="movies-container container text-center">
            @foreach($list as $item)
                @if($loop->iteration % 3 === 1)
                    <div class="row sg-list-item">
                @endif
                <div class="col-sm-4">
                    <div class="card">
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
                @if($loop->iteration % 3 === 0 || $loop->last)
                    </div>
                @endif
            @endforeach
        </div>

        {{--@include('share.bottom_kit')--}}
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