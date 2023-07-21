<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Main Header -->
<header class="main-header no-print">
    <a href="<?php echo e(action('\Modules\Crm\Http\Controllers\DashboardController@index'), false); ?>" class="logo">
        <span class="logo-lg"><?php echo e(Session::get('business.name'), false); ?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            &#9776;
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <button id="btnCalculator" title="<?php echo app('translator')->get('lang_v1.calculator'); ?>" type="button" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10 popover-default" data-toggle="popover" data-trigger="click" data-content='<?php echo $__env->make("layouts.partials.calculator", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>' data-html="true" data-placement="bottom">
                <strong>
                    <i class="fa fa-calculator fa-lg" aria-hidden="true"></i>
                </strong>
            </button>

            <div class="m-8 pull-left mt-15 hidden-xs" style="color: #fff;">
                <strong><?php echo e(\Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), false); ?></strong>
            </div>

            <ul class="nav navbar-nav">
                <?php echo $__env->make('layouts.partials.header-notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <?php
                            $profile_photo = auth()->user()->media;
                        ?>
                        <?php if(!empty($profile_photo)): ?>
                            <img src="<?php echo e($profile_photo->display_url, false); ?>" class="user-image" alt="User Image">
                        <?php endif; ?>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span>
                            <?php echo e(Auth::User()->first_name, false); ?> <?php echo e(Auth::User()->last_name, false); ?>

                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <?php if(!empty(Session::get('business.logo'))): ?>
                                <img src="<?php echo e(url( 'uploads/business_logos/' . Session::get('business.logo') ), false); ?>" alt="Logo">
                                </span>
                            <?php endif; ?>
                            <p>
                                <?php echo e(Auth::User()->first_name, false); ?> <?php echo e(Auth::User()->last_name, false); ?>

                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo e(action('\Modules\Crm\Http\Controllers\ManageProfileController@getProfile'), false); ?>" class="btn btn-default btn-flat">
                                    <?php echo app('translator')->get('lang_v1.profile'); ?>
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(action('Auth\LoginController@logout'), false); ?>" class="btn btn-default btn-flat">
                                    <?php echo app('translator')->get('lang_v1.sign_out'); ?>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/layouts/header.blade.php ENDPATH**/ ?>