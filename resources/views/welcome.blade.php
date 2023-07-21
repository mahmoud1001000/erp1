<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <!-- Styles -->

</head>

<body>
<div class="title flex-center navbar-static-top">
   Azha ERP
</div>


<div class="row">
    <div class="col-md-4">
        <img src="{{asset('img/erp.jpg')}}">
    </div>
    <div class="col-md-8">
        <div class="title">
           <p>هل أنت في حاجة إلي برنامج إدارة الحاسبات ؟؟ </p>
        </div>
    </div>

</div>
   <div class="homepage">

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

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "110605594542233", // Facebook page ID
            whatsapp: "+201024649844", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#2f93f4", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
</body>
</html>
            