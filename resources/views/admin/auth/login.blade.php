@extends('web.layout')

@section('header')
    <style type="text/css">
        .login-container {
            margin-top: 30px;
        }
    </style>
@endsection

@section('content')

    @include('share.nav_header')

    <div class="container login-container">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <h5 class="card-header text-center">登陆</h5>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="/admin/login">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-sm-6 offset-sm-3">
                                <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="用户名" required autofocus>

                                @if($errors->has('username'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 offset-sm-3">
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="密码" required>

                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 offset-sm-3">
                            <button type="submit" class="btn btn-primary btn-block">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
