<?php $__env->startSection('title', __('product.variations')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('product.variations'); ?>
        <small><?php echo app('translator')->get('lang_v1.manage_product_variations'); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.all_variations')]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-block btn-primary btn-modal" 
                data-href="<?php echo e(action('VariationTemplateController@create'), false); ?>" 
                data-container=".variation_modal">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></button>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="variation_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('product.variations'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.values'); ?></th>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade variation_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/variation/index.blade.php ENDPATH**/ ?>