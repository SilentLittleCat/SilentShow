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
                <h3 class="box-title">{{ $modal_name }}详情</h3>
            </div>
            <div class="box-body">
                <div class="sg-detail-card">

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">标题</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->title }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">描述</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->desp }}
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">图片</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            @if($item->image)
                                <img src="{{ $item->image }}" width="100px">
                            @else
                                无
                            @endif
                        </div>
                    </div>

                    <div class="sg-detail-card-item row">
                        <div class="col-sm-2 col-sm-offset-2 sg-detail-card-label">内容</div>
                        <div class="col-sm-6 sg-detail-card-content">
                            {{ $item->content }}
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