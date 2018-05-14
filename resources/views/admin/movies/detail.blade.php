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
                <h3 class="box-title">电影详情</h3>
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
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">封面(600*300)</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            @if($item->cover)
                                <img src="{{ $item->cover }}" width="100px">
                            @else
                                无
                            @endif
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">导演</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->director }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">演员</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->actor }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">上映时间</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->date }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">国家</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->country }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">评分</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->score }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">推荐</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->recommend }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">简介</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->introduction }}
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