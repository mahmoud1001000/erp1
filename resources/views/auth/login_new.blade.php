@extends('layouts.auth2')
@section('title', __('lang_v1.login'))
@section('content')
<div class="social__media">
    <a href="#" class="social__icon facebook-icon">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="#" class="social__icon instagram-icon">
        <i class="fab fa-instagram"></i>
    </a>
    <a href="#" class="social__icon messenger-icon">
        <i class="fab fa-facebook-messenger"></i>
    </a>
    <a href="#" class="social__icon whatsapp-icon">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="#" class="social__icon twitter-icon">
        <i class="fab fa-twitter"></i>
    </a>
</div>
<main class="login__page">
    <div class="login__page-content card__design">
        <div class="login__page-header">
            <h3 class="mid_head">تسجيل الدخول</h3>
            <span class="change__lang">
              EN
            </span>
        </div>

        <form method="POST" action="{{ route('login') }}" id="login-form">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }} form__item" >
                @php
                    $username = old('username');
                    $password = null;
                    if(config('app.env') == 'demo'){
                        $username = 'admin';
                        $password = '123456';

                        $demo_types = array(
                            'all_in_one' => 'admin',
                            'super_market' => 'admin',
                            'pharmacy' => 'admin-pharmacy',
                            'electronics' => 'admin-electronics',
                            'services' => 'admin-services',
                            'restaurant' => 'admin-restaurant',
                            'superadmin' => 'superadmin',
                            'woocommerce' => 'woocommerce_user',
                            'essentials' => 'admin-essentials',
                            'manufacturing' => 'manufacturer-demo',
                        );

                        if( !empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types) ){
                            $username = $demo_types[$_GET['demo_type']];
                        }
                    }
                @endphp
                <label for="username">@lang('lang_v1.username')</label>
                <input id="username" type="text" class="form-control" name="username" value="{{ $username }}"  autofocus >
                <small class="text-err"></small>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <small class="text-err">{{ $errors->first('username') }}</small>
                     </span>
                @endif
            </div>

            {{--Password--}}
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }} form__item">
                <label for="password">@lang('lang_v1.password')</label>
                <input id="password" type="password" class="form-control" name="password"
                       value="{{ $password }}"  >
                <small class="text-err"></small>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <div class="operations">
                <label for="remember-me" class="remember-me">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('lang_v1.remember_me')
                </label>
                <div class="form-group" style="padding-bottom: 9px;">
                    @if(config('app.env') != 'demo')
                        <a href="{{ route('password.request') }}" class="forget-password" >
                            @lang('lang_v1.forgot_your_password')
                        </a>
                    @endif
                </div>
            </div>

            <button type="submit" class="login__btn button__main" >@lang('lang_v1.login')</button>
            <button type="button" class="login__btn button__main" id="test" >@lang('lang_v1.test_app')</button>


            <a href="{{route('business.getRegister') }}@if(!empty(request()->lang)){{'?lang=' . request()->lang}} @endif" class="not__have__account" >ليس لديك حساب؟</a>
            </form>
    </div>
</main>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#change_lang').change( function(){
                window.location = "{{ route('login') }}?lang=" + $(this).val();
            });

            $('#test').click( function (e) {
                e.preventDefault();
                $('#username').val('azhaerp');
                $('#password').val("123456");
                $('form#login-form').submit();
            });
        })
    </script>
@endsection


