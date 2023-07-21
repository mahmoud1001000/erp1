<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | Superadmin Settings'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('superadmin::lang.super_admin_settings'); ?><small><?php echo app('translator')->get('superadmin::lang.edit_super_admin_settings'); ?></small></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php echo $__env->make('layouts.partials.search_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br>
    <?php echo Form::open(['action' => '\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@update', 'method' => 'put']); ?>

    <div class="row">
        <div class="col-xs-12">
           <!--  <pos-tab-container> -->
            <div class="col-xs-12 pos-tab-container">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center active"><?php echo app('translator')->get('superadmin::lang.super_admin_settings'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('superadmin::lang.application_settings'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('superadmin::lang.email_smtp_settings'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('superadmin::lang.payment_gateways'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('superadmin::lang.backup'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('superadmin::lang.cron'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('superadmin::lang.pusher_settings'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('superadmin::lang.additional_js_css'); ?></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.super_admin_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.application_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.email_smtp_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.payment_gateways', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.backup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.cron', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.pusher_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.additional_js_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    $(document).on('change', '#BACKUP_DISK', function() {
        if($(this).val() == 'dropbox'){
            $('div#dropbox_access_token_div').removeClass('hide');
        } else {
            $('div#dropbox_access_token_div').addClass('hide');
        }
    });

    $(document).ready( function(){
        if ($('#welcome_email_body').length) {
            tinymce.init({
                selector: 'textarea#welcome_email_body',
            });
        }

        if ($('#superadmin_register_tc').length) {
            tinymce.init({
                selector: 'textarea#superadmin_register_tc'
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/Modules/Superadmin/Providers/../Resources/views/superadmin_settings/edit.blade.php ENDPATH**/ ?>