<!DOCTYPE html>
<html lang="ar"  dir='rtl'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.70">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>AZHA ERP</title>


    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/theme.css'), false); ?>">

    <link rel="icon" href="/uploads/style/azha.ico">

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
</head>
<!-- onload="myFun2()" -->
<body >
<!--pass=  RCVm5uB8A6X1bh&$@DJG  -->
<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
    <!--  bg-primary
    navbar navbar-dark  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">

        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarContent">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="btn btn-primary ml-lg-2" href="/pricing">الاسعار  </a>
                    </li>

                    <li class="nav-item active">

                        <a class="nav-link" href="<?php echo e(action('HomeStyleController@index'), false); ?>">الرئيسية </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">عن الشركة </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">الخدمات </a>
                    </li>
                   

                </ul>
            </div>
            <a href="http://erp.azhasoft.com" class="navbar-brand ">AZHA<span class="text-primary">.ERP <img style="width:32px; "  src="/uploads/style/azha.ico"></img></span></a>
        </div>
    </nav>

    <div class="container">
        <div class="page-banner home-banner">
            <div class="row align-items-center flex-wrap-reverse h-100">
                <div class="col-md-6 py-5 wow fadeInLeft">
                    <h1 class="text-xl mb-4 text-primary" id="strt">الشركات الصغيرة تحتاج انطلاقة كبيرة </h1>
                    <p class="text-lg  mb-5 text-success"><span style="color: #AE0E0E;font-weight: bold">(AZHA ERP) </span>حقق أعلى المبيعات بإستخدام نظام بسيط</p>
                    <!-- <p class="text-lg text-grey mb-5">برمجيات متكاملة تلبي طموحك</p> -->
                    <a href="/login" class="btn btn-primary btn-split btn-outline-warning">تسجيل الدخول <div class="fab"><span class="mai-play"></span></div></a>
                </div>
                <div class="col-md-6 py-5 wow zoomIn">
                    <div class="img-fluid text-center">
                         <img src="/uploads/style/key-benefits-of-erp1.png" >
                    </div>
                </div>
            </div>
            <a href="http://erp.azhasoft.com" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
        </div>
    </div>
</header>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-service wow fadeInUp">
                    <div class="header">
                        <img  class="image-rotate"   src="/uploads/style/service-11.svg" alt="">
                    </div>
                    <div class="body">
                        <h5 class="text-secondary">للتواصل مع الزبائن </h5>
                        <p id='topic3'>من خلال مقارنة سهلة لنظام إدارة العملاء يؤمن نظام AZHA-ERP الميزة على إنشاء لوائح زبائن خاصة وتعقب المشتريات و الفواتير وتصنيفهم على مراتب تبعاً لنظام الولاء الخاص بالشركة مما ينشئ روابط قوية بين الزبون ومنشأة العمل من خلال العروض الخاصة والحسومات. يمكّن AZHA-ERP الشركة من متابعة زبائنها الدائمين لمعرفة من منهم يستحق صفة VIP. </p>
                        <a href="service.html" class="btn btn-pr">استكشف الفرق</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-service wow fadeInUp">
                    <div class="header">
                        <img class="image-rotate" src="/uploads/style/service-12.svg" alt="">
                    </div>
                    <div class="body">
                        <h5 class="text-secondary">نقطة بيع افتراضية</h5>
                        <p id='topic2'>سهل وبسيط
                            AZHA-ERP هو نظام نقطة بيع يراعي سهولة الاستخدام والتنصيب. يتيح لأي شخص يعرف مهارات الحاسوب الأساسية أن يستعمله بأقصى فعالية دون الحاجة إلى تدريب احترافي معقّد. نظام سريع، يستجيب لحاجاتك، يضمن إدارة أعمالك بسلاسة.</p>
                        <a href="service.html" class="btn btn-pr">استكشف الفرق</a>
                    </div>
                </div>
            </div>
            <!-- text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap; -->
            <div class="col-lg-4">
                <div class="card-service wow fadeInUp">
                    <div class="header">
                        <img class="image-rotate" src="/uploads/style/service-13.svg" alt="">
                    </div>
                    <div class="body">
                        <h5 class="text-secondary">إدارة المستودعات
                        </h5>
                        <p>دارة الفروع المتعددة
                            يقدم AZHA-ERP نظام إدارة مركزي موحد سواء كان مقر العمل يمتلك فرعاً واحداً أو فروعاً متعددة حيث يقوم بالوصل بين جميع المقرات. سواء تم المبيع في الفرع الرئيسي أو في مقر فرعي فإن نظام AZHA-ERP يقوم بوصل الجميع إلى قاعدة بيانات مركزية تقوم بتسجيل جميع التغيرات على خادمك<i class="bi bi-server"></i> الخاص.</p>
                        <a href="service.html" class="btn btn-pr">استكشف الفرق</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 py-3 wow fadeInUp">
                <span class="subhead">عن الشركة </span>
                <h2 class="title-section">إمكانية حفظ المعلومات على خادمك<img  src="/uploads/style/server.svg"> الخاص </h2>
                <div class="divider"></div>

                <p>أمن البيانات
                    يستعمل AZHA-ERP نظام حماية متعدد مكون من عدة طبقات من الجدران النارية، مستويات التشفير، مستويات إدارة التهديد الموحدة بالإضافة لطرق أخرى تضمن أمن البيانات ضد الخرق بحيث يمكن فقط للأشخاص ذوي الصلاحيات المعينة الوصول إليها. كما تقوم السحابة بحفظ البيانات الأصلية وتأمين نسخة إحتياطية عنها وتحديثها لحظة حصول أي تغيير. مهما حصل تبقى البيانات آمنة مع AZHA-ERP. كل هذا يتم على خادم<img  src="/uploads/style/server.svg"> خاص بك بإمكانك إدارته ومتابعة صحة بياناتك عليه.</p>
                <div class="divider"></div>
                <p>القدرة على الوصول للنظام في أي وقت ومكان
                    يمكن الوصول لنظام AZHA-ERP وتسجيل الدخول لحساب المستخدم من أي مكان في العالم في أي وقت عبر الانترنت طالما يملك المستخدم الصلاحيات لذلك. تم إعداد خادم<img  src="/uploads/style/server.svg"> AZHA-ERP بحيث يعمل كخدمة متوافرة دائما 24 ساعة في اليوم 7 أيام في الأسبوع مما يضمن أن كل التغيرات تُسَّجَّل لحظةُ حصولها.</p>
                <a href="#about" class="btn btn-primary mt-3">تعرف علي المزيد</a>
            </div>
            <div class="col-lg-6 py-3 wow fadeInRight">
                <div class="img-fluid py-3 text-center">
                    <img style="border-radius: 8px;"  src="/uploads/style/imag_2.jpg" alt="">
                </div>
            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .page-section -->
<!-- *********Uses********* -->
<div class="page-section bg-light" id="service">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="subhead">خدما الشركة </div>
            <h2 class="title-section">كيف يستطيع AZHA ERP من مساعدتك في العمل </h2>
            <div class="divider mx-auto"></div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/pickup.png"></a></span>
                    </div>
                    <h5>الشركات التجارية  </h5>
                    <p>ورش التصنيع </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/supermarket.svg"></a></span>
                    </div>
                    <h5>السوبر ماركت </h5>
                    <p>الحصول علي النتائج المرغوبة </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/clothing.svg"></a></span>
                    </div>
                    <h5>متجر الملابس </h5>
                    <p>تصنيف لكل الفئات  وتميزها </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/electronics.svg"></a></span>
                    </div>
                    <h5> متجر الاكترونيات </h5>
                    <p>البحث عن المنتج بسهولة </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3 ">
                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/Present.svg"></a></span>
                    </div>
                    <h5>متاجر الهدايه </h5>
                    <p>عرض الجداول بطريقة مميزه </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">
                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/Services.svg"></a></span>
                    </div>
                    <h5>المكاتب الخدمية </h5>
                    <p>معرفة جميع الارصده </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">

                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/health.svg"></a></span>
                    </div>
                    <h5>دور الرعاية الصحية  </h5>
                    <p>ارتباط للمعلومات المطلوبة </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
                <div class="features">
                    <div class="header mb-3">

                        <span class="mai-business"><a href="http://erp.azhasoft.com"><img src="/uploads/style/delivery.svg"></a></span>
                    </div>
                    <h5>شركات  التوصيل </h5>
                    <p>تقارير مميزه وواضحة لجميع المعاملات </p>
                </div>
            </div>
        </div>

    </div> <!-- .container -->
</div> <!-- .page-section -->
<!-- *********END Uses************ -->

<div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url('/uploads/style/bg_pattern.svg');">
        <div class="container text-center">
            <div class="row justify-content-center wow fadeInUp">
                <div class="col-lg-8">
                    <a href="http://erp.azhasoft.com"> <h2 class="mb-4">احصل علي البرنامج</h2></a>
                    <!-- <form action="#">
                      <input type="text" class="form-control " placeholder="ادخل معلومه">
                      <button type="submit" class="btn btn-success">Check Now</button>
                    </form> -->
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .wrap -->
</div> <!-- .page-section -->

<!-- *******Pricing Plan************ -->
<div class="page-section" id="Pricing">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="subhead">خطة الاسعار</div>
            <h2 class="title-section">أختر الخطة المناسبة لك </h2>
            <div class="divider mx-auto"></div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 py-3 wow zoomIn">
                <div class="card-pricing">
                    <div class="header">
                        <div class="pricing-type">المجاني </div>
                        <div class="price">
                            <span class="dollar">$</span>
                            <h1>0<span class="suffix">.00</span></h1>
                        </div>
                        <h5>Per Month</h5>
                    </div>
                    <div class="body">
                        <p>2 من الفروع <span class="suffix"> للنشاط </span></p>
                        <p>3 مستخدمين  <span class="suffix">للاجهزة المتاحه </span></p>
                        <p>فواتير <span class="suffix">غير محدوده </span></p>
                        <p>ايام المحاكمة  <span class="suffix">14 يوم</span></p>
                        <p>12/4 <span class="suffix">دعم فني </span></p>
                    </div>
                    <div class="footer">
                        <a href="http://erp.azhasoft.com" class="btn btn-pricing btn-block btn-outline-warning">اختر النظام </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow zoomIn">
                <div class="card-pricing marked">
                    <div class="header">
                        <div class="pricing-type">الاساسي</div>
                        <div class="price">
                            <span class="dollar">$</span>
                            <h1>59<span class="suffix">.99</span></h1>
                        </div>
                        <h5>Per Month</h5>
                    </div>
                    <div class="body">
                        <p>4 من الفروع  <span class="suffix"> للنشاط</span></p>
                        <p>6مستخدمين  <span class="suffix">للاجهزة المتاحة </span></p>
                        <p>فواتير قابلة للتعديل <span class="suffix">غير محدوده  </span></p>
                        <p>ايام المحاكمة <span class="suffix">28 يوم</span></p>
                        <p>24/7 <span class="suffix">دعم فني </span></p>
                    </div>
                    <div class="footer">
                        <a href="http://erp.azhasoft.com" class="btn btn-pricing btn-block btn-outline-warning">أختر النظام </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow zoomIn">
                <div class="card-pricing">
                    <div class="header">
                        <div class="pricing-type">كبار العملاء </div>
                        <div class="price">
                            <span class="dollar">$</span>
                            <h1>99<span class="suffix">.99</span></h1>
                        </div>
                        <h5>Per Month</h5>
                    </div>
                    <div class="body">
                        <p>فروع غير محدوده  <span class="suffix">للنشاط</span></p>
                        <p>غير محدوده<span class="suffix"> المستخدمين </span></p>
                        <p> التعديل والاضافة غير محدوده <span class="suffix">فواتير </span></p>
                        <p>غير محدوده <span class="suffix">ايام المحاكمة </span></p>
                        <p>24/7 <span class="suffix">الدعم الفني بالاضافة للتعديل </span></p>
                    </div>
                    <div class="footer">
                        <a href="http://erp.azhasoft.com" class="btn btn-pricing btn-block btn-outline-warning">اختر النظام </a>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- .container -->
</div> <!-- .page-section -->
<!-- *******End Pricing Plan************ -->

<div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url(./img/bg_pattern.svg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
                    <h2 class="title-section">نظام الولاء <br>  </h2>
                    <div class="divider"></div>
                    <p>
                        من خلال مقاربة سهلة لنظام إدارة العملاء يؤمن نظام AZHA-ERP الميزة على إنشاء لوائح زبائن خاصة وتعقب المشتريات و الفواتير وتصنيفهم على مراتب تبعاً لنظام الولاء الخاص بالشركة مما ينشئ روابط قوية بين الزبون ومنشأة العمل من خلال العروض الخاصة والحسومات. يمكّن AZHA-ERP الشركة من متابعة زبائنها الدائمين لمعرفة من منهم يستحق صفة VIP. هذا النظام يسمح للعملاء بالحصول على نقاط الولاء وبطاقات الهدايا واستعمال القسائم في سبيل الحصول على علاقة عمل طويلة الأمد</p>

                    <ul class="theme-list theme-list-light text-white">
                        <li>
                            <div class="h5">قوائم الرسائل والبريد الإلكتروني</div>
                            <p>يمكن إنشاء قوائم بريد إلكتروني مخصصة عبر نظام إدارة العملاء. يمكن فلترة الزبائن عبر معايير خاصة مثل المشتريات، وتيرة الشراء، نمط الدفع وغيرها كما يمكن إنشاء معايير مخصصة يتم تصنيف الزبائن على أساسها وإرسال العروض الخاصة التي من الممكن أن تهمهم سواء كانت معلومات عن منتج ما أو عروض خاصة أو تنبيهات عبر عملية بسيطة.</p>
                        </li>
                        <li>
                            <div class="h5">تقارير حسابات العملاء</div>
                            <p>يوفر AZHA-ERP تقارير مفصلة بالكامل عن حسابات العملاء والمدفوعات والمشتريات والمرابح وغيرها ، كل ذلك في الوقت الفعلي. ابقَ على اطّلاع على وتيرة العمل ضمن الفروع ووتيرة حسابات الزبائن فيما يتعلق في المدفوعات والمستحقات أو في حال تأخر الدفعات أو الرغبة في إنهاء التعامل مع حساب ما أو ترقيته لرتبة عميل VIP. ارتقِ بعملك للمستوى التالي من خلال الخبرة التي يقدمها نظام إدارة الزبائن.</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 py-3 wow fadeInRight">
                    <div class="img-fluid text-center">
                        <img src="/uploads/style/banner_image_2.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .wrap -->
</div> <!-- .page-section -->

<!-- Blog -->
<div class="page-section">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="subhead">AZHA>>ERP</div>
            <h2 class="title-section">انشطة وافكار</h2>
            <div class="divider mx-auto"></div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="uploads/style/blog-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="http://erp.azhasoft.com">تستطيع ان تنظم مطعمك </a></h5>
                        <div class="post-date">حساباتك في امان <a href="http://erp.azhasoft.com"> 100 عام من الخبره </a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="uploads/style/blog-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="http://erp.azhasoft.com">لجميع المشاريع التجارية </a></h5>
                        <div class="post-date">الدقة  <a href="http://erp.azhasoft.com">دعم متواصل </a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="uploads/style/blog-3.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="http://erp.azhasoft.com">متابعة للمخزون </a></h5>
                        <div class="post-date">دائما في جديد<a href="http://erp.azhasoft.com">فريق من المبدعين </a></div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 text-center wow fadeInUp">
                <a href="/login" class="btn btn-primary">انضم الينا </a>
            </div>
        </div>
    </div>
</div>


<div class="page-section" id="contact-us">
    <div class="container">
        <div class="row text-center align-items-center">
            <div class="col-lg-4 py-3">
                <div class="display-4 text-center text-primary"><span class="mai-pin"></span></div>
                <p class="mb-3 font-weight-medium text-lg">العنوان</p>
                <p class="mb-0 text-secondary">   جمهورية مصر العربية -الإسماعيلية</p>
            </div>
            <div class="col-lg-4 py-3">
                <div class="display-4 text-center text-primary"><span class="mai-call"></span></div>
                <p class="mb-3 font-weight-medium text-lg">الهاتف</p>
                <p class="mb-0"><a href="https://wa.me/message/2EIRSSOO3QSTP1" target="_blank" class="text-secondary">01024649844</a></p>
                <p class="mb-0"><a href="https://wa.me/message/2EIRSSOO3QSTP1" target="_blank" class="text-secondary"><span>00201024649844</span> </a></p>
            </div>
            <div class="col-lg-4 py-3">
                <div class="display-4 text-center text-primary"><span class="mai-mail"></span></div>
                <p class="mb-3 font-weight-medium text-lg">Email Address</p>
                <p class="mb-0"><a href="contact.html#" class="text-secondary">sales@azhasoft.com</a></p>
                <!-- <p class="mb-0"><a href="#" class="text-secondary">hello@seogram.com</a></p> -->
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form action="contact.html#" class="contact-form py-5 px-lg-5">
                    <h2 class="mb-4 font-weight-medium text-secondary">التسجيل والدخول</h2>
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">الاسم الاول</label>
                            <input type="text" id="fname" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">الاسم الاخير</label>
                            <input type="text" id="lname" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">البريد الاكتروني</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">تسجيل</label>
                            <input type="text" id="subject" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">الرساله </label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="اكتب  إستفسارك هنا ..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group mt-4">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 px-0">
                    <div class="maps-container"><div id="google-maps">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                       </div></div>

           </div>
        </div>
    </div>
</div>
<!-- *******Pricing Plan************ -->



<!-- ********الايكونات ********* -->
<footer class="page-footer bg-image" style="background-image: url('<?php echo e(asset('uploads/style/world_pattern3.svg'), false); ?>');">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-3 py-3">
                <h3>AZHA.ERP</h3>
                <p>التواصل مع الشركة والاستفسارات ومتابعة كل جديد لا تترد في الحصول علي المعلومه ابدء معنا الان ...</p>

                <div class="social-media-button">
                    <a href="https://www.facebook.com/azhasoft" target="_blank"><img src="/uploads/style/facebook1.png"></a>
                    <a href="https://wa.me/message/2EIRSSOO3QSTP1" target="_blank"><IMG src="/uploads/style/Whatsapp-Transparent-File.png"></a>
                    <a href="http://erp.azhasoft.com" target="_blank"><IMG src="/uploads/style/instagram.png"></a>
                    <a href="http://erp.azhasoft.com" target="_blank"><IMG src="/uploads/style/youtube.png"></a>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <h5>معلومات عن البرنامج</h5>
                <ul class="footer-menu">
                    <li><a href="http://erp.azhasoft.com">الرئيسية</a></li>
                    <li><a href="http://erp.azhasoft.com">عن الشركة </a></li>
                    <li><a href="http://erp.azhasoft.com">الخدمات</a></li>
                    <li><a href="http://erp.azhasoft.com">الخدمات والشروط</a></li>
                    <li><a href="http://erp.azhasoft.com">الدعم  الفني&&والخدمات</a></li>
                </ul>
            </div>
            <div class="col-lg-3 py-3">
                <h5>إتصل بنا </h5>
                <p></p>
                <a href="http://erp.azhasoft.com" class="footer-link">
                    +201024649844 - +201024649844
                    جمهورية مصر العربية - القاهرة</a>
                <a href="http://erp.azhasoft.com" class="footer-link">sales@azhasoft.com</a>
            </div>
            <div class="col-lg-3 py-3">
                <h5>أخبار الشركة </h5>
                <p>كن علي الاطلاع دائم بكل جديد ضف بريدك الاكتروني هنا </p>
                <form action="http://erp.azhasoft.com">
                    <input type="text" class="form-control" placeholder="Enter your email..">
                    <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
                </form>
            </div>
        </div>
        <!-- https://erp.neqaty.com.sa/ -->
        <p class="text-center" id="copyright">Copyright &copy;2022 جمهورية مصر العربية القاهرة

            <a href="https://azhasoft.com/" target="_blank">AZHA Soft</a></p>
    </div>
</footer>


<script src="<?php echo e(asset('js/jquery-3.5.1.min.js'), false); ?>"></script>

<script src="<?php echo e(asset('js/bootstrap.bundle.min.js'), false); ?>"></script>

<script src="<?php echo e(asset('js/google-maps.js'), false); ?>"></script>

<script src="<?php echo e(asset('js/wow.min.js'), false); ?>"></script>

<script src="<?php echo e(asset('js/theme.js'), false); ?>"></script>

</body>
</html>

<?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/resources/views/home/home.blade.php ENDPATH**/ ?>