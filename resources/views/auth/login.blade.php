@extends('tabler::layouts.auth')
@section('content')
    @if(config('tabler.support.has_social'))
    <style>
        .login-or {
            position: relative;
            font-size: 16px;
            color: #aaa;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .span-or {
            display: block;
            position: absolute;
            left: 50%;
            top: -2px;
            margin-left: -25px;
            background-color: #fff;
            width: 50px;
            text-align: center;
        }
        .hr-or {
            background-color: #cdcdcd;
            height: 1px;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }
        .btn i {
            margin-right: 5px;
            vertical-align: 0px;
        }
    </style>
    @endif
    {!! Form::open(['url' => url(config('tabler.url.post-login', 'login')), 'method' => 'POST', 'class' => 'card']) !!}
    <div class="card-body p-6">
        <div class="card-title">@lang('tabler::login.title')</div>
        <div class="form-group">
            {!! Form::label('email', trans('tabler::login.email'), ['class' => 'form-label']) !!}
            {!! Form::email('email', old('email'), ['placeholder' => trans('tabler::login.email-placeholder'), 'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''), 'autofocus' => true]) !!}
            @error('email')
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="password">
                @lang('tabler::login.password')
                <a href="{!! url(config('tabler.urls.forgot', 'password/reset')) !!}" class="float-right small">@lang('tabler::login.forgot')</a>
            </label>
            {!! Form::password('password', ['class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => trans('tabler::login.password-placeholder')]) !!}
            @error('password')
                <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="custom-control custom-checkbox">
                {!! Form::checkbox('remember', null, false, ['class' => 'custom-control-input']) !!}
                <span class="custom-control-label">@lang('tabler::login.remeber-me')</span>
            </label>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">@lang('tabler::login.signin')</button>
        </div>
        @if(config('tabler.support.has_social'))
            <div class="login-or">
                <hr class="hr-or">
                <span class="span-or">or</span>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <a href="/redirect/facebook" class="btn btn-lg btn-primary btn-block"><i class="fa fa-facebook"></i> Facebook</a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <a href="/redirect/google" class="btn btn-lg btn-danger btn-block"><i class="fa fa-google"></i> Google</a>
                </div>
            </div>
        @endif
    </div>
    {!! Form::close() !!}
    <div class="text-center text-muted">
        @lang('tabler::login.no-account') <a href="{!! url(config('tabler.url.register', 'register')) !!}">@lang('tabler::login.register')</a>
    </div>
@stop
