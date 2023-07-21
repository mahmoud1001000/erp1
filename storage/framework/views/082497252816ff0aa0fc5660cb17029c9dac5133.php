<?php $__env->startSection('title', __('lang_v1.stock_transfers')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo app('translator')->get('lang_v1.stock_transfers'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.all_stock_transfers')]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('StockTransferController@create'), false); ?>">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view" id="stock_transfer_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                        <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.location_from'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.location_to'); ?></th>
                        <th><?php echo app('translator')->get('sale.status'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.shipping_charges'); ?></th>
                        <th><?php echo app('translator')->get('stock_adjustment.total_amount'); ?></th>
                        <th><?php echo app('translator')->get('purchase.additional_notes'); ?></th>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>

<?php echo $__env->make('stock_transfer.partials.update_status_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section id="receipt_section" class="print_section"></section>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/stock_transfer.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/stock_transfer/index.blade.php ENDPATH**/ ?>