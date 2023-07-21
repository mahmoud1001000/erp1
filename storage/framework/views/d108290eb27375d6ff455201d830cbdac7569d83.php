
<?php $__env->startSection('title', __('lang_v1.forbidden_access')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('errors.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="div-content" >
            <h2><?php echo app('translator')->get('lang_v1.forbidden_access_msg'); ?></h2>

            <img src="<?php echo e(asset('img/403.png'), false); ?>" class="div-img">
        </div>


    </section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/errors/403.blade.php ENDPATH**/ ?>