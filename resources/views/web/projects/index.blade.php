@extends('web.layout')

@section('header')
<style type="text/css">
    .sg-center-container {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
    .sg-center-box {
        width: 70%;
        height: 70%;
        padding: 30px;
        text-align: center;
        border: 5px solid white;
        background-color: rgba(0, 0, 0, 0.3);
        color: white;
    }
    .sg-project-en-title,
    .sg-project-zh-title {
        font-size: 3em;
    }
    .sg-project-divider {
        width: 100%;
        height: 5px;
        margin: 30px 0;
        background-color: white;
    }
    .sg-project-divider.sg-transparent {
        background-color: transparent;
    }
    .sg-project-label-group {
        font-size: 2em;
    }
    .sg-right-nav {
        position: absolute;
        top: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 15%;
        height: 100%;
    }
    .sg-right-nav a {
        text-decoration: none;
    }
    .sg-right-item {
        display: block;
        background-color: white;
        margin: 20px 0;
        padding: 10px;
        border-radius: 5px;
        color: #fd7e14;
    }
</style>
@endsection

@section('content')
    <div class="sg-container">
        @include('share.nav_header')

        <div id="sg-full-page">
            <div class="section">
                <div class="sg-center-container">
                    <div class="sg-center-box">
                        <div class="sg-project-en-title">OFS(Order Food System)</div>
                        <div class="sg-project-zh-title">点餐系统</div>
                        <div class="sg-project-divider"></div>
                        <div class="sg-project-label-group">
                            @include('share.project_label', ['title' => ['多表格统计', '多角色管理', '多后台登录', '新增、修改、删除多种操作', '炫酷界面', '优雅交互']])
                        </div>
                        <div class="sg-project-divider sg-transparent"></div>
                        <div class="sg-project-btn-group">
                            <button type="button" class="btn btn-primary">用户名：admin；密码：admin</button>
                            <a href="http://ofs.silentshow.cn/admin" target="_blank" class="btn btn-danger">去后台看看</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="sg-center-container">
                    <div class="sg-center-box">
                        <div class="sg-project-en-title">XCX</div>
                        <div class="sg-project-zh-title">微信小程序后台管理</div>
                        <div class="sg-project-divider"></div>
                        <div class="sg-project-label-group">
                            @include('share.project_label', ['title' => ['小程序模板', '快速开始', '抢占市场', '多种模板', '案例丰富', '后台灵活控制']])
                        </div>
                        <div class="sg-project-divider sg-transparent"></div>
                        <div class="sg-project-btn-group">
                            <a href="https://u3.9026.com" target="_blank" class="btn btn-danger">去后台看看</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="sg-center-container">
                    <div class="sg-center-box">
                        <div class="sg-project-en-title">ISMS(Internet Secure Management System)</div>
                        <div class="sg-project-zh-title">网络安全管理系统</div>
                        <div class="sg-project-divider"></div>
                        <div class="sg-project-label-group">
                            @include('share.project_label', ['title' => ['网络端口监测', '信息分类收集', '定期上报', '异常监测', 'HTTP分析', '图片抓取']])
                        </div>
                        <div class="sg-project-divider sg-transparent"></div>
                        <div class="sg-project-btn-group">
                            <button type="button" class="btn btn-primary">用户名：admin；密码：admin</button>
                            <a href="http://isms.silentshow.cn" target="_blank" class="btn btn-danger">去后台看看</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="sg-center-container">
                    <div class="sg-center-box">
                        <div class="sg-project-en-title">VMBM(Vendor Machine Background Management)</div>
                        <div class="sg-project-zh-title">自动售货机后台管理</div>
                        <div class="sg-project-divider"></div>
                        <div class="sg-project-label-group">
                            @include('share.project_label', ['title' => ['微信公众号', '微信支付', '用户统计', '纸巾购买/领取', '分时段统计']])
                        </div>
                        <div class="sg-project-divider sg-transparent"></div>
                        <div class="sg-project-btn-group">
                            <button type="button" class="btn btn-primary">用户名：admin；密码：admin</button>
                            <a href="http://vmbm.silentshow.cn/admin" target="_blank" class="btn btn-danger">去后台看看</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sg-right-nav">
            <a class="sg-right-item" href="#sg-ofs">OFS</a>
            <a class="sg-right-item" href="#sg-xcx">XCX</a>
            <a class="sg-right-item" href="#sg-isms">ISMS</a>
            <a class="sg-right-item" href="#sg-vmbm">VMBM</a>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        $('#sg-full-page').fullpage({
            anchors: ['sg-ofs', 'sg-xcx', 'sg-isms', 'sg-vmbm'],
            sectionsColor: ['#007bff', '#6610f2', '#e83e8c', '#dc3545'],
            css3: true,
            navigation: true,
            navigationPosition: 'left',
            continuousVertical: true
        });
        // $(window).scroll(function () {
        //     if(window.scrollY > 20) {
        //         $('.sg-projects-header').addClass('sg-projects-header-animate');
        //     }
        // });
    });
</script>
@endsection