<style type="text/css">
    .sg-bottom-kit {
        position: fixed;
        bottom: 100px;
        right: 80px;
        color: white;
        z-index: 6000;
        font-size: 2em;
    }
    .sg-bottom-kit-icon {
        border-radius: 50%;
        margin-bottom: 20px;
        width: 45px;
        height: 45px;
        background-color: red;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .sg-bottom-kit-item {
        position: relative;
    }
    .sg-bottom-kit-item:hover {
        top: 5px;
    }
</style>

<div class="sg-bottom-kit">
    <div class="sg-bottom-kit-list">
        <div class="sg-bottom-kit-item">
            <div class="sg-bottom-kit-icon sg-scroll-top"><i class="fa fa-arrow-up"></i></div>
        </div>
        <div class="sg-bottom-kit-item">
            <div class="sg-bottom-kit-icon sg-go-home"><i class="fa fa-home"></i></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('.sg-bottom-kit').on('click', '.sg-scroll-top', function () {
            $(window).scrollTop(0);
        }).on('click', '.sg-go-home', function () {
            window.location = '/';
        });
    });
</script>