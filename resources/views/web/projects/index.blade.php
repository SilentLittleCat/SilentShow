@extends('web.layout')

@section('header')
<style type="text/css">
    .sg-projects-container {
        height: 100%;
        text-align: center;
        padding-top: 10px;
        color: white
    }
    .sg-projects-header {
        width: 100%;
        height: auto;
        z-index: 5000;
    }
    .sg-project-item {
        border: 10px solid white;
        margin: 50px 0;
        padding: 20px;
        background-color: black;
    }
    .sg-project-en-name {
        font-size: 2em;
        border-bottom: 3px solid white;
    }
    .sg-project-zh-name {
        font-size: 2em;
    }
    .sg-project-images {
        margin: 15px 20px;
    }
    .slick-dots button:before {
        color: white !important;
    }
    .sg-project-tools {
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
    <div class="sg-projects-container sg-background-teal">
        <div class="sg-projects-header sg-background-teal">
            <img src="/img/icon/project.png" width="150px">
        </div>
        <div class="sg-project-tools">
            <button type="button" class="btn btn-primary">QQ：2858097617</button>
            <a href="/guest" class="btn btn-danger">去后台看看</a>
        </div>
        <div class="container">
            <div class="sg-project-item">
                <div class="sg-project-en-name">OFS(Order Food System)</div>
                <div class="sg-project-zh-name">点餐系统</div>
                <div class="sg-project-images">
                    <img src="/img/projects/ofs-a-1.png">
                    <img src="/img/projects/ofs-a-2.png">
                    <img src="/img/projects/ofs-a-3.png">
                    <img src="/img/projects/ofs-a-4.png">
                    <img src="/img/projects/ofs-a-5.png">
                </div>
                <div class="sg-project-introduce">
                    @include('share.project_intro_svg', ['title' => ['多表格统计', '多角色管理', '多后台登录', '新增、修改、删除多种操作', '炫酷界面', '优雅交互']])
                </div>
            </div>
            <div class="sg-project-item">
                <div class="sg-project-en-name">XCX</div>
                <div class="sg-project-zh-name">微信小程序</div>
                <div class="sg-project-images">
                    <img src="/img/projects/xcx-a-1.png">
                    <img src="/img/projects/xcx-a-2.png">
                    <img src="/img/projects/xcx-a-3.png">
                    <img src="/img/projects/xcx-a-4.png">
                </div>
                <div class="sg-project-introduce">
                    @include('share.project_intro_svg', ['title' => ['小程序模板', '快速开始', '抢占市场', '多种模板', '案例丰富', '后台灵活控制']])
                </div>
            </div>
            <div class="sg-project-item">
                <div class="sg-project-en-name">ISMS(Internet Secure Management System)</div>
                <div class="sg-project-zh-name">网络安全管理系统</div>
                <div class="sg-project-images">
                    <img src="/img/projects/isms-a-1.png">
                    <img src="/img/projects/isms-a-2.png">
                    <img src="/img/projects/isms-a-3.png">
                    <img src="/img/projects/isms-a-4.png">
                </div>
                <div class="sg-project-introduce">
                    @include('share.project_intro_svg', ['title' => ['网络端口监测', '信息分类收集', '定期上报', '异常监测', 'HTTP分析', '图片抓取']])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        $('.sg-project-images').slick({
            autoplay: true,
            dots: true,
            infinite: false
        });

        // $(window).scroll(function () {
        //     if(window.scrollY > 20) {
        //         $('.sg-projects-header').addClass('sg-projects-header-animate');
        //     }
        // });
    });
</script>
@endsection