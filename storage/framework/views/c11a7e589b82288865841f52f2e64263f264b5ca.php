<section class="no-print">
    <nav class="navbar navbar-default bg-white m-4">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                     <li <?php if(request()->segment(2) == 'partners'): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(action('\Modules\Partners\Http\Controllers\PartnersController@index'), false); ?>">
                                <i class="fa fa-user"></i>
                               الشركاء
                            </a>
                        </li>

                        <li <?php if(request()->segment(2) == 'payments'): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(action('\Modules\Partners\Http\Controllers\PaymentsController@index'), false); ?>">
                                <i class="fa fa-map-marker"></i>
                                سجل مدفوعات الشركاء
                            </a>
                        </li>

                            <li <?php if(request()->segment(2) == 'finalaccount'): ?> class="active" <?php endif; ?>>
                                <a href="<?php echo e(action('\Modules\Partners\Http\Controllers\FinalAccountController@index'), false); ?>">
                                    <i class="fa fa-plus-circle"></i>
                                    الحساب الختامي
                                </a>
                            </li>

                            <li <?php if(request()->segment(2) == 'business'): ?> class="active" <?php endif; ?>>
                                <a href="<?php echo e(action('\Modules\Partners\Http\Controllers\BusinessController@index'), false); ?>">
                                    <i class="fa fa-calendar-minus"></i>
                                    التقدير المالي
                                </a>
                            </li>


                   </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Partners/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>