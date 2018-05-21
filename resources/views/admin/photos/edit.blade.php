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
                <h3 class="box-title">编辑{{ $model_name }}</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="{{ $pre_uri }}update" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $item->id }}" name="id">

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

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-sm-2 col-sm-offset-2 control-label">名称</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="data[name]" value="{{ $item->name }}" placeholder="" required>
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                        <label class="col-sm-2 col-sm-offset-2 control-label">图片(600*400)</label>
                        <div class="col-sm-6">
                            @include('components.upload-images', ['name' => 'path', 'value' => (isset($item->path) ? $item->path : ''), 'type' =>'single', 'class' => 'photo-categories'])
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
            $('#sg-multi-select').multiSelect().multiSelect('select', "{{ $categories_string }}".split(','));
        });
    </script>
@endsection