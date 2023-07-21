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
                <a class="navbar-brand" href="<?php echo e(action('\Modules\Repair\Http\Controllers\DashboardController@index'), false); ?>"><i class="fas fa-wrench"></i> <?php echo e(__('repair::lang.repair'), false); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if(auth()->user()->can('job_sheet.create') || auth()->user()->can('job_sheet.view_assigned') || auth()->user()->can('job_sheet.view_all')): ?>
                        <li <?php if(request()->segment(2) == 'job-sheet' && empty(request()->segment(3))): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(action('\Modules\Repair\Http\Controllers\JobSheetController@index'), false); ?>">
                                <?php echo app('translator')->get('repair::lang.job_sheets'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job_sheet.create')): ?>
                        <li <?php if(request()->segment(2) == 'job-sheet' && request()->segment(3) == 'create'): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(action('\Modules\Repair\Http\Controllers\JobSheetController@create'), false); ?>">
                                <?php echo app('translator')->get('repair::lang.add_job_sheet'); ?>
                            </a>
                        </li>
                        <li <?php if(request()->segment(2) == 'guarantee' && request()->segment(3) == 'create'): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(action('\Modules\Repair\Http\Controllers\GuaranteeController@index'), false); ?>">
                                الضمان
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('repair.view')): ?>
                        <li <?php if(request()->segment(2) == 'repair' && empty(request()->segment(3))): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Repair\Http\Controllers\RepairController@index'), false); ?>"><?php echo app('translator')->get('repair::lang.list_invoices'); ?></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('repair.create')): ?>
                        <li <?php if(request()->segment(2) == 'repair' && request()->segment(3) == 'create'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('SellPosController@create'). '?sub_type=repair', false); ?>"><?php echo app('translator')->get('repair::lang.add_invoice'); ?></a></li>
                    <?php endif; ?>

                    <?php if(auth()->user()->can('brand.view') || auth()->user()->can('brand.create')): ?>
                        <li <?php if(request()->segment(1) == 'brands'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('BrandController@index'), false); ?>"><?php echo app('translator')->get('brand.brands'); ?></a></li>
                    <?php endif; ?>
                    <?php if(auth()->user()->can('repair_setting.view')): ?>
                        <li <?php if(request()->segment(1) == 'repair' && request()->segment(2) == 'repair-settings'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Repair\Http\Controllers\RepairSettingsController@index'), false); ?>"><?php echo app('translator')->get('messages.settings'); ?></a></li>
                    <?php endif; ?>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>