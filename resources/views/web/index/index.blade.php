@extends('web.layout')

@section('header')
<style type="text/css">
    @keyframes caption-animation
    {
        0%   { color: transparent; bottom: 0px; }
        25%  { color: transparent; bottom: 0px; }
        50%  { color: white; bottom: 80px; }
        100% { color: white; }
    }

    @-webkit-keyframes caption-animation /* Safari 与 Chrome */
    {
        0%   { color: transparent; bottom: 0px; }
        25%  { color: transparent; bottom: 0px; }
        50%  { color: white; bottom: 80px; }
        100% { color: white; }
    }
    .carousel-inner .carousel-caption {
        bottom: 80px;
        /*-webkit-animation: caption-animation 5s;*/
        animation: caption-animation 5s;
    }
    #index-carousel {
        margin-top: 60px;
        background-color: white;
    }
    .sg-container {
        background-color: #333333;
    }
    .sg-skills-container, .sg-index-job-content {
        margin-top: 50px;
    }
    .sg-index-job-item {
        margin: 20px;
        overflow: hidden;
        width: 400px;
        height: 190px;
        position: relative;
    }
    .sg-skills-item {
        margin: 20px;
        overflow: hidden;
        width: 300px;
        height: 300px;
        position: relative;
    }
    .sg-index-job-item img {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        transition: all 1s;
    }
    .sg-skills-item img {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        transition: all 1s;
    }
    .sg-index-job-mask {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        font-size: 3em;
        text-align: center;
        line-height: 190px;
        color: rgba(255, 255, 255, 1);
        background-color: rgba(0, 0, 0, 0.4);
        transition: all 1s;
        z-index: 1000;
    }
    .sg-skills-mask {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        font-size: 3em;
        text-align: center;
        line-height: 300px;
        color: rgba(255, 255, 255, 1);
        background-color: rgba(0, 0, 0, 0.4);
        transition: all 1s;
        z-index: 1000;
    }
    .sg-index-job-item.sg-hover .sg-index-job-mask {
        background-color:rgba(0, 0, 0, 0);
        color: rgba(255, 255, 255, 0);
    }
    .sg-skills-item.sg-hover .sg-skills-mask {
        background-color:rgba(0, 0, 0, 0);
        color: rgba(255, 255, 255, 0);
    }
    .sg-index-job-item.sg-hover img {
        transform: scale(1.3);
    }
    .sg-skills-item.sg-hover img {
        transform: scale(1.3);
    }
    .sg-skills-title-container, .sg-index-title-container {
        margin: 30px auto;
        height: 80px;
        position: relative;
        transition: all 1s;
    }
    .sg-index-title-container.sg-hover .sg-index-job-title {
        color: #20c997;
    }
    .sg-skills-title-container.sg-hover .sg-skills-title {
        color: #20c997;
    }
    .sg-index-title-container.sg-hover .sg-job-divider {
        width: 200px;
    }
    .sg-skills-title-container.sg-hover .sg-skills-divider {
        width: 200px;
    }
    .sg-skills-title, .sg-index-job-title {
        position: absolute;
        font-size: 3em;
        z-index: 1000;
        color: white;
    }
    .sg-gradient-line {
        background: -webkit-linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* Safari 5.1 - 6.0 */
        background: -o-linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* Opera 11.1 - 12.0 */
        background: -moz-linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* Firefox 3.6 - 15 */
        background: linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* 标准的语法 */
    }
    .sg-skills-divider, .sg-job-divider {
        position: absolute;
        width: 100%;
        height: 5px;
        transition: all 0.5s;
        bottom: 0;
    }
    .sg-box-animation {
        position: relative;
    }
    .sg-line-box-item-up {
        position: absolute;
        z-index: 2000;
        transition: all 0.5s;
        background-color: #20c997;
    }
    .sg-line-box-item-down {
        position: absolute;
        background-color: white;
        z-index: 1000;
    }
    .sg-line-box-top {
        top: 0;
        height: 5px;
        width: 100%;
    }
    .sg-line-box-bottom {
        bottom: 0;
        height: 5px;
        width: 100%;
    }
    .sg-line-box-item-up.sg-line-box-top,
    .sg-line-box-item-up.sg-line-box-bottom {
        width: 0;
    }
    .sg-hover .sg-line-box-item-up.sg-line-box-top,
    .sg-hover .sg-line-box-item-up.sg-line-box-bottom {
        width: 100%;
    }
    .sg-line-box-left {
        left: 0;
        height: 100%;
        width: 5px;
    }
    .sg-line-box-right {
        right: 0;
        height: 100%;
        width: 5px;
    }
    .sg-line-box-item-up.sg-line-box-left,
    .sg-line-box-item-up.sg-line-box-right {
        height: 0;
    }
    .sg-hover .sg-line-box-item-up.sg-line-box-left,
    .sg-hover .sg-line-box-item-up.sg-line-box-right {
        height: 100%;
    }
</style>
@endsection

@section('content')
    <div class="sg-container">
        @include('share.nav_header')
        <div id="index-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#index-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#index-carousel" data-slide-to="1"></li>
                <li data-target="#index-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/img/carousel/carousel-1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>If the God exits, why does he always keep silent?</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/carousel-2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>To be, or not to be, that is the question</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/carousel-3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>时无英雄，遂使竖子成名！</h1>
                    </div>
                </div>
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
        <div class="sg-index-content container">
            <div class="sg-index-job-content justify-content-center">
                <div class="row sg-index-title-container justify-content-center sg-hover-item">
                    <div class="sg-index-job-title text-center">开发方向</div>
                    <div class="sg-job-divider sg-gradient-line"></div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="sg-index-job-item sg-hover-item sg-box-animation">
                        <div class="sg-index-job-mask">网站设计</div>
                        <img src="/img/index/job-1.png">
                    </div>
                    <div class="sg-index-job-item sg-hover-item sg-box-animation">
                        <div class="sg-index-job-mask">微信开发</div>
                        <img src="/img/index/job-2.png">
                    </div>
                    <div class="sg-index-job-item sg-hover-item sg-box-animation">
                        <div class="sg-index-job-mask">后台管理</div>
                        <img src="/img/index/job-3.png">
                    </div>
                    <div class="sg-index-job-item sg-hover-item sg-box-animation">
                        <div class="sg-index-job-mask">硬件交互</div>
                        <img src="/img/index/job-4.png">
                    </div>
                </div>
            </div>
            <div class="sg-skills-container justify-content-center">
                <div class="row sg-skills-title-container justify-content-center sg-hover-item">
                    <div class="sg-skills-title text-center">技能语言</div>
                    <div class="sg-skills-divider sg-gradient-line"></div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">PHP</div>
                        <img src="/img/skills/skill-1.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">Laravel</div>
                        <img src="/img/skills/skill-2.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">python</div>
                        <img src="/img/skills/skill-3.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">jQuery</div>
                        <img src="/img/skills/skill-4.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">Bootstrap</div>
                        <img src="/img/skills/skill-5.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">Semantic UI</div>
                        <img src="/img/skills/skill-6.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">HTML</div>
                        <img src="/img/skills/skill-7.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">CSS</div>
                        <img src="/img/skills/skill-8.png">
                    </div>
                    <div class="sg-skills-item sg-hover-item sg-box-animation">
                        <div class="sg-skills-mask">Javascript</div>
                        <img src="/img/skills/skill-9.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        $('#index-carousel').carousel();
        $('#index-carousel').on('slide.bs.carousel', function () {

        }).on('slid.bs.carousel', function () {

        });

        $('.sg-hover-item').hover(function () {
            $(this).addClass('sg-hover');
        }, function () {
            $(this).removeClass('sg-hover');
        });
        $('.sg-hover-reverse-item').hover(function () {
            $(this).removeClass('sg-hover');
        }, function () {
            $(this).addClass('sg-hover');
        });

        var html = '<div class="sg-line-box-item-up sg-line-box-top"></div>\n' +
            '<div class="sg-line-box-item-up sg-line-box-bottom"></div>\n' +
            '<div class="sg-line-box-item-up sg-line-box-left"></div>\n' +
            '<div class="sg-line-box-item-up sg-line-box-right"></div>\n' +
            '<div class="sg-line-box-item-down sg-line-box-top"></div>\n' +
            '<div class="sg-line-box-item-down sg-line-box-bottom"></div>\n' +
            '<div class="sg-line-box-item-down sg-line-box-left"></div>\n' +
            '<div class="sg-line-box-item-down sg-line-box-right"></div>';
        $('.sg-box-animation').append(html);
    });
</script>
@endsection