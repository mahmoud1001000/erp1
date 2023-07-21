<?php $__env->startSection('title', __('lang_v1.purchase_payment_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('lang_v1.purchase_payment_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
           <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <?php echo Form::open(['url' => '#', 'method' => 'get', 'id' => 'purchase_payment_report_form' ]); ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('supplier_id', __('purchase.supplier') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php echo Form::select('supplier_id', $suppliers, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('location_id', __('purchase.business_location').':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <?php echo Form::label('ppr_date_filter', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'ppr_date_filter', 'readonly']); ?>

                    </div>
                </div>
                <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" 
                    id="purchase_payment_report_table">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.paid_on'); ?></th>
                                <th><?php echo app('translator')->get('sale.amount'); ?></th>
                                <th><?php echo app('translator')->get('purchase.supplier'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.payment_method'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.purchase'); ?></th>
                                <th><?php echo app('translator')->get('messages.action'); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-gray font-17 footer-total text-center">
                                <td colspan="3"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                <td><span class="display_currency" id="footer_total_amount" data-currency_symbol ="true"></span></td>
                                <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade view_register" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/purchase_payment_report.blade.php ENDPATH**/ ?>