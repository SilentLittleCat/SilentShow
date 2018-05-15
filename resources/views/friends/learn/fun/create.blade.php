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
            <h3 class="box-title">创建趣闻</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="/friends/learn/fun/store" method="POST">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">标题</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[title]" value="{{ isset(old('data')['title']) ? old('data')['title'] : '' }}" placeholder="" required>
                        @if($errors->has('title'))
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('desp') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">描述</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[desp]" value="{{ isset(old('data')['desp']) ? old('data')['desp'] : '' }}" placeholder="" required>
                        @if($errors->has('desp'))
                            <span class="help-block">{{ $errors->first('desp') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">图片</label>
                    <div class="col-sm-6">
                        @include('components.upload-images', ['name' => 'image', 'value' => (isset(old('data')['image']) ? old('data')['image'] : ''), 'type' =>'single', 'class' => 'learn-fun'])
                    </div>
                </div>

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">内容</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="data[content]" cols="10">{{ isset(old('data')['content']) ? old('data')['content'] : '' }}</textarea>
                        @if($errors->has('content'))
                            <span class="help-block">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6 col-sm-offset-4">
                    <button class="btn btn-success" type="submit">提交</button>
                </div>
            </form>
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