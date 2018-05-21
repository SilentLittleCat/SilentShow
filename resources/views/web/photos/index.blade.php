@extends('web.layout')

@section('header')
<style type="text/css">
    .sg-container {
        padding-top: 50px;
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
    }
    .sg-photos-container {
        display: flex;
        align-items: center;
    }
    .sg-photos-box {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        margin: 30px;
        z-index: 2000;
    }
    .sg-photo-item {
        width: 20%;
        margin: 20px;
        position: relative;
        overflow: hidden;
        z-index: 2000;
    }
    .sg-photo-mask {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: absolute;
        width: 100%;
        height: 100%;
        font-size: 3em;
        color: white;
        background-color: rgba(0, 0, 0, 0.3);
        transition: all 1s;
        z-index: 5000;
    }
    .sg-photo-item img {
        width: 100%;
        transition: all 1s;
    }
    .sg-photo-item:hover img {
        transform: scale(1.3);
    }
    .sg-photo-item:hover .sg-photo-mask {
        background-color: transparent;
        color: transparent;
    }
</style>
@endsection

@section('content')
    <div class="sg-container">
        @include('share.nav_header')
        
        <div class="sg-photos-container">
            <div class="sg-photos-box">
                @foreach($categories as $item)
                    <a class="sg-photo-item" href="/web/photos/category?id={{ $item->id }}">
                        <div class="sg-photo-mask">{{ $item->name }}</div>
                        <img src="{{ $item->cover }}" class="sg-photo-img">
                    </a>
                @endforeach
            </div>
        </div>

        <div class="sg-bg"></div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        
    });
</script>
@endsection