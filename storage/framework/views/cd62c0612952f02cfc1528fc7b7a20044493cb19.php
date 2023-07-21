<?php $__env->startSection('title', __('report.customer') . ' - ' . __('report.supplier') . ' ' . __('report.reports')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.customer'), false); ?> & <?php echo e(__('report.supplier'), false); ?> <?php echo e(__('report.reports'), false); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('cg_customer_group_id', __( 'lang_v1.customer_group_name' ) . ':'); ?>

                        <?php echo Form::select('cnt_customer_group_id', $customer_group, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'cnt_customer_group_id']); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('type', __( 'lang_v1.type' ) . ':'); ?>

                        <?php echo Form::select('contact_type', $types, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'contact_type']); ?>

                    </div>
                </div>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="supplier_report_tbl">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('report.contact'); ?></th>
                            <th><?php echo app('translator')->get('report.total_purchase'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.total_purchase_return'); ?></th>
                            <th><?php echo app('translator')->get('report.total_sell'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.total_sell_return'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.opening_balance_due'); ?></th>
                            <th><?php echo app('translator')->get('report.total_due'); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info no-print" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.due_tooltip'), false); ?>" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-gray font-17 footer-total text-center">
                            <td><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                            <td><span class="display_currency" id="footer_total_purchase" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_purchase_return" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_sell" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_sell_return" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_opening_bal_due" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_due" data-currency_symbol ="true"></span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/contact.blade.php ENDPATH**/ ?>