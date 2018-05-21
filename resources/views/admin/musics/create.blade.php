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
            <form class="form-horizontal" action="{{ $pre_uri }}store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">分类</label>
                    <div class="col-sm-6">
                        <select class="form-control" multiple="multiple" name="categories[]" id="sg-multi-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('categories'))
                            <span class="help-block">{{ $errors->first('categories') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">文件</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="file" name="path">
                        @if($errors->has('path'))
                            <span class="help-block">{{ $errors->first('path') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">名称</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[name]" value="{{ isset(old('data')['name']) ? old('data')['name'] : '' }}" placeholder="" required>
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('singer') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">歌手</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[singer]" value="{{ isset(old('data')['singer']) ? old('data')['singer'] : '' }}" placeholder="" required>
                        @if($errors->has('singer'))
                            <span class="help-block">{{ $errors->first('singer') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('lyricist') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">作词</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[lyricist]" value="{{ isset(old('data')['lyricist']) ? old('data')['lyricist'] : '' }}" placeholder="" required>
                        @if($errors->has('lyricist'))
                            <span class="help-block">{{ $errors->first('lyricist') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('composer') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">作曲</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="data[composer]" value="{{ isset(old('data')['composer']) ? old('data')['composer'] : '' }}" placeholder="" required>
                        @if($errors->has('composer'))
                            <span class="help-block">{{ $errors->first('composer') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">封面(600*400)</label>
                    <div class="col-sm-6">
                        @include('components.upload-images', ['name' => 'cover', 'value' => (isset(old('data')['cover']) ? old('data')['cover'] : ''), 'type' =>'single', 'class' => 'musics'])
                    </div>
                </div>

                <div class="form-group {{ $errors->has('song_words') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">歌词</label>
                    <div class="col-sm-6">
                        <textarea rows="10" class="form-control" name="data[song_words]">{{ isset(old('data')['song_words']) ? old('data')['song_words'] : '' }}</textarea>
                        @if($errors->has('song_words'))
                            <span class="help-block">{{ $errors->first('song_words') }}</span>
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
        $('#sg-multi-select').multiSelect();
    });
</script>
@endsection