<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>@yield('title','AZHA Store')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    @yield('css')

</head>
<body>
<div class="super_container">
    <!-- Header -->
    <header class="header trans_300">
        <!-- Top Navigation -->
        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_nav_left">الشحن مجاني للطلب أكثر من 2000 جنيها</div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">

                                <!-- Currency / Language / My Account -->

                                <!--<li class="currency">
                                    <a href="#">
                                        usd
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="currency_selection">
                                        <li><a href="#">cad</a></li>
                                        <li><a href="#">aud</a></li>
                                        <li><a href="#">eur</a></li>
                                        <li><a href="#">gbp</a></li>
                                    </ul>
                                </li>

                                <li class="language">
                                    <a href="#">
                                        English
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="language_selection">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Italian</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </li>-->


                                <li class="account">
                                    <a href="#">
                                        حسابي
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="#">تسجيل دخول </a></li>
                                        <li><a href="#">حساب جديد</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="#">AZHA<span>STORE</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="#">الصفحة الرئيسية</a></li>
                                <li><a href="#">المتجر</a></li>
                                <li><a href="#">العروض</a></li>
                                <li><a href="#">طلباتي</a></li>
                                <li><a href="contact.html">تواصل معنا</a></li>
                            </ul>
                            <ul class="navbar_user2">
                                <li><a href="#" class="user-a"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="user-a"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                <li class="checkout">
                                    <a href="#" class="user-a">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="checkout_items" class="checkout_items">2</span>
                                    </a>
                                    <!-- Start Shopping Cart -->
                                    <div class="block-minicart minicart__active">
                                        <div class="minicart-content-wrapper">
                                            <div class="item01 " style="border-bottom: 1px solid #E6DADAED;">
                                                <div class="product-name">تي شرت رجالي </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="thumb">
                                                            <a href="product-details.html"><img src="images/product_2.png" alt="product images" ></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="product-price">السعر : 300 جنيها</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="qunantity">الكمية : 2</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="" class="delete-product"  >
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item01 " style="border-bottom: 1px solid #E6DADAED;">
                                                <div class="product-name">تي شرت رجالي </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="thumb">
                                                            <a href="product-details.html"><img src="images/product_1.png" alt="product images" ></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="product-price">السعر : 300 جنيها</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="qunantity">الكمية : 2</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="" class="delete-product"  >
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item01 " style="border-bottom: 1px solid #E6DADAED;">
                                                <div class="product-name">تي شرت رجالي </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="thumb">
                                                            <a href="product-details.html">
                                                                <img src="images/product_3.png" alt="product images" >
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="product-price">السعر : 300 جنيها</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="qunantity">الكمية : 2</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="" class="delete-product"  >
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item01 " style="border-bottom: 1px solid #E6DADAED;">
                                                <div class="product-name">تي شرت رجالي </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="thumb">
                                                            <a href="product-details.html"><img src="images/product_1.png" alt="product images" ></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="product-price">السعر : 300 جنيها</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="qunantity">الكمية : 2</div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="" class="delete-product"  >
                                                            <i class="fa fa-times-circle"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End of cart item-->

                                        <!-- Cart footer -->
                                        <div class="mini_action cart">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <a class="checkout__btn" href="cart.html" style="width: 100%">عرض السلة</a>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <a class="checkout__btn" href="checkout.html" style="width: 100%">إتمام الطلب</a>
                                                </div>
                                            </div>


                                        </div>
                                        <!--End of cart footer-->
                                    </div>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#">
                        حسابي
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="#">تسجيل دخول</a></li>
                        <li><a href="#">حساب جديد</a></li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#">الرئيسية</a></li>
                <li class="menu_item"><a href="#">المتجر</a></li>
                <li class="menu_item"><a href="#">العروض</a></li>
                <li class="menu_item"><a href="#">طلباتي</a></li>
                <li class="menu_item"><a href="#">تواصل معنا</a></li>
            </ul>
        </div>
    </div>



    @yield('content')

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                    <ul class="footer_nav">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
