@extends('layouts.auth2_old')

@section('title', __('lang_v1.reset_password'))

@section('content')

<div class="login-form " style="max-width: 350px;background-color: white;margin: auto;margin-top: auto;margin-top: 40px;padding: 20px;border-radius: 10px;">
    <div style="text-align: center;
                    color: #FFF;
                    background-color: #31313C;
                   margin: -20px -20px 30px -20px;
                    border-radius: 10px 10px 0px 0px;
                    padding-top: 1px;
                    padding-bottom: 15px;">

        <h3 style="color: #FFFFFF">{{env('APP_TITLE','AZHA-ERP')}}</h3>

    </div>

    <form  method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
         <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="@lang('lang_v1.email_address')">
            <span class="fa fa-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-flat btn-login" style="border-radius: 10px;height: 45px;font-size: 17px;"> @lang('lang_v1.send_password_reset_link')</button>

        </div>

    </form>
</div>
@endsection
