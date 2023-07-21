<?php $__env->startSection('title', __('woocommerce::lang.api_settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('woocommerce::lang.api_settings'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php echo Form::open(['action' => '\Modules\Woocommerce\Http\Controllers\WoocommerceController@updateSettings', 'method' => 'post']); ?>

    <div class="row">
        <div class="col-xs-12">
           <!--  <pos-tab-container> -->
            <div class="col-xs-12 pos-tab-container">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center active"><?php echo app('translator')->get('woocommerce::lang.instructions'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('woocommerce::lang.api_settings'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('woocommerce::lang.product_sync_settings'); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo app('translator')->get('woocommerce::lang.webhook_settings'); ?></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <?php echo $__env->make('woocommerce::woocommerce.partials.api_instructions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('woocommerce::woocommerce.partials.api_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('woocommerce::woocommerce.partials.product_sync_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('woocommerce::woocommerce.partials.webhook_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <div class="col-xs-12">
                <p class="help-block"><i><?php echo __('woocommerce::lang.version_info', ['version' => $module_version]); ?></i></p>
            </div>
            <!--  </pos-tab-container> -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group pull-right">
            <?php echo e(Form::submit('update', ['class'=>"btn btn-danger"]), false); ?>

            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Woocommerce/Providers/../Resources/views/woocommerce/api_settings.blade.php ENDPATH**/ ?>