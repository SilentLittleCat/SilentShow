@extends('web.layout')

@section('header')
<style type="text/css">
    .sg-container {
        padding-top: 50px;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    .sg-bg {
        background-image: url("/img/bg/bg.jpg");
        -webkit-filter: blur(20px);
        filter: blur(20px);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    .sg-photos-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        z-index: 2000;
        overflow: hidden;
    }
    .sg-photos-select {
        position: absolute;
        top: 0;
        right: 0;
        width: 20%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.4);
    }
    .sg-show-photo-box {
        position: absolute;
        top: 0;
        left: 0;
        width: 80%;
        height: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .sg-show-photo {
        height: 70%;
        overflow: hidden;
    }
    .sg-photos {
        height: 100%;
        overflow: auto;
    }
    .sg-photos::-webkit-scrollbar {
        background-color: rgba(0, 0, 0, 0.7);
    }
    .sg-photos::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.7);
    }
    .sg-show-photo img {
        height: 90%;
        border: 8px solid white;
        box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
        margin: 20px;
    }
    .sg-photos-select img {
        width: 100%;
    }
    .sg-photos-wrap {
        z-index: 2000;
    }
    .sg-photo-item {
        margin: 15px;
        border: 5px solid transparent;
        transition: all 0.5s;
    }
    .sg-photo-item.sg-selected {
        border: 5px solid white;
    }
    .sg-photo-item:hover {
        border: 5px solid rgba(255, 255, 255, 0.5);
    }
</style>
@endsection

@section('content')
    <div class="sg-container">
        @include('share.nav_header')
        
        <div class="sg-photos-container">
            <div class="sg-photos-wrap">
                <div class="sg-show-photo-box">
                    <div class="sg-show-photo" id="show-photo">
                        @if($category->photos->first() != null)
                            <img src="{{ $category->photos->first()->path }}">
                        @else
                            <img src="/img/photos/no-photo.jpg">
                        @endif
                    </div>
                </div>
                <div class="sg-photos-select">
                    <div class="sg-photos">
                        @foreach($category->photos as $item)
                            <div class="sg-photo-item {{ $loop->first ? 'sg-selected' : '' }}" data-path="{{ $item->path }}">
                                <img src="{{ $item->path }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="sg-bg"></div>
    </div>

@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        $('.sg-photos-select').on('click', '.sg-photo-item', function () {
           $('.sg-photo-item').removeClass('sg-selected');
           $(this).addClass('sg-selected');
           $('#show-photo img').attr('src', $(this).attr('data-path'));
        });
    });
</script>
@endsection