@extends('layouts.home')
@section('title', config('app.name', 'AZHA Soft POS'))

@section('content')
    <style type="text/css">
        .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top: 10%;
            }
        .title {
                font-size: 84px;
            }
        .tagline {
                font-size:25px;
                font-weight: 300;
                text-align: center;
            }

        @media only screen and (max-width: 600px) {
            .title{
                font-size: 38px;
            }
            .tagline {
                font-size:18px;
            }
        }
        .homepage{
            background-color: #ffffff;
        }
        .title{
            background-color: #0a568c;
            color: white;
        }
        .login-btn{
            font-size: 21px;
            padding: 13px 17px 13px 17px;

            border-radius: 10px;
            color: #FFF;
            background-color: #484747;
            transition: ease-in-out 0.5s;
        }

        .login-btn:hover{
            color: #ffffff !important;
            background-color: #a01121;
            padding-right: 20px;
        }

    </style>
   <div class="homepage">
       <div class="title flex-center" style="font-weight: 600 !important;">
           {{ config('app.name', 'AZHA Soft') }}
       </div>
       <div class="" style="text-align: center;
                                margin-top: 30px;
                                margin-bottom: 45px;
                                font-size: 28px;
                                font-weight: 600;">
            <p>AZH Soft مرحبا بك مع برنامج حسابات </p>
       </div>
       <div style="text-align: center;padding-bottom: 20px;">
           @if (Route::has('login'))
               @if(!Auth::check())
                  <a href="{{ route('login') }}" class="btn btn-primary " style="font-size: 20px;margin: 20px;">@lang('lang_v1.login')</a>
                   @if(config('constants.allow_registration'))
                      <a href="{{ route('business.getRegister') }}" class="btn btn-danger" style="font-size: 20px;margin: 20px;">@lang('lang_v1.register')</a>
                   @endif
                   @else

                   <a href="{{ route('home') }}" class="login-btn">الدخول إلي الموقع</a>
               @endif
           @endif
       </div>
   </div>

   {{-- <p class="tagline">
        {{ env('APP_TITLE', 'Test') }}
    </p>--}}
@endsection
            