@extends('web.layout')

@section('header')
<style type="text/css">
    .sg-container {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        padding: 100px;
    }
</style>
@endsection

@section('content')
    <div class="sg-container sg-background-teal" id="sg-container">
        @include('share.nav_header')

        <img src="/img/icon/project.png" width="300px">
        {{--<button type="button" class="btn btn-danger">QQ:2858097617</button>--}}
        <img src="/img/icon/qr-code.jpg" width="200px">
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        $('#sg-container').css('height', window.innerHeight);
    });
</script>
@endsection