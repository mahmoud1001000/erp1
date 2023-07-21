

<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') </title>
        
        @include('product_gallery.layouts.partials.css')

        @yield('css')
    </head>
    <body >
    <div class="wrapper thetop">
              @yield('content')




                <div class='scrolltop no-print'>
                    <div class='scroll icon'><i class="fas fa-angle-up"></i></div>
                </div>


            </div>






        @include('product_gallery.layouts.partials.javascripts')

    </body>

</html>