<?php $__env->startSection('title', __('lang_v1.items_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('lang_v1.items_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('ir_supplier_id', __('purchase.supplier') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('ir_supplier_id', $suppliers, null, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('ir_purchase_date_filter', __('purchase.purchase_date') . ':'); ?>

                    <?php echo Form::text('ir_purchase_date_filter', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('ir_customer_id', __('contact.customer') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('ir_customer_id', $customers, null, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('ir_sale_date_filter', __('lang_v1.sell_date') . ':'); ?>

                    <?php echo Form::text('ir_sale_date_filter', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('ir_location_id', __('purchase.business_location').':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <?php echo Form::select('ir_location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

                    </div>
                </div>
            </div>
            <?php if(Module::has('Manufacturing')): ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <br>
                        <div class="checkbox">
                            <label>
                              <?php echo Form::checkbox('only_mfg', 1, false, 
                              [ 'class' => 'input-icheck', 'id' => 'only_mfg_products']); ?> <?php echo e(__('manufacturing::lang.only_mfg_products'), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" 
                    id="items_report_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('sale.product'); ?></th>
                                <th><?php echo app('translator')->get('product.sku'); ?></th>
                                <th><?php echo app('translator')->get('purchase.purchase_date'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.purchase'); ?></th>
                                <th><?php echo app('translator')->get('purchase.supplier'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.purchase_price'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.sell_date'); ?></th>
                                <th><?php echo app('translator')->get('business.sale'); ?></th>
                                <th><?php echo app('translator')->get('contact.customer'); ?></th>
                                <th><?php echo app('translator')->get('sale.location'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.quantity'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.selling_price'); ?></th>
                                <th><?php echo app('translator')->get('sale.subtotal'); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-gray font-17 text-center footer-total">
                                <td colspan="5"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                <td id="footer_total_pp" 
                                    class="display_currency" data-currency_symbol="true"></td>
                                <td colspan="4"></td>
                                <td id="footer_total_qty"></td>
                                <td id="footer_total_sp"
                                    class="display_currency" data-currency_symbol="true"></td>
                                <td id="footer_total_subtotal"
                                    class="display_currency" data-currency_symbol="true"></td>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/items_report.blade.php ENDPATH**/ ?>