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
                <a class="navbar-brand" href="<?php echo e(action('\Modules\Essentials\Http\Controllers\DashboardController@hrmDashboard'), false); ?>"><i class="fa fas fa-users"></i> <?php echo e(__('essentials::lang.hrm'), false); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if(auth()->user()->can('add_essentials_leave_type')): ?>
                        <li <?php if(request()->segment(2) == 'leave-type'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsLeaveTypeController@index'), false); ?>"><?php echo app('translator')->get('essentials::lang.leave_type'); ?></a></li>
                    <?php endif; ?>
                    <li <?php if(request()->segment(2) == 'leave'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsLeaveController@index'), false); ?>"><?php echo app('translator')->get('essentials::lang.leave'); ?></a></li>

                    <li <?php if(request()->segment(2) == 'attendance'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\AttendanceController@index'), false); ?>"><?php echo app('translator')->get('essentials::lang.attendance'); ?></a></li>

                    <li <?php if(request()->segment(2) == 'allowance-deduction'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsAllowanceAndDeductionController@index'), false); ?>"><?php echo app('translator')->get('essentials::lang.allowance_and_deduction'); ?></a></li>

                    <li <?php if(request()->segment(2) == 'payroll'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\PayrollController@index'), false); ?>"><?php echo app('translator')->get('essentials::lang.payroll'); ?></a></li>

                    <li <?php if(request()->segment(2) == 'holiday'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsHolidayController@index'), false); ?>"><?php echo app('translator')->get('essentials::lang.holiday'); ?></a></li>

                    <li <?php if(request()->get('type') == 'hrm_department'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('TaxonomyController@index') . '?type=hrm_department', false); ?>"><?php echo app('translator')->get('essentials::lang.departments'); ?></a></li>

                    <li <?php if(request()->get('type') == 'hrm_designation'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('TaxonomyController@index') . '?type=hrm_designation', false); ?>"><?php echo app('translator')->get('essentials::lang.designations'); ?></a></li>

                    <?php if(auth()->user()->can('edit_essentials_settings')): ?>
                        <li <?php if(request()->segment(1) == 'hrm' && request()->segment(2) == 'settings'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsSettingsController@edit'), false); ?>"><?php echo app('translator')->get('business.settings'); ?></a></li>
                    <?php endif; ?>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/layouts/nav_hrm.blade.php ENDPATH**/ ?>