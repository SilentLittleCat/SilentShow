@extends('admin.layout')

@section('header')
    <style type="text/css">

    </style>
@endsection

@section('content')
<section class="content">
    @include('components.error-info')
    <div class="box container">
        <div class="box-header">
            <h3 class="box-title">创建电影</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="/admin/movies/store" method="POST">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">名称</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[name]" value="{{ isset(old('data')['name']) ? old('data')['name'] : '' }}" placeholder="" required>
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">封面(600*300)</label>
                    <div class="col-sm-6">
                        @include('components.upload-images', ['name' => 'cover', 'value' => (isset(old('data')['cover']) ? old('data')['cover'] : ''), 'type' =>'single', 'class' => 'movies'])
                    </div>
                </div>

                <div class="form-group {{ $errors->has('director') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">导演</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[director]" value="{{ isset(old('data')['director']) ? old('data')['director'] : '' }}" placeholder="多个导演以英文逗号分开" required>
                        @if($errors->has('director'))
                            <span class="help-block">{{ $errors->first('director') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('actor') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">演员</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[actor]" value="{{ isset(old('data')['actor']) ? old('data')['actor'] : '' }}" placeholder="多个演员以英文逗号分开" required>
                        @if($errors->has('actor'))
                            <span class="help-block">{{ $errors->first('actor') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">上映时间</label>
                    <div class="col-sm-6">
                        <input class="form-control datepicker" type="text" name="data[date]" value="{{ isset(old('data')['date']) ? old('data')['date'] : '' }}" placeholder="" required>
                        @if($errors->has('date'))
                            <span class="help-block">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">国家</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[country]" value="{{ isset(old('data')['country']) ? old('data')['country'] : '' }}" placeholder="">
                        @if($errors->has('country'))
                            <span class="help-block">{{ $errors->first('country') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">评分</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[score]" value="{{ isset(old('data')['score']) ? old('data')['score'] : '' }}" placeholder="">
                        @if($errors->has('score'))
                            <span class="help-block">{{ $errors->first('score') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('recommend') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">推荐</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[recommend]" value="{{ isset(old('data')['recommend']) ? old('data')['recommend'] : '' }}" placeholder="">
                        @if($errors->has('recommend'))
                            <span class="help-block">{{ $errors->first('recommend') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('introduction') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">简介</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="data[introduction]">{{ isset(old('data')['recommend']) ? old('data')['recommend'] : '' }}</textarea>
                        @if($errors->has('introduction'))
                            <span class="help-block">{{ $errors->first('introduction') }}</span>
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