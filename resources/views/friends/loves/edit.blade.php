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
            <h3 class="box-title">编辑{{ $modal_name }}</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="{{ $pre_uri }}update" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">用户</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="data[fuId]">
                            @foreach($users as $user)
                                <option value="{{ $user->fuId }}" {{ $user->fuId == $item->fuId ? 'selected' : '' }}>{{ $user->nickName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">内容</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="data[content]" rows="10">{{ $item->content }}</textarea>
                        @if($errors->has('content'))
                            <span class="help-block">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('loveNumber') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">点赞数</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="data[loveNumber]" value="{{ $item->loveNumber }}">
                        @if($errors->has('loveNumber'))
                            <span class="help-block">{{ $errors->first('loveNumber') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('hateNumber') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-sm-offset-2 control-label">反对数</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="data[hateNumber]" value="{{ $item->hateNumber }}">
                        @if($errors->has('hateNumber'))
                            <span class="help-block">{{ $errors->first('hateNumber') }}</span>
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