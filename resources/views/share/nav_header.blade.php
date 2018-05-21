<style type="text/css">
    .sg-header {
        background-color: rgba(0, 0, 0, 0.6);
    }
    .sg-header-top-line {
        height: 5px;
        background-color: red;
        width: 100%;
        z-index: 6000;
    }
    .nav-link:hover {
        color: white;
        border-bottom: 3px solid white;
    }
    .sg-gradient-line {
        background: -webkit-linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* Safari 5.1 - 6.0 */
        background: -o-linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* Opera 11.1 - 12.0 */
        background: -moz-linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* Firefox 3.6 - 15 */
        background: linear-gradient(left, #6610f2, #e83e8c, #dc3545, #fd7e14, #20c997); /* 标准的语法 */
    }
</style>

<div class="sg-header">
    <div class="sg-header-top-line sg-gradient-line"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="sg-header-icon">
                    <a href="/">
                        <img src="/img/icon/icon3.png" class="rounded mx-auto d-block">
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
                <ul class="nav justify-content-center">
                    <li class="nav-item {{ url('/') == url()->current() ? 'nav-selected' : '' }}">
                        <a class="nav-link sg-blue" href="/">首页</a>
                    </li>
                    <li class="nav-item {{ starts_with(url()->current(), url('/web/movies')) ? 'nav-selected' : '' }}">
                        <a class="nav-link sg-indigo" href="/web/movies/index">电影</a>
                    </li>
                    <li class="nav-item {{ starts_with(url()->current(), url('/web/photos')) ? 'nav-selected' : '' }}">
                        <a class="nav-link sg-pink" href="/web/photos/index">相册</a>
                    </li>
                    {{--<li class="nav-item" {{ starts_with(url()->current(), url('/web/music')) ? 'nav-selected' : '' }}>--}}
                        {{--<a class="nav-link sg-red" href="/web/music/index">音乐</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item" {{ starts_with(url()->current(), url('/web/articles')) ? 'nav-selected' : '' }}>--}}
                        {{--<a class="nav-link sg-orange" href="/web/articles/index">文章</a>--}}
                    {{--</li>--}}
                    <li class="nav-item" {{ starts_with(url()->current(), url('/web/projects')) ? 'nav-selected' : '' }}>
                        <a class="nav-link sg-red" href="/web/projects/index">项目</a>
                    </li>
                    <li class="nav-item" {{ starts_with(url()->current(), url('/web/index/contact')) ? 'nav-selected' : '' }}>
                        <a class="nav-link sg-teal" href="/web/index/contact">联系</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>