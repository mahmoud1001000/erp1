<?php $__env->startSection('title', __('stock_adjustment.stock_adjustments')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('stock_adjustment.stock_adjustments'); ?>
        <small></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('stock_adjustment.all_stock_adjustments')]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('StockAdjustmentController@create'), false); ?>">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view" id="stock_adjustment_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                        <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->get('business.location'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.adjustment_type'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.total_amount'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.total_amount_recovered'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.reason_for_stock_adjustment'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/stock_adjustment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/stock_adjustment/index.blade.php ENDPATH**/ ?>