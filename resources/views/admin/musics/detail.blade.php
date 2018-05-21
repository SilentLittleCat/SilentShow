@extends('admin.layout-content')

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('content')
    <section class="content">
        @include('components.error-info')
        <div class="box container">
            <div class="box-header">
                <h3 class="box-title">{{ $model_name }}详情</h3>
            </div>
            <div class="box-body">
                <div class="sg-detail-card">

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">名称</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->name }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">歌手</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->singer }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">作词</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->lyricist }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">作曲</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->composer }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">背景(600*400)</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            @if($item->cover)
                                <img src="{{ $item->cover }}" width="100px">
                            @else
                                无
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script type="text/javascript">
        $(function () {

        });
    </script>
@endsection