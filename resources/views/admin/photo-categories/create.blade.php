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
            <h3 class="box-title">创建{{ $model_name }}</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="{{ $pre_uri }}store" method="POST">
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
                    <label class="col-sm-2 col-sm-offset-2 control-label">封面(600*400)</label>
                    <div class="col-sm-6">
                        @include('components.upload-images', ['name' => 'cover', 'value' => (isset(old('data')['cover']) ? old('data')['cover'] : ''), 'type' =>'single', 'class' => 'photo-categories'])
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