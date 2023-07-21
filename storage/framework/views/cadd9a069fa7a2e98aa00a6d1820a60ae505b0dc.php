<?php $__env->startSection('title', __('essentials::lang.essentials_n_hrm_settings')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('essentials::lang.essentials_n_hrm_settings'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php echo Form::open(['action' => '\Modules\Essentials\Http\Controllers\EssentialsSettingsController@update', 'method' => 'post', 'id' => 'essentials_settings_form']); ?>

    <div class="row">
        <div class="col-xs-12">
           <!--  <pos-tab-container> -->
            <div class="col-xs-12 pos-tab-container">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center active"><?php echo app('translator')->get('essentials::lang.leave'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('essentials::lang.payroll'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('essentials::lang.attendance'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('essentials::lang.essentials'); ?></a>
                        
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <?php echo $__env->make('essentials::settings.partials.leave_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <?php echo $__env->make('essentials::settings.partials.payroll_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <?php echo $__env->make('essentials::settings.partials.attendance_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <?php echo $__env->make('essentials::settings.partials.essentials_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <!--  </pos-tab-container> -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group pull-right">
            <?php echo e(Form::submit(__('messages.update'), ['class'=>"btn btn-danger"]), false); ?>

            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function () {
        tinymce.init({
            selector: 'textarea#leave_instructions',
        });

        $('#essentials_settings_form').validate({ 
            ignore: [],
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/settings/add.blade.php ENDPATH**/ ?>